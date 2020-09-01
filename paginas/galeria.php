<?php
require_once 'class/conexion.php';
?>

        <div class="col-md-12">
            <div class="panel panel-default">
            <div class="float-right">
            <link rel="stylesheet" href="inc/main.css" >
  	   </div>

         <a href="?pagina=generar_reporte" class="btn btn-success active">Generar reporte</a> <p>

        <br>
        <div>
         <div class="panel-body">
          <table class="table table-hover table-bordered table-dark">
            <thead>
              <tr>
                <th class="text-center" style="width: 25%;">IMAGEN</th>
                 <th class="text-center" style="width: 25%;">NOMBRE</th> 
                 <th class="text-center" style="width: 25%;">DESCRIPCION</th>
                <th class="text-center" style="width: 25%;">FECHA</th>            
              </tr>
            </thead>
    </div>
       
        <tbody>   
            <?php 
            $u=$user->buscar("equipos_productos","1"); 
            foreach($u as $r){
                ?>
                <tr>                
                    <td><img src="img/<?php echo $r['imagen'];?> " style="width: 300px; height: 200px;"></td>
                    <td class="text-center"><?php echo $r['nombre']; ?></td>
                    <td class="text-center"><?php echo $r['observaciones']; ?></td>
                    <td class="text-center"><?php echo $r['fecha']; ?></td>    
                 <tr>
                <?php
            }   
            ?>
              
        </tbody>
    