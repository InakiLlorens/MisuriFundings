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
	//-----------------------Cargar fundings----------------------------------//
	$.ajax({
	    url:'../controller/cMain.php',
	    method:'GET',
	    dataType:'json',
	    success: function(response) {
	        console.log(response)
		 if (response.length){
			 var htmlzatia="";
			for (let index = 0; index < response.length; index++) {
				if (index==0){

					htmlzatia+=`<div class="card mainCard" >
					<div class="row no-gutters">
					  <div class="col-md-4">
						<img src="`+response[index].imagen+`" class="card-img" alt="...">
						<div class="voteContainer" data-id=`+response[index].id+`>`;
					if (response[index].votado==1){
					htmlzatia+=`<div class="positivo activoPositivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
					<div class="negativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
					}
					else if (response[index].votado==0){
						htmlzatia+=`<div class="positivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
						<div class="negativo activoNegativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}
					else{
						htmlzatia+=`<div class="positivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
						<div class="negativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}
					
					htmlzatia+=`
					</div>
					  </div>
					  <div class="col-md-8">
						<div class="card-body">
						  <h5 class="card-title">`+response[index].nombre+`</h5>
						  <p class="card-text">`+response[index].descripcion+`</p>
						
						</div>
					  </div>
					</div>
				  </div>`;
				}
				else if (index==1){
				htmlzatia+=`<div class="card-group">
				<div class="card secondaryCard">
				  <img src="`+response[index].imagen+`" class="card-img-top" alt="...">
				  <div class="voteContainer" data-id=`+response[index].id+`>`;
					if (response[index].votado==1){
					htmlzatia+=`<div class="positivo activoPositivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
					<div class="negativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
					}
					else if (response[index].votado==0){
						htmlzatia+=`<div class="positivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
						<div class="negativo activoNegativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}
					else{
						htmlzatia+=`<div class="positivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
						<div class="negativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}
					
					htmlzatia+=`
					</div>
				  <div class="card-body">
					<h5 class="card-title">`+response[index].nombre+`</h5>
					<p class="card-text">`+response[index].descripcion+`</p>
				  </div>
				</div>`;
				}
				else if (index==2){
				htmlzatia+=`<div class="card secondaryCard">
				<img src="`+response[index].imagen+`" class="card-img-top" alt="...">
				<div class="voteContainer" data-id=`+response[index].id+`>`;
					if (response[index].votado==1){
					htmlzatia+=`<div class="positivo activoPositivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
					<div class="negativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
					}
					else if (response[index].votado==0){
						htmlzatia+=`<div class="positivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
						<div class="negativo activoNegativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}
					else{
						htmlzatia+=`<div class="positivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
						<div class="negativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}
					
					htmlzatia+=`
					
					</div>
					<span>1</span>
				<div class="card-body">
				  <h5 class="card-title">`+response[index].nombre+`</h5>
				  <p class="card-text">`+response[index].descripcion+`</p>
				</div>
			  </div>
			  </div>
			  
			 <div class="container"> 
			 <div class="row row-cols-3">
			  `;
				}
				else{
					htmlzatia+=`
					
					<div class="col">

					<div class="card" style="width: 18rem;">
					
					<img src="`+response[index].imagen+`" class="card-img-top" alt="...">
					<div class="voteContainer" data-id=`+response[index].id+`>`;
					if (response[index].votado==1){
					htmlzatia+=`<div class="positivo activoPositivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
					<div class="negativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
					}
					else if (response[index].votado==0){
						htmlzatia+=`<div class="positivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
						<div class="negativo activoNegativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}
					else{
						htmlzatia+=`<div class="positivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
						<div class="negativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}
					
					htmlzatia+=`
					</div>
					<div class="card-body">
						<h5 class="card-title">`+response[index].nombre+`</h5>
						<p class="card-text">`+response[index].descripcion+`</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
					</div>
					
					</div>

				  `;
				}
				
			}
			htmlzatia+="</div></div>";
			$(".pageBody").html(htmlzatia);
		}
		

		$(".negativo").on("click", function(){
			$(this).addClass("activoNegativo");
			$(this).siblings(".activoPositivo").removeClass("activoPositivo");
		});
		$(".positivo").on("click", function(){
			$(this).addClass("activoPositivo");
			$(this).siblings(".activoNegativo").removeClass("activoNegativo");
		});



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

