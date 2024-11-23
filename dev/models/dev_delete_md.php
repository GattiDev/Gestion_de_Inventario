<?php
    class Delete_Model{
        private $conexion;
        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }
    
        public function Delete_setting($data1){
            $consult = $this->conexion->query("CALL SP_Delete_Setting('$data1')");
            return var_dump($consult);
        }

        public function Delete_administrator($data1){
            $consult = $this->conexion->query("CALL SP_Delete_Administrator('$data1')");
            return var_dump($consult);
        }

        public function Delete_image($data1){
            $consult = $this->conexion->query("CALL SP_Delete_Image('$data1')");
            return var_dump($consult);
        }
    }
?>