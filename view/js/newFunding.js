var savedFileBase64;
var filename;

$(document).ready(function() {
	$("#newImagen").change(function(){		
		  let file = $("#newImagen").prop("files")[0];
		  filename = file.name.toLowerCase();
		  
		  if (!new RegExp("(.*?).(jpg|jpeg|png|gif)$").test(filename)) {
		    alert("Solo se aceptan imágenes JPG, PNG y GIF");
		  }
		  
		  let reader = new FileReader();
		  
		  reader.onload = function(e) {		  
			  let fileBase64 = e.target.result;

			  // Almacenar en variable global para uso posterior
			  savedFileBase64 = fileBase64;
		  };
		  
		  reader.readAsDataURL(file);
	});

    $("#saveFundingButton").on("click", function() {
        var nombreFunding=$("#newNombreFunding").val();
        var meta=$("#newMeta").val();
        var descripcionFunding=$("#newDescripcionFunding").val();
        var date=$("#newFechaFin").val();
        
        if (nombreFunding.length!=0 && meta.length!=0 && descripcionFunding.length!=0 && date.lenght!=0) {
        	$("#newContribucionForm").slideDown();
        	$("#newFundingForm").slideUp();
            
        	$("#insertFundingButton").on("click", function() {
        		var nombreContribucion=$("#newNombreContribucion").val();
                var precio=$("#newPrecio").val();
                var descripcionContribucion=$("#newDescripcionContribucion").val();
                var recompensa=$("#newRecompensa").val();

                if(nombreFunding.length!=0) {
	        		$.ajax({
			            url:'../controller/cInsertFunding.php',
			            method: 'POST',
			            data:{
			                nombreFunding: nombreFunding,
			                meta: meta,
			                descripcionFunding: descripcionFunding,
			                date: date,
			                filename:filename,
			                savedFileBase64: savedFileBase64
			            },
			            success:function(response){	            	
			            	insertContribucion(nombreContribucion, precio, descripcionContribucion, recompensa);
			            },
			            error: function(xhr) {
			                alert("An error occured: " + xhr.status + " " + xhr.statusText);
			            }
			        });
                }else {
                	insertContribucion(nombreContribucion, precio, descripcionContribucion, recompensa);
                }
        	});
        	
        	$("#insertFundingAndReturnButton").on("click", function() {
        		var nombreContribucion=$("#newNombreContribucion").val();
                var precio=$("#newPrecio").val();
                var descripcionContribucion=$("#newDescripcionContribucion").val();
                var recompensa=$("#newRecompensa").val();
                
                if(nombreFunding.length!=0) {
	        		$.ajax({
			            url:'../controller/cInsertFunding.php',
			            method: 'POST',
			            data:{
			                nombreFunding: nombreFunding,
			                meta: meta,
			                descripcionFunding: descripcionFunding,
			                date: date,
			                filename:filename,
			                savedFileBase64: savedFileBase64
			            },
			            success:function(response){	            	
			            	insertContribucionAndReturn(nombreContribucion, precio, descripcionContribucion, recompensa);
			            	nombreFunding="";
			            },
			            error: function(xhr) {
			                alert("An error occured: " + xhr.status + " " + xhr.statusText);
			            }
			        });
	        	}else {
	        		insertContribucionAndReturn(nombreContribucion, precio, descripcionContribucion, recompensa);
	        	}
        	});
	    }       
    });
});

function insertContribucion(nombreContribucion, precio, descripcionContribucion, recompensa) {
	if (nombreContribucion.length!=0 && precio.length!=0 && descripcionContribucion.length!=0 && recompensa.length!=0) {
		$.ajax({
	        url:'../controller/cInsertContribucion.php',
	        method: 'POST',
	        data:{
	        	nombreContribucion: nombreContribucion,
	            precio: precio,
	            descripcionContribucion: descripcionContribucion,
	            recompensa: recompensa,
	        },
	        success:function(response) {
	        	alert("Nuevo proyecto añadido");
	        	window.location = "vMain.html";
	        },
	        error: function(xhr) {
	            alert("An error occured: " + xhr.status + " " + xhr.statusText);
	        }
	    });
	}
}

function insertContribucionAndReturn(nombreContribucion, precio, descripcionContribucion, recompensa) {
	if (nombreContribucion.length!=0 && precio.length!=0 && descripcionContribucion.length!=0 && recompensa.length!=0) {
		$.ajax({
	        url:'../controller/cInsertContribucion.php',
	        method: 'POST',
	        data:{
	        	nombreContribucion: nombreContribucion,
	            precio: precio,
	            descripcionContribucion: descripcionContribucion,
	            recompensa: recompensa,
	        },
	        success:function(response) {
	        	$("#newNombreContribucion").val("");
                $("#newPrecio").val("");
                $("#newDescripcionContribucion").val("");
                $("#newRecompensa").val("");
	        },
	        error: function(xhr) {
	            alert("An error occured: " + xhr.status + " " + xhr.statusText);
	        }
	    });
	}
}