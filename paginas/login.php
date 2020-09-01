<DOCTYPE html>
<html lang="es"> 
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="whidth=device-width, initial-scale=1.0">
  <meta http_equiv="X-UA-Compatible" content="ie-edge">   
	<title>IEMBK</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
  <link rel="stylesheet" href="inc/main.css" >
</head>

<body>

<div class="container">
    <div class="row justify-content-center pt-5 mt-5 mr-1">
      <div class="col-md-4 formulario">
        
          <div class="form-group text-center">  
           <h1 class="text-dark">Bienvenido al sistema de control y monitoreo de IEMBK</h1>
         </div>
         <div class="login-page">
         <div class="form-group text-center">

          <form action="procesos/login.php" method="POST">
          

            <div class="form-group mx-sm-4"> 
              <input type="email" class="form-control" class="txt-light"name="txtemail"required placeholder="Ingrese su correo"> 
           </div>

     
           <div class="form-group mx-sm-4">
               <input type="password" class="form-control"  name="txtpassword" required placeholder="Ingrese su contraseña" >
           </div>


           <div class="form-group mx-sm-4">
            <button type="submit" class="btn btn-success" name="btnlogin" value="ACCEDER">Ingresar</button>
           </form> 


        </form>
      </div>
    <div>
</div>



       

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



</body>
</html>
