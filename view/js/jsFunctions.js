$( document ).ready(function() {
   



    $("#loginForm a").on("click", function(){
  
        $(this).parent().parent().slideUp();
        $("#registerForm").slideDown();
        
    });
    $("#backToLogin").on("click", function(){
        $(this).parent().slideUp()
        $("#loginForm").slideDown();
       
    });

});