<?php

/** Listado; Insertar; Editar; Eliminar;**/

$accion="listado";
if(isset($_REQUEST['accion']))
        $accion=$_REQUEST['accion'];
switch($accion):
    case "listado";
    ?>
    <br>
    <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading clearfix">
     </div>
        <div class="col-md-12">
            <div class="panel panel-default">
            <div class="float-right">
            <link rel="stylesheet" href="inc/main.css" >

            <a href="?pagina=productos&accion=insertar" class="btn btn-success active">Agregar equipo</a> <p>
    </div>
        </div>
        <div class="panel-body">
          <table class="table table-hover table-bordered table-dark">
            <thead>
              <tr>
                <th class="text-center" style="width: 1%;"> id</th>
                <th class="text-center" style="width: 8%;"> Nombre</th>
                <th class="text-center" style="width: 4%;"> Marca</th>
                <th class="text-center" style="width: 3%;"> Modelo</th>
                <th class="text-center" style="width: 1%;"> Cantidad</th>
                <th class="text-center" style="width: 8%;"> Ubicacion</th>
                <th class="text-center" style="width: 15%;"> Observaciones</th>
                <th class="text-center" style="width: 5%;">Codigo</th>
                <th class="text-center" style="width: 9%;">Fecha</th>
                <th class="text-center" style="width: 5%;">Imagen</th>
                <th class="center"      style="width: 5%;">  Qr <ion-icon name="qr-code-outline"></ion-icon></th>
                <th class="text-center" style="width: 15%;">Acciones</th>
              </tr>
            </thead>
    
            <tbody>
            
                <?php 
                $u=$user->buscar("equipos_productos","1"); 
                foreach($u as $r){
                    ?>
                    <tr>                    
                        <td class="text-center"><?php echo $r['id']; ?></td>
                        <td class="text-center"><?php echo $r['nombre']; ?></td>
                        <td class="text-center"><?php echo $r['marca']; ?></td>
                        <td class="text-center"><?php echo $r['modelo']; ?></td>
                        <td class="text-center"><?php echo $r['cantidad']; ?></td>
                        <td class="text-center"><?php echo $r['ubicacion']; ?></td>
                        <td class="text-center"><?php echo $r['observaciones']; ?></td>
                        <td class="text-center"><?php echo $r['codigo']; ?></td>
                        <td class="text-center"><?php echo $r['fecha']; ?></td>
                        <td class="text-center"><img src="img/<?php echo $r['imagen'];?> " style="width: 75px; height: 75px;"></td>
                        <td class="text-center"><img src="img/qr/<?php echo $r['qr'];?>"></td>
                        <td>
                           <center> 
                            <a href="?pagina=productos&accion=editar&id=<?php echo $r['id'] ?>" class="btn btn-success">Editar</a>
                            <a href="?pagina=productos&accion=eliminar&id=<?php echo $r['id'] ?>&imagen=<?php echo $r['imagen'] ?>"  onclick="return confirm('¿ Estas seguro de eliminarlo ?')" class="btn btn-danger">Eliminar</a>
                            </center>
                        </td>
                     <tr>
                    <?php
                }
                
                ?>
               
            </tbody>
        
            </table>
        </div>
</div>

     <?php
        echo "";
    break;


    case "insertar"; 
       if(isset($_POST['btn'])):
        
     
     $nombre         = $_POST['nombre'];
     $marca          = $_POST['marca'];
     $modelo         = $_POST['modelo'];
     $cantidad       = $_POST['cantidad'];
     $ubicacion      = $_POST['ubicacion'];
     $observaciones  = $_POST['observaciones'];
     $codigo         = $_POST['codigo'];
     $fecha      = $_POST['fecha'];

     /**Subir imagen al servidor**/
     $imagen         = $_FILES['imagen']['name'];
        if(move_uploaded_file($_FILES['imagen']['tmp_name'],"img/".$imagen))
        echo "Fotos subida";
       else
        echo "Fallo al subir la foto";

    /* -------------------------------------------------- */

    /**Genera qr**/
     $qr             = "imagen.jpg";
     $data           = "'".$nombre."','".$marca."','".$modelo."','".$cantidad."','".$ubicacion."','".$observaciones."','".$codigo."','".$fecha."','".$imagen."','".$qr."'";
     $u     = $user->insertar("equipos_productos",$data);
     if($u):

     require "class/phpqrcode/qrlib.php";

     $id = $user->lastInsertId();
     QRcode::png($id,"img/qr/qr_".$id.".png",'L',3,2);
     $user->actualizar("equipos_productos","qr='qr_".$id.".png'","id=".$id);

         echo "Regristrado correctamente";
       else:

        echo "Fallo al registrar";
       endif;


else:
    ?>
           
  
            <!--Formulario-->                
          <center>
          <link rel="stylesheet" href="inc/main.css" >
            <div class="container">
            <div class="row justify-content-center mt-5">
            <div class="col-md-4 formulario">

            <div class="float-right">
            <a href="?pagina=productos" class="btn btn-danger">Lista de equipos</a>
            </div>
            
            <div class="form-group text-center">  
                <form action="" enctype="multipart/form-data" method="post">

                <div class="form-group">
                <input type="text" class="form-control" required name="nombre" placeholder="Nombre del articulo">
                </div>

                <div class="form-group">
                <input type="text" class="form-control" required name="marca" placeholder="Marca del articulo">
                </div>

                <div class="form-group">
                <input type="text" class="form-control" required name="modelo" placeholder="Modelo del equipo">
                </div>

                <div class="form-group">
                <input type="number" class="form-control" required name="cantidad" placeholder="Cantidad">
                </div>


                <div class="form-group"> 
                <input type="text" class="form-control" required name="ubicacion" placeholder="Ubicacion">
                </div>


                <div class="form-group">
                <input type="text" class="form-control" required name="observaciones" placeholder="Observaciones y puntos a ejecutar">
                </div>

                <div class="form-group">
                <input type="text" class="form-control" required name="codigo" placeholder="Codigo">
                </div>

                <div class="form-group">
                <input type="date" class="form-control" required name="fecha" placeholder="Fecha"> 
                </div>           

                <div class= "col-md-4"> 
                <div class="row">
                <link rel="stylesheet" href="inc/btnfile.css"> 
                <div class="input-group"> 
                <div id="btn_subir"> 
                    <p id="texto">Imagen</p>              
                <input type="file" id="btn_enviar" required name="imagen" class="btn btn-primary">                   
                </div>   
                </div>
                </div>
                </div>

                <div class="form-group">
                <button type="submit" name="btn" class="btn btn-success">Agregar</button>  
                </div>
                </div>  
                </div>
                </form>
             </div>
        </center>

    <?php
endif;

/**Editar todo el formulario con qr**/
    break;
    case "editar";
        
    if(isset($_POST['btn'])):

        $nombre         = $_POST['nombre'];
        $marca          = $_POST['marca'];
        $modelo         = $_POST['modelo'];
        $cantidad       = $_POST['cantidad'];
        $ubicacion      = $_POST['ubicacion'];
        $observaciones  = $_POST['observaciones'];
        $codigo         = $_POST['codigo'];
        $fecha      = $_POST['fecha'];
   
        /**Subir imagen al servidor**/
        $imagen         = $_FILES['imagen']['name'];
           if(move_uploaded_file($_FILES['imagen']['tmp_name'],"img/".$imagen))
           echo "Foto subida";
          else
           echo "Fallo al subir la foto";
   
       /* -------------------------------------------------- */
   
       /**Genera qr**/
        $qr             = "imagen.jpg";
        $data           = "nombre='".$nombre."',marca='".$marca."',modelo='".$modelo."',cantidad='".$cantidad."',ubicacion='".$ubicacion."',observaciones='".$observaciones."',codigo='".$codigo."',fecha='".$fecha."',imagen='".$imagen."',qr='".$qr."'";
        $u     = $user->actualizar("equipos_productos",$data, "id=".$_REQUEST['id']);
        if($u):
   
        require "class/phpqrcode/qrlib.php";
   
        $id = $_REQUEST['id'];
        QRcode::png($id,"img/qr/qr_".$id.".png",'L',3,2);
        $user->actualizar("equipos_productos","qr='qr_".$id.".png'","id=".$id);
   
            echo "Actualizado correctamente";
          else:
   
           echo "Fallo al actualizar";
          endif;
   
   
   else:

    $u= $user->buscar("equipos_productos","id=".$_REQUEST['id']);
    foreach($u as $r):
    
       ?>
       
               <!--Formulario-->
            <link rel="stylesheet" href="inc/main.css" >
            <div class="container">
            <div class="row justify-content-center mt-5">
            <div class="col-md-4 formulario">
               <div class="float-right">
               <a href="?pagina=productos" class="btn btn-danger">Lista de equipos</a> 
               </div>
             <center>
                    
                    <div class="form-group text-center"> 
                   <form action="" enctype="multipart/form-data" method="post">
   
                   <div class="form-group">
                   <input type="text" class="form-control" required name="nombre"  value="<?php echo $r['nombre'] ?>" placeholder="Nombre del articulo">
                   </div>
   
                   <div class="form-group">
                   <input type="text" class="form-control" required name="marca" value="<?php echo $r['marca'] ?> " placeholder="Marca del articulo">
                   </div>
   
                   <div class="form-group">
                   <input type="text" class="form-control" required name="modelo" value="<?php echo $r['modelo'] ?> " placeholder="Modelo del equipo">
                   </div>
   
                   <div class="form-group">
                   <input type="number" class="form-control" required name="cantidad" value="<?php echo $r['cantidad'] ?> " placeholder="Cantidad">
                   </div>
   
   
                   <div class="form-group"> 
                   <input type="text" class="form-control" required name="ubicacion" value="<?php echo $r['ubicacion'] ?> " placeholder="Ubicacion">
                   </div>
   
   
                   <div class="form-group">
                   <input type="text" class="form-control" required name="observaciones" value="<?php echo $r['observaciones'] ?> " placeholder="Observaciones y puntos a ejecutar">
                   </div>
   
   
                   <div class="form-group">
                   <input type="text" class="form-control" required name="codigo" value="<?php echo $r['codigo'] ?> " placeholder="Codigo">
                   </div>
   
                   <div class="form-group">
                   <input type="text" class="form-control" required name="fecha"  value="<?php echo $r['fecha'] ?> " placeholder="Fecha"> 
                   </div>
               
   
                   <div class= "col-md-4"> 
                <div class="row">
                <link rel="stylesheet" href="inc/btnfile.css"> 
                <div class="input-group"> 
                <div id="btn_subir"> 
                    <p id="texto">Imagen</p>              
                <input type="file" id="btn_enviar" required name="imagen" class="btn btn-primary">                   
                </div>   
                </div>
                </div>
                </div>
   
                   <div class="form-group">
                   <button type="submit" name="btn" class="btn btn-success">Actualizar</button>  
                   <input type="hidden" name="id" value="<?php echo $_REQUEST['id']?> ">
                   </div>
                       
                   </div>
                   </div>
                   </div>
                   </form>
                </div>
           </center>
   
       <?php
       endforeach;
   endif;
   
    break;

     case "eliminar";
       
     if(isset($_REQUEST['id'])):

        $u= $user->borrar("equipos_productos", "id=".$_REQUEST['id']);
        if($u):
            if(unlink("img/".$_REQUEST['imagen']))
            
            echo "¡Foto y Qr eliminada!";

            else 

            echo "¡Foto y QR no eliminada!";


            echo "¡ Eliminado Exitosamente !";

        else:

            echo "¡ No se elimino !";

        endif;

     endif;

    break;

    case"busqueda";

    if(isset($_REQUEST['id'])):
        $u = $user->buscar("equipos_productos", "id=".$_REQUEST['id']);
        if($u):
            
    
    $codigo = $_POST['codigo']; 
    mysql_select_db($db,$this->conexion) or die ("Error en la conexion de base de datos");
    $registros = mysql_query("SELECT * FROM datos WHERE mantenimiento = '$id'");
    while ($registro = mysql_fetch_array($registros)){
        echo $registro['id']." ".$registro['nombre']." ".$registro['marca']." ".$registro['codigo']." ".$registro['ubicacion']." ".$registro['fecha']; 
    }

    endif;
endif;
endswitch; 

?>

