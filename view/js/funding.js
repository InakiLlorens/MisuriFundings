$( document ).ready(function() {
	//------------------Cargar funding-------------------------//	
	$.ajax({
	    url:'../controller/cFunding.php',
	    method:'GET',
	    dataType:'json',
	    success: function(response) {
			console.log(response)	
			var porcentaje = (response.dineroR*100)/response.dineroO;
			htmlzatia="<h1><span class='dineroR'><b>"+response.dineroR+"</b>€</span> recaudado</h1>";
			htmlzatia+="<span class='dineroO'>de "+response.dineroO+" €</span>";
			htmlzatia+=`<div class="progress">
			<div class="progress-bar bg-success" role="progressbar" style="width: `+porcentaje+`%" aria-valuenow="`+porcentaje+`" aria-valuemin="0" aria-valuemax="100"></div>
		  </div>`
		  htmlzatia+="<p>"+response.descripcion+"</p>"
		  htmlzatia+="<span class='fechafin'>Fecha fin de los patrocinios: "+response.fechaFin+"</span>";
			htmlzatia+=`<div class="card-body">
							 
					  	</div>`;
			$(".fundingData").html(htmlzatia);
			$("#imgFunding").attr("src", "uploads/"+response.imagen);
			var htmlPreguntas = `<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
			  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#preguntas" role="tab" aria-controls="home" aria-selected="true">Preguntas frecuentes</a>
			</li>
			<li class="nav-item" role="presentation">
			  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#comentarios" role="tab" aria-controls="profile" aria-selected="false">Comentarios</a>
			</li>
			<li class="nav-item" role="presentation">
			  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#actualizaciones" role="tab" aria-controls="profile" aria-selected="false">Actualizaciones</a>
			</li>
			
		  </ul>
		  <div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="preguntas" role="tabpanel" aria-labelledby="home-tab">
			
			`;
			if (response.miPropiedad==true){
				htmlPreguntas+=`<button type="button" class="btn btn-primary addPregunta" data-toggle="modal" data-target="#preguntaModal">
				Añadir preguntas
			  </button>`;
			}
		  htmlPreguntas+='<div class="accordion" id="accordionExample">';
			for (let index = 0; index < response.listPreguntas.length; index++) {
				

			htmlPreguntas += `
				<div class="card">
				
 				   <div class="card-header" id="headingTwo">
 				     <h2 class="mb-0">
 				       <button class="btn btn-link btn-block text-left collapsed preguntaTitle" type="button" data-toggle="collapse" data-target="#pregunta`+index+`" aria-expanded="false" aria-controls="collapseTwo" >
						<h3><b>`+response.listPreguntas[index].pregunta+`</b></h3>
						</button>`;

						if (response.miPropiedad == true){
						htmlPreguntas+='<button type="button" class="btn btn-info editarPregunta" data-index="'+index+'">Editar</button>';
							}
						
						htmlPreguntas += `</h2>
 				   </div>
 				   <div id="pregunta`+index+`" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
 				     <div class="card-body">
					 `+response.listPreguntas[index].respuesta+` 
					  </div>
 				   </div>
 				 </div>
				`;
				
			}
			htmlPreguntas+="</div></div>";
			htmlPreguntas+='<div class="tab-pane fade show" id="comentarios" role="tabpanel" aria-labelledby="home-tab">';
			htmlPreguntas+=`<div class=escribirComentario>
			<div class="textoComentario">
			<h3>¡Escribe lo que opinas de este funding!</h3>
			<span>(se respetuoso en todo momento e intenta no ofender a nadie)</span>
			</div>
			<textarea class="form-control"></textarea>
			<button type="button" class="btn btn-success" data-idFunding=`+response.id+` id="enviarComentario">Enviar</input>
			</div>`;
			for (let index = 0; index < response.listComentarios.length; index++) {
				htmlPreguntas+=`<div class="comentario">
				<h4>`+response.listComentarios[index].objUser.usuario+`</h3>
				<p>`+response.listComentarios[index].comentario+`</p>
				
				<lr>
				
				</div>`;
				
			}
			






			htmlPreguntas+='</div>';


			htmlPreguntas+='<div class="tab-pane fade show" id="actualizaciones" role="tabpanel" aria-labelledby="home-tab">';
			if (response.miPropiedad==true){
				htmlPreguntas+='<button type="button" class="btn btn-primary">Añadir actualizacion</button>';
			}
		
			for (let index = 0; index < response.listActualizaciones.length; index++) {
				htmlPreguntas+=`<div class="card">
				<div class="card-header">
				  <h3>`+response.listActualizaciones[index].fecha+`</h3>
				  <h4>`+response.listActualizaciones[index].nombre+`</h4>
				</div>
				<div class="card-body">
				  <blockquote class="blockquote mb-0">
					`+response.listActualizaciones[index].descripcion+`
				  </blockquote>
				</div>
			  </div>`;
				
			}
			htmlPreguntas+="</div>"
			htmlContribuciones="<h3>Contribuciones</h3><hr>";
			for (let index = 0; index < response.listContribuciones.length; index++) {
				htmlContribuciones+=`<div class="card" style="width: 100%;">
				<div class="card-body">
				
				  <h4 class="card-title">`+response.listContribuciones[index].nombre+`</h4>
				  <h5 class="card-subtitle mb-2 text-muted">`+response.listContribuciones[index].precio+` €</h5>
				  <p class="card-text">`+response.listContribuciones[index].recompensa+`</p>
				  <a href="vPatrocinio.html" class="btn btn-primary botonPatrocinio" data-idcontribucion=`+ 1 + `>Contribuir</a>
				 
				</div>
			  </div>`;
				
			}
			$(".fundingContributions").html(htmlContribuciones);
			
			
			$(".fundingMoreInfo").html(htmlPreguntas);
			cargarPago();
			$("#enviarComentario").on("click", function(){
				
				var id= $(this).data("idfunding");
				var text=$(this).siblings("textarea").val();
				if (text!=null && text!=undefined && text!=""){
				$.ajax({
					url: '../controller/cInsertComentario.php',
					method: 'POST',
					data: { id: id, text: text },
					success: function (response) {
						console.log(response);
						window.location.reload();
					},
					error: function (xhr) {
						alert("An error occured: " + xhr.status + " " + xhr.statusText);
					}
				});
			}
			else{
				alert("No puedes enviar un comentario vacio");
			}

			});
			$("#enviarPregunta").on("click", function(){
				var pregunta= $("#preguntaModal input").val();
				var respuesta = $("#preguntaModal textarea").val();
				id=response.id;
				console.log(id);
				if (pregunta!="" && respuesta!=""){
				$.ajax({
					url: '../controller/cInsertPregunta.php',
					method: 'POST',
					data: { id: id, pregunta: pregunta, respuesta: respuesta },
					success: function (response) {
						console.log(response);
						window.location.reload();
					},
					error: function (xhr) {
						alert("An error occured: " + xhr.status + " " + xhr.statusText);
					}
				});
			}
			else{
				alert("Rellena todos los campos!")
			}
			});

			$(".editarPregunta").on("click", function(){
				var index = $(this).data("index");
				console.log(index);
				if ($(this).hasClass("btn-info")){

				$(this).html("Guardar cambios");
				$(this).removeClass("btn-info");
				$(this).addClass("btn-success");
				$("#pregunta"+index+" .card-body").html('<textarea class="form-control">'+response.listPreguntas[index].respuesta+'</textarea>');
				$(this).siblings("button").children("h3").html("<input type='text' class='form-control' value='"+response.listPreguntas[index].pregunta+"'>");
				$(this).removeClass("editarPregunta");
				$(this).addClass("sendChangePregunta");
				}
				else {
					var index = $(this).data("index");
					var respuesta= $("#pregunta"+index+" .card-body textarea").val();
					var pregunta=$(this).siblings("button").children("h3").children("input").val()
					console.log(index);
					$(this).html("Editar");
					$(this).addClass("btn-info");
					$(this).removeClass("btn-success");
					$("#pregunta"+index+" .card-body").html(respuesta);
					$(this).siblings("button").children("h3").html("<b>"+pregunta+"</b>");
					$(this).removeClass("sendChangePregunta");
					$(this).addClass("editarPregunta");
				}
			
				
			
			
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

//-----------------------Cargar fundings----------------------------------//
function cargarPago() {
	$(".botonPatrocinio").click(function () {
		var id = $(this).data("idcontribucion");
		
		$.ajax({
			url: '../controller/cOpenPago.php',
			method: 'POST',
			data: { idcontribucion: id },
			success: function () {
			},
			error: function (xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});
	});
}