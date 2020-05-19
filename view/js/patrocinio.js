$(document).ready(function () {    
    $("#owner").on("keyup", check);
    $("#cvv").on("keyup", check);
    $("#cardNumber").on("keyup", check);
    $("#mes").on("change", check);
    $("#year").on("change", check);
    

	//---------------------------------------------------------//
    
    $("#insertPatrocinioButton").on("click", function() {

        var owner=$("#owner").on("keyup", check);
        var CVV=$("#cvv").on("keyup", check);
        var number=("#cardNumber").on("keyup", check);
        var mes=$("#mes").on("change", check);
        var year=$("#year").on("change", check);
    	$.ajax({
            url:'../controller/cInsertPatrocinio.php',
            method: POST,
            data: {
                owner: owner,
                CVV:CVV,
                number:number,
                month:mes,
                year:year,
            },
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