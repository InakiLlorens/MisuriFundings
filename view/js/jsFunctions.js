$( document ).ready(function() {
	//------------------Comprobar login-------------------------//	
	$.ajax({
	    url:'controller/cLoginCheck.php',
	    dataType:'json',
	    success: function(response) {
	        console.log(response)
	        if (response.success == true) {
	            window.location = "view/vMain.html";
	        }else {
                console.log(response);
            }
	    },
	    error: function(xhr) {
	        alert("An error occured: " + xhr.status + " " + xhr.statusText);
	    }	    
    });

	//---------------------------------------------------------//

    $("#openLogin").on("click", function() {
        $(this).parent().hide();
        $(".loginContainer").slideDown();      
    });
    
    $("#loginForm input").on("keypress", function() {
		$("#loginAlert").slideUp();
	});

    $("#loginForm a").on("click", function() {
        $("#loginAlert").slideUp();
        $(this).parent().parent().slideUp();
        $("#registerForm").slideDown();      
    });
    
    $("#backToLogin").on("click", function() {
        $(this).parent().slideUp();
        $(this).parent().slideUp();
        $("#loginForm").slideDown();
        $("#alertContrasenas").slideUp();
			$("#registerPassword1").css("border", "1px solid #ced4da");
			$("#registerPassword2").css("border", "1px solid #ced4da");
    });

    $("#loginButton").on("click", function() {
        var username = $("#loginUsername").val();
        var password = $("#loginPassword").val();

        $.ajax({
            url:'controller/cLogin.php',
            method:'POST',
            dataType:'json',
            data:{
                user: username,
                pass: password
            },
            success:function(response) {
                console.log(response)
                if (response.success == false) {
                    $("#loginAlert").html("Comprueba bien los campos");
                    $("#loginAlert").slideDown();
                }else {
                    $("#loginForm").slideUp();
                    $(".header").html("<h1>¡Te has loggeado con exito!</h1> Pasatelo bien apoyando a tus artistas").ready();
                    setTimeout(function() { window.location = "view/vMain.html";}, 1000);                  
                }
            },
            error: function(xhr) {
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
            }            
        });
    });


    $("#registerPassword2").on("focusout", function () {//esto comprieba si la contraseña esta bien puesta por segunda vez
		htmlzatia = "";
		if ($(this).val() != $("#registerPassword1").val()) {
			$("#registerPassword1").css("border", "1px solid #fc3a28");
			$(this).css("border", "1px solid #fc3a28");
			$("#alertContrasenas").slideDown();

		}
		else {
			$("#alertContrasenas").slideUp();
			$("#registerPassword1").css("border", "1px solid #ced4da");
			$(this).css("border", "1px solid #ced4da");
		}
	});
	$("#registerPassword1").on("focusout", function () {
		if ($(this).val() == $("#registerPassword2").val()) {
			$("#alertContrasenas").slideUp();
			$("#registerPassword2").css("border", "1px solid #ced4da");
			$(this).css("border", "1px solid #ced4da");
		}

    });

    $("#registerButton").on("click", function() {
        var nombre=$("#registerName").val();
        var apellido=$("#registerSurname").val();
        var usuario=$("#registerUsername").val();
        var contrasena=$("#registerPassword1").val();
        var contrasena2=$("#registerPassword2").val();
        var email=$("#registerEmail").val();
        
        console.log(nombre+apellido+contrasena+email);
       
        if (nombre.length!=0 && apellido.length!=0 && usuario.length!=0 && contrasena!=0 && contrasena==contrasena2) {
	        $.ajax({
	            url:'controller/cRegister.php',
	            method: 'POST',
	            data:{
	                nombre: nombre,
	                apellido: apellido,
	                usuario: usuario,
	                contrasena: contrasena,
	                email: email,
	            },
	            success:function(){
    
	            },
	            error: function(xhr) {
	                alert("An error occured: " + xhr.status + " " + xhr.statusText);
	            }
	        });
        }
        else{
            alert("rellena todos los campos correctamente");
        }
    });

});