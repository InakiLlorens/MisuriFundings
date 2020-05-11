$(document).ready(function() {
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

    $("#saveFundingButton").on("click", function() {
        var nombreFunding=$("#newNombreFunding").val();
        var meta=$("#newMeta").val();
        var descripcionFunding=$("#newDescripcionFunding").val();
        var comentario=$("#newComentario").val();
        var date=$("#newFechaFin").val();
        var imagen=$("#newImagen").val();

        if (nombreFunding.length!=0 && meta.length!=0 && descripcionFunding.length!=0 && comentario.length!=0 && date.lenght!=0 && imagen.lenght!=0) {
        	$("#newContribucionForm").slideDown();
        	$("#newFundingForm").slideUp();
            
        	$("#insertFundingButton").on("click", function() {
        		var nombreContribucion=$("#newNombreContribucion").val();
                var precio=$("#newPrecio").val();
                var descripcionContribucion=$("#newDescripcionContribucion").val();
                var recompensa=$("#newRecompensa").val();
                
                console.log(nombreContribucion+precio+descripcionContribucion+recompensa); 
                
	        	$.ajax({
		            url:'../controller/cInsertFunding.php',
		            method: 'POST',
		            data:{
		                nombreFunding: nombreFunding,
		                meta: meta,
		                descripcionFunding: descripcionFunding,
		                comentario: comentario,
		                date: date,
		                imagen: imagen
		            },
		            success:function(response){	            	
		            	insertContribucion(nombreContribucion, precio, descripcionContribucion, recompensa, nombreFunding);
		            },
		            error: function(xhr) {
		                alert("An error occured: " + xhr.status + " " + xhr.statusText);
		            }
		        });
        	});
	    }       
    });
    
    $("#volverButton").on("click", function() {
        $("#newFundingForm").slideDown();
        $("#newContribucionForm").slideUp();      
    });
});

function insertContribucion(nombreContribucion, precio, descripcionContribucion, recompensa, nombreFunding) {
	alert(nombreFunding);
	if (nombreContribucion.length!=0 && precio.length!=0 && descripcionContribucion.length!=0 && recompensa.length!=0) {
		$.ajax({
	        url:'../controller/cInsertContribucion.php',
	        method: 'POST',
	        data:{
	        	nombreContribucion: nombreContribucion,
	            precio: precio,
	            descripcionContribucion: descripcionContribucion,
	            recompensa: recompensa,
	            nombreFunding: nombreFunding,
	        },
	        success:function(response){
	        	alert("Nuevo proyecto añadidos");        	
	        	window.location = "vMain.html";
	        },
	        error: function(xhr) {
	            alert("An error occured: " + xhr.status + " " + xhr.statusText);
	        }
	    });
	}
}