$( document ).ready(function() {
	//------------------Comprobar login-------------------------//	
	$.ajax({
	    url:'../controller/cLoginCheck.php',
	    dataType:'json',
	    success: function(response) {
	        console.log(response)
	        if (response.success == true) {
	        }else {
                window.location = "../index.html";
            }
	    },
	    error: function(xhr) {
	        alert("An error occured: " + xhr.status + " " + xhr.statusText);
	    }	    
    });
    	//------------------------------------------------------------------------//
	$("#logoutButton").click(function () {
		$.ajax({
			url: '../controller/cLogout.php',
			success: function (response) {
				console.log(response);
				window.location.href = "";
			},
			error: function (xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});
	});
});