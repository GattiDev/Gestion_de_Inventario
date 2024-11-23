<?php
    class Update_Model{
        private $conexion;
        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }
    
        public function Update_setting($data1, $data2, $data3){
            $consult = $this->conexion->query("CALL SP_Update_Setting('$data1', '$data2', '$data3')");
            return var_dump($consult);
        }
        
        public function Update_administrator($data1, $data2, $data3){
            $consult = $this->conexion->query("CALL SP_Update_Administrator('$data1', '$data2', '$data3')");
            return var_dump($consult);
        }
    }
?>