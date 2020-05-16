$( document ).ready(function() {
	//------------------Cargar funding-------------------------//	
	$.ajax({
	    url:'../controller/cFunding.php',
	    method:'GET',
	    dataType:'json',
	    success: function(response) {
			console.log(response)	
			htmlzatia="<h3>"+response.dineroO+"</h3>";
			htmlzatia+="<h3>"+response.dineroR+"</h3>";
			htmlzatia+=`<div class="card-body">
					  		<a href="vPatrocinio.html" class="btn btn-primary botonPatrocinio" data-idcontribucion=`+ 1 + `>Contribuir</a>
					  	</div>`;
			$(".fundingData").html(htmlzatia);
			
			cargarPago();
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

//-----------------------Cargar fundings----------------------------------//
function cargarPago() {
	$(".botonPatrocinio").click(function () {
		var id = $(this).data("idcontribucion");
		//console.log(id);
		$.ajax({
			url: '../controller/cOpenPago.php',
			method: 'POST',
			data: { idcontribucion: id },
			success: function (response) {
				console.log(response);
			},
			error: function (xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});
	});
}