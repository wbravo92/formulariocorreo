
<?php
$mensaje=""; 
$mensaje2="";

if($_POST){
      

if(!$_POST['nombre']){
    
$mensaje.="Ingrese un nombre <br>";

}
if(!$_POST['apellido']){
$mensaje.="Ingrese un apellido <br>";
}

if(!$_POST['correo']){
$mensaje.="Ingrese un correo<br>";
}
    
if(filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)==false){
    
 $mensaje.="Ingrese un correo valido <br>";   
}
    
if(!$_POST['asunto']){
$mensaje.="Ingrese un asunto <br>";
}
    
if($mensaje!=""){
    
$mensaje= "<div class='alert alert-danger' role='alert'><strong>".$mensaje."</strong></div>";
    
    
    
}else{
    
$emailA="wbravoanoni@gmail.com";
$asunto= "Correo de prueba";
$contenido= $_POST['asunto'];
$cabecera= "from".$_POST['correo'];
if (mail($emailA,$asunto,$contenido,$cabecera)){
 $mensaje2= "<div class='alert alert-success' role='alert'>Su mensaje fue enviado con exito</div>";
  
}else{
 $mensaje2= "<div class='alert alert-danger' role='alert'><strong>Su mensaje NO fue enviado</strong></div>";
  
};
} 
}else{
    
    echo "no se han enviado datos";
}

?>


<!DOCTYPE html>



<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LandingPage</title>

    
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

  </head>
  <body>

        
<form class="container" style="margin-top:20px;width:40%" method="post">
    <legend>Formulario de ingreso de datos</legend>
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre">
    <div id=fnombre></div>
  </div>
  <div class="form-group">
    <label for="apellido">Apellido</label>
    <input type="apellido" class="form-control" id="apellido" name="apellido" placeholder="Ingresa tu apellido">
     <div id=fapellido></div>
  </div>
  <div class="form-group">
    <label for="correo">Correo</label>
    <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo">
     <div id=fcorreo></div>
  </div>
  <div class="form-group">
    <label for="asunto">Asunto</label>
    <textarea type="text" class="form-control" id="asunto" name="asunto" placeholder="Ingresa un mensaje"></textarea>
     <div id=fasunto></div>
  </div>
  <button type="submit" class="btn btn-default">Enviar</button>
  
  <div id="error"><?php echo $mensaje." ".$mensaje2 ?></div>
</form>
   
   <!--Validar datos jquery-->
   
   

    


   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
   <script src="bootstrap/js/bootstrap.js"></script>
   
   
       <script type="text/javascript">
        
               
        $("form").submit(function(e){
        var error="";
          $("#fnombre").html("<p class='help-block'></p>");    
          $("#fapellido").html("<p class='help-block'></p>");    
          $("#fcorreo").html("<p class='help-block'></p>");    
          $("#fasunto").html("<p class='help-block'></p>");    
         
            
            
        if($("#nombre").val()==""){
            
            error+="falta el campo nombre <br>"
             $("#fnombre").html("<p class='help-block'>Falta el campo nombre</p>");
        }
            
        if($("#apellido").val()==""){
            
            error+="falta el campo apellido <br>"
             $("#fapellido").html("<p class='help-block'>Falta el campo apellido</p>");
        }
            
        if($("#correo").val()==""){
                
            error+="Ingresa el campo correo <br>";
             $("#fcorreo").html("<p class='help-block'>Falta el campo correo</p>");
        }
            
        if($("#asunto").val()==""){
                
            error+="Ingresa el campo asunto <br>"
             $("#fasunto").html("<p class='help-block'>Falta el campo mensaje</p>");
        }
            
        if(error==""){
            //envia formulario
            
        }if(error!=""){
            $("#error").html("<div class='bg-warning'>"+error+"</div>");
            return false;
        }else{
            return true;
        }       
        });
      
    </script>
  </body>
</html>