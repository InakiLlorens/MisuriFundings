$(document).ready(function () {    
    $("#owner").on("keyup", check);
    $("#cvv").on("keyup", check);
    $("#cardNumber").on("keyup", check);
    $("#fechaCaducidad").on("change", check);
    
	//---------------------------------------------------------//
    
    $("#insertPatrocinioButton").on("click", function() {
        var owner=$("#owner").val();
        var CVV=$("#cvv").val();
        var number=$("#cardNumber").val();
        var date=$("#fechaCaducidad").val();

    	$.ajax({
            url:'../controller/cInsertPatrocinio.php',
            method: 'POST',
            data: {
                owner:owner,
                CVV:CVV,
                number:number,
                date:date
            },
            success:function(response) {	
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
    var date = $("#fechaCaducidad").val();

    if(owner !== "" && cvv !== "" && cardNumber !== "" && date !== "") {
        $("#insertPatrocinioButton").attr("disabled", false); 
    }else {
        $("#insertPatrocinioButton").attr("disabled", true);
    }
}