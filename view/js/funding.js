$( document ).ready(function() {
	//------------------Comprobar login-------------------------//	
	$.ajax({
	    url:'../controller/cLoginCheck.php',
	    method:'GET',
	    dataType:'json',
	    success: function(response) {
	        console.log(response)
	        if (response.success == false) {
	            window.location = "../index.html";
			}	
	    },
	    error: function(xhr) {
	        alert("An error occured: " + xhr.status + " " + xhr.statusText);
	    }	    
	});
	
	$.ajax({
	    url:'../controller/cFunding.php',
	    method:'GET',
	    dataType:'json',
	    success: function(response) {
	        console.log(response)			
	    },
	    error: function(xhr) {
	        alert("An error occured: " + xhr.status + " " + xhr.statusText);
	    }	    
	});
	
	//------------------------------------------------------------------------//
    $("#logoutButton").click(function() {
        $.ajax({
            url:'../controller/cLogout.php',
            success: function(response) {
                console.log(response);
                window.location.href = "../index.html";
            },
            error: function(xhr) {
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
            }            
        });
    });
});