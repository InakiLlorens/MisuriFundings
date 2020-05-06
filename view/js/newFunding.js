$( document ).ready(function() {
	//------------------Comprobar login-------------------------//	
	$.ajax({
	    url:'../controller/cLoginCheck.php',
	    dataType:'json',
	    success: function(response) {
	        console.log(response)
	        if (response.success == true) {            
	            console.log(response);
	        }else {
	        	window.location = "../index.html";
            }
	    },
	    error: function(xhr) {
	        alert("An error occured: " + xhr.status + " " + xhr.statusText);
	    }	    
    });

	//---------------------------------------------------------//

    $("#insertFundingButton").on("click", function() {
        var nombre=$("#newNombre").val();
        var meta=$("#newMeta").val();
        var descripcion=$("#newDescripcion").val();
        var date=$("#newFechaFin").val();
        var imagen=$("#newImagen").val();
        
        console.log(nombre+meta+descripcion+date+imagen);
        
        if (nombre.length!=0 && meta.length!=0 && descripcion.length!=0 && date.lenght!=0 && imagen.lenght!=0) {
	        $.ajax({
	            url:'../controller/cInsertFunding.php',
	            method: 'POST',
	            data:{
	                nombre: nombre,
	                meta: meta,
	                descripcion: descripcion,
	                date: date,
	                imagen: imagen,
	            },
	            success:function(){
	            	window.location = "vMain.html";
	            },
	            error: function(xhr) {
	                alert("An error occured: " + xhr.status + " " + xhr.statusText);
	            }
	        });
	    }
    });
});