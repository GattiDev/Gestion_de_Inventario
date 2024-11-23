<?php
    class Get_Model{
        private $conexion;
        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }

        public function Get_Image($data1, $data2){
            $consult = $this->conexion->query("CALL SP_Get_Image('$data1', '$data2')");
            return $consult;
        }

        public function Get_productBox($data1){
            $consult = $this->conexion->query("CALL SP_Get_productBox('$data1')");
            return $consult;
        }

        public function Get_productCode($data1){
            $consult = $this->conexion->query("CALL SP_Get_productCode('$data1')");
            return $consult;
        }

        public function Get_statuId($data1){
            $consult = $this->conexion->query("CALL SP_Get_statuId('$data1')");
            return $consult;
        }

        public function Get_replenishCode($data1){
            $consult = $this->conexion->query("CALL SP_Get_replenishCode('$data1')");
            return $consult;
        }

        public function Get_productOrder($data1){
            $consult = $this->conexion->query("CALL SP_Get_productOrder('$data1')");
            return $consult;
        }

        public function Get_supplier($data1){
            $consult = $this->conexion->query("CALL SP_Get_supplier('$data1')");
            return $consult;
        }

        public function Get_Box($data1){
            $consult = $this->conexion->query("CALL SP_Get_Box('$data1')");
            return $consult;
        }

        public function Get_productSupplier($data1){
            $consult = $this->conexion->query("CALL SP_Get_productSupplier('$data1')");
            return $consult;
        }

        public function Get_SoldDetail($data1, $data2){
            $consult = $this->conexion->query("CALL SP_Get_SoldDetail('$data1', '$data2')");
            return $consult;
        }
    }
?>