<?php
    class ApptivaDB{    
    private $host   ="localhost";
    private $usuario="root";
    private $clave  ="";
    private $db     ="mantenimiento";
    public $conexion;
    public function __construct(){
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave,$this->db) or die(mysql_error());
        $this->conexion->set_charset("utf8");
    }

        /** Insertar los datos **/
        public function insertar($tabla, $datos){
            $resultado =    $this->conexion->query("INSERT INTO $tabla VALUES (null,$datos)") or die($this->conexion->error);
            if($resultado)
                return true;
            return false;
        } 

        /** Borrar los datos **/
        public function borrar($tabla, $condicion){
            $resultado = $this->conexion->query("DELETE FROM $tabla WHERE $condicion") or die($this->conexion->error);
            if($resultado)
                return true;
            return false;
        }

        /** Actualizar los datos **/
        public function actualizar($tabla, $campos, $condicion){
            $resultado = $this->conexion->query("UPDATE $tabla SET $campos WHERE $condicion") or die($this->conexion->error);
            if($resultado)
                return true;
            return false;
        }


        /** Buscar los datos **/
        public function buscar($tabla, $condicion){
            $resultado = $this->conexion->query("SELECT * FROM $tabla WHERE $condicion") or die($this->conexion->error);
            if($resultado)
                return $resultado->fetch_all(MYSQLI_ASSOC);
            return false;
        } 

        /**Insertar datos */
        
        public function lastInsertId(){
            return $this->conexion->insert_id;

        }

            /**Consulta datos */

        public function consulta ($tabla, $condicion){
            $resultado = $this->conexion->query("SELECT * FROM $tabla WHERE $consulta") or die($this->conexion->error);
            if($resultado)
                return $resultado->fetch_all(MYSQLI_ASSOC);
            return false;
        } 

}
?>