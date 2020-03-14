$( document ).ready(function() {
   

//------------------comprobar login-------------------------//

$.ajax({
    url:'controller/cLoginCheck.php',
    method: "GET",
    dataType:'json',
    success:function(response){
        console.log(response)
        if (response.success==true){
            window.location = "http://www.google.com";
        }
    },
    error : function(xhr) {
        alert("An error occured: " + xhr.status + " " + xhr.statusText);
    }
    
});



//---------------------------------------------------------//


$("#loginForm input").on("keypress", function(){
$("#loginAlert").slideUp();
});

    $("#loginForm a").on("click", function(){
        $("#loginAlert").slideUp();
        $(this).parent().parent().slideUp();
        $("#registerForm").slideDown();
        
    });
    $("#backToLogin").on("click", function(){
        $(this).parent().slideUp()
        $("#loginForm").slideDown();
    });

    $("#loginButton").on("click", function(){
        var username = $("#loginUsername").val();
        var password = $("#loginPassword").val();

 
        $.ajax({
            url:'controller/cLogin.php',
            method: "POST",
            dataType:'json',

            data:{
                user: username,
                pass: password
            },
            success:function(response){
                console.log(response)
                if (response.success==false){
                    $("#loginAlert").html("Comprueba bien los campos")
                    $("#loginAlert").slideDown();
                }
                else{
                    $("#loginForm").slideUp();
                    $(".header").html("<h1>¡Te has loggeado con exito!</h1> Pasatelo bien apoyando a tus artistas").ready();
                    setTimeout(function(){ window.location = "www.google.com"; }, 1000);
                   
                }
            },
            error : function(xhr) {
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
            }
            
        });

    });


});