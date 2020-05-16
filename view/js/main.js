$(document).ready(function () {
	//-----------------------Cargar fundings----------------------------------//
	$.ajax({
		url: '../controller/cMain.php',
		method: 'GET',
		dataType: 'json',
		success: function (response) {
			console.log(response)
			if (response.length) {
				var htmlzatia = "";
				for (let index = 0; index < response.length; index++) {
					if (index == 0) {
//----------------------FUNDING CON MAS VOTOS----------------------//
						htmlzatia += `<div class="card mainCard" >
					<div class="row no-gutters">
					  <div class="col-md-4">
						<img src="`+ response[index].imagen + `" class="card-img" alt="...">
						<div class="voteContainer" data-idfunding=`+ response[index].id + `>`;
						if (response[index].votado == 1) {
							htmlzatia += `<div class="positivo activoPositivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
					<div class="negativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}
						else if (response[index].votado == 0) {
							htmlzatia += `<div class="positivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
						<div class="negativo activoNegativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}
						else {
							htmlzatia += `<div class="positivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
						<div class="negativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}

						htmlzatia += `
					</div>
					  </div>
					  <div class="col-md-8">
						<div class="card-body">
						  <h5 class="card-title">`+ response[index].nombre + `</h5>
						  <p class="card-text">`+ response[index].descripcion + `</p>
						  <a href="vFunding.html" class="btn btn-primary botonFunding" data-idfunding=`+ response[index].id + `>Go to Funding</a>
						</div>
					  </div>
					</div>
				  </div>`;
					}

//----------------------SEGUNDO FUNDING CON MAS VOTOS----------------------//
					else if (index == 1) {
						htmlzatia += `<div class="card-group">
				<div class="card secondaryCard">
				  <img src="`+ response[index].imagen + `" class="card-img-top" alt="...">
				  <div class="voteContainer" data-idfunding=`+ response[index].id + `>`;
						if (response[index].votado == 1) {
							htmlzatia += `<div class="positivo activoPositivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
					<div class="negativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}
						else if (response[index].votado == 0) {
							htmlzatia += `<div class="positivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
						<div class="negativo activoNegativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}
						else {
							htmlzatia += `<div class="positivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
						<div class="negativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}

						htmlzatia += `
					</div>
				  <div class="card-body">
					<h5 class="card-title">`+ response[index].nombre + `</h5>
					<p class="card-text">`+ response[index].descripcion + `</p>
					<a href="vFunding.html" class="btn btn-primary botonFunding" data-idfunding=`+ response[index].id + `>Go to Funding</a>
				  </div>
				</div>`;
//----------------------TERCER FUNDING CON MAS VOTOS----------------------//
					}
					else if (index == 2) {
						htmlzatia += `<div class="card secondaryCard">
				<img src="`+ response[index].imagen + `" class="card-img-top" alt="...">
				<div class="voteContainer" data-idfunding=`+ response[index].id + `>`;
						if (response[index].votado == 1) {
							htmlzatia += `<div class="positivo activoPositivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
					<div class="negativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}
						else if (response[index].votado == 0) {
							htmlzatia += `<div class="positivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
						<div class="negativo activoNegativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}
						else {
							htmlzatia += `<div class="positivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
						<div class="negativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}

						htmlzatia += `
					
					</div>
				
				<div class="card-body">
				  <h5 class="card-title">`+ response[index].nombre + `</h5>
				  <p class="card-text">`+ response[index].descripcion + `</p>
				  <a href="vFunding.html" class="btn btn-primary botonFunding" data-idfunding=`+ response[index].id + `>Go to Funding</a>
				</div>
			  </div>
			  </div>
			  
			 <div class="container"> 
			 <div class="row row-cols-3">
			  `;
					}
					//----------------------EL RESTO DE VOTOS----------------------//
					else {
						htmlzatia += `
					
					<div class="col">

					<div class="card" style="width: 18rem;">
					
					<img src="`+ response[index].imagen + `" class="card-img-top" alt="...">
					<div class="voteContainer" data-idfunding=`+ response[index].id + `>`;
						if (response[index].votado == 1) {
							htmlzatia += `<div class="positivo activoPositivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
					<div class="negativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}
						else if (response[index].votado == 0) {
							htmlzatia += `<div class="positivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
						<div class="negativo activoNegativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}
						else {
							htmlzatia += `<div class="positivo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Thumb_up_icon_2.svg/1200px-Thumb_up_icon_2.svg.png"></div>
						<div class="negativo"><img src="https://image.flaticon.com/icons/png/512/25/25395.png"></div>`;
						}

						htmlzatia += `
					</div>
					<div class="card-body">
						<h5 class="card-title">`+ response[index].nombre + `</h5>
						<p class="card-text">`+ response[index].descripcion + `</p>
						<a href="vFunding.html" class="btn btn-primary botonFunding" data-idfunding=`+ response[index].id + `>Go to Funding</a>
					</div>
					</div>
					
					</div>`;
					}
				}
				//----------------------------------------------------------------------------------------------//
				htmlzatia += "</div></div>";
				$(".pageBody").html(htmlzatia);

				cargarFunding();
			}

			$(".negativo").on("click", function () {
				var id = $(this).parent().data("idfunding");
				var positivo = -1;

				if (!$(this).hasClass("activoNegativo") && !$(this).siblings().hasClass("activoPositivo")) {
					//si no ha votado a nada

					$(this).addClass("activoNegativo");
					$.ajax({
						url: '../controller/cInsertVoto.php',
						method: 'POST',
						data: { "idFunding": id, "positivo": positivo },
						success: function () {

						},
						error: function (xhr) {
							alert("An error occured: " + xhr.status + " " + xhr.statusText);
						}
					});
				}else if (!$(this).hasClass("activoNegativo")) {
					//si cambia el voto

					$(this).addClass("activoNegativo");
					$(this).siblings(".activoPositivo").removeClass("activoPositivo");
					$.ajax({
						url: '../controller/cUpdateVoto.php',
						method: 'POST',
						data: { "idFunding": id, "positivo": positivo },
						success: function () {

						},
						error: function (xhr) {
							alert("An error occured: " + xhr.status + " " + xhr.statusText);
						}
					});
				}else {
					//si quita el voto que ya tiene
					$(this).removeClass("activoNegativo");
					$.ajax({
						url: '../controller/cDeleteVoto.php',
						method: 'POST',
						data: { "idFunding": id },
						success: function () {

						},
						error: function (xhr) {
							alert("An error occured: " + xhr.status + " " + xhr.statusText);
						}
					});
				}

			});

			$(".positivo").on("click", function () {
				var id = $(this).parent().data("idfunding");
				var positivo = 1;

				if (!$(this).hasClass("activoPositivo") && !$(this).siblings().hasClass("activoNegativo")) {
					//si no ha votado a nada

					$(this).addClass("activoPositivo");
					$.ajax({
						url: '../controller/cInsertVoto.php',
						method: 'POST',
						data: { "idFunding": id, "positivo": positivo },
						success: function () {

						},
						error: function (xhr) {
							alert("An error occured: " + xhr.status + " " + xhr.statusText);
						}
					});
				}else if (!$(this).hasClass("activoPositivo")) {
					//si cambia el voto

					$(this).addClass("activoPositivo");
					$(this).siblings(".activoNegativo").removeClass("activoNegativo");
					$.ajax({
						url: '../controller/cUpdateVoto.php',
						method: 'POST',
						data: { "idFunding": id, "positivo": positivo },
						success: function () {

						},
						error: function (xhr) {
							alert("An error occured: " + xhr.status + " " + xhr.statusText);
						}
					});
				}else {
					//si quita el voto que ya tiene
					$(this).removeClass("activoPositivo");
					$.ajax({
						url: '../controller/cDeleteVoto.php',
						method: 'POST',
						data: { "idFunding": id },
						success: function () {

						},
						error: function (xhr) {
							alert("An error occured: " + xhr.status + " " + xhr.statusText);
						}
					});
				}
			});
		},
		error: function (xhr) {
			alert("An error occured: " + xhr.status + " " + xhr.statusText);
		}
	});

	//-----------------------Cargar fundings----------------------------------//
	function cargarFunding() {
		$(".botonFunding").click(function () {
			var id = $(this).data("idfunding");
			//console.log(id);
			$.ajax({
				url: '../controller/cOpenFunding.php',
				method: 'POST',
				data: { idFunding: id },
				success: function (response) {
					console.log(response);
				},
				error: function (xhr) {
					alert("An error occured: " + xhr.status + " " + xhr.statusText);
				}
			});
		});
	}
});