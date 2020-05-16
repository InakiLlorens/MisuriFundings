$(document).ready(function () {    
    $("#owner").on("keyup", check);
    $("#cvv").on("keyup", check);
    $("#cardNumber").on("keyup", check);
    $("#mes").on("change", check);
    $("#year").on("change", check);
    
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
    
    $("#insertPatrocinioButton").on("click", function() {
    	$.ajax({
            url:'../controller/cInsertPatrocinio.php',
            success:function() {	
            	alert("Pago realizado");
            	window.location = "vMain.html";
            },
            error: function(xhr) {
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        });
	});
    
    $("#cancelarButton").on("click", function() {
    	window.location = "vFunding.html";
	});
});

function check() {
    var owner = $("#owner").val();
    var cvv = $("#cvv").val();
    var cardNumber = $("#cardNumber").val();
    var mes = $("#mes").val();
    var year = $("#year").val();

    if(owner !== "" && cvv !== "" && cardNumber !== "" && mes !== "" && year !== "") {
        $("#insertPatrocinioButton").attr("disabled", false); 
    }else {
        $("#insertPatrocinioButton").attr("disabled", true);
    }
}