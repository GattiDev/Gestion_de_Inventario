<?php
    class Run_Model{
        private $conexion;
        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }
    
        public function Run_setting(){
            $consult = $this->conexion->query("CALL SP_Run_Setting()");
            return $consult;
        }
        
        public function Run_administrator(){
            $consult = $this->conexion->query("CALL SP_Run_Administrator()");
            return $consult;
        }

        public function Run_image(){
            $consult = $this->conexion->query("CALL SP_Run_image()");
            return $consult;
        }
    }
?>