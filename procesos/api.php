<?php
    if(isset($_REQUEST['app'])):
        $response=array();
        $response['success'] = true;
        require "../class/conexion.php"; 
		$user = new ApptivaDB();
		//Productos
        $u=$user->buscar("equipos_productos","1"); 
        $response['listaequipos_productos']= array();
        if ($u):
        	   foreach ($u as $r):
        				$item = array(); 	
        		 		$item['id']		 	   = $r['id'];
        		 		$item['nombre']  	   = $r['nombre'];
        		 		$item['marca']   	   = $r['marca'];
        		 		$item['modelo']        = $r['modelo'];
        		 		$item['cantidad']      = $r['cantidad'];
        		 		$item['ubicacion']     = $r['ubicacion'];
        		 		$item['observaciones'] = $r['observaciones'];
        		 		$item['codigo']        = $r['codigo'];
        		 		$item['fecha']         = $r['fecha'];
        		 		$item['imagen']        = $r['imagen'];
        		 		$item['qr']            = $r['qr'];
        		 		array_push($response['listaequipos_productos'],$item); 
        		endforeach;
			endif;
			die(json_encode($response)); 
			//Proximos
    else:
    	$response['success'] = false;
    endif; 

    	
?>

