<!DOCTYPE html>
<html lag="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="whidth=device-width, initial-scale=1.0">
    <meta http_equiv="X-UA-Compatible" content="ie-edge">   
	<title>IEMBK</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
	integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"> </script>
	<script src="../inc/adicional.css"> </script>
</head>


<body>
	<?php if(isset($_SESSION['administrador'])):?>
		<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark sticky-top">
			<div class="container">
				<a class="navbar-brand">PANEL DE CONTROL</a>
  		
<ul class="navbar-nav mr-auto ">
    <li class="nav-item active">
		<a class="nav-link" href="<?php echo urlsite?>">Inicio</a>
	</li>
     	 
	<li class="nav-item">
        <a class="nav-link" href="?pagina=galeria">Galeria</a>
    </li>

	<li class="nav-item">
        <a class="nav-link" href="?pagina=productos">Administrar Equipos</span></a>
    </li>

		
	<li class="nav-item">
        <a class="nav-link" href="?pagina=checklist">Check List</a>
	</li>
<!--	
    <li class="nav-item">
        <a class="nav-link" href="?pagina=generar_reporte">Generar reportes</a>
	</li>
--> 

	</li>	
</ul>
	

	<!--Buscador--> 
		
		<form class="form-inline my-2 my-lg-2">
		 	<form action="<?php echo urlsit?>?pagina=busqueda>" method="post" class="form-search">
    	 		<input type="text" class="form-control mr-sm-4" name="codigo" placeholder="Busqueda Filtrada">
	 	 		<input type="submit" href="<?php echo urlsit?>?pagina=busqueda>" class="btn btn-outline-success text-white" name="codigo" value="Buscar" >
    		</form>
		</form>


    <!--Termina busqueda-->   
	

		<form class="form-inline my-2 my-lg-0">
				<a class="nav-link"  href="<?php echo urlsite?>procesos/logout.php">Salir</a>
		</form>  

	</div>
</nav>

<?php endif;?>

