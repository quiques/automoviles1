
//validacion Login
 $( document ).ready(function() {    
  $('#envia').click(function(e){
      e.preventDefault();
      var user = $('.usuario').val();
      var pass = $('.password').val();   
      if(user != '' && pass != ''){ 
       $.ajax({
          url: 'datos.php',
          method: 'POST',
          data: {usuario: user, password: pass},
          success: function(msg){
           if(msg=='1'){
          $('#mensaje').html('Datos incorrectos');
        }else{
          window.location = msg;
        }
      }
        });    
      }else{
         $('#mensaje').html('Ingrese los datos');
      }
  });
});

