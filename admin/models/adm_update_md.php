<?php
    class Update_Model{
        private $conexion;
        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }

        public function Update_supplier($data1, $data2, $data3, $data4){
            $consult = $this->conexion->query("CALL SP_Update_supplier('$data1', '$data2', '$data3', '$data4')");
            return var_dump($consult);
        }

        public function Update_product($data1, $data2, $data3, $data4, $data5, $data6){
            $consult = $this->conexion->query("CALL SP_Update_product('$data1', '$data2', '$data3', '$data4', '$data5', '$data6')");
            return var_dump($consult);
        }

        public function Update_IdBox($data1, $data2, $data3){
            $consult = $this->conexion->query("CALL SP_Update_IdBox('$data1', '$data2', '$data3')");
            return var_dump($consult); 
        }

        public function Update_boxMin($data1, $data2, $data3){
            $consult = $this->conexion->query("CALL SP_Update_boxMin('$data1', '$data2', '$data3')");
            return var_dump($consult);
        }

        public function Update_BoxStock($data1, $data2){
            $consult = $this->conexion->query("CALL SP_Update_BoxStock('$data1', '$data2')");
            return $consult;
        }

        public function Update_BoxStatu($data1, $data2){
            $consult = $this->conexion->query("CALL SP_Update_BoxStatu('$data1', '$data2')");
            return $consult;
        }

        public function Update_productStock($data1, $data2){
            $consult = $this->conexion->query("CALL SP_Update_productStock('$data1', '$data2')");
            return $consult;
        }

        public function Update_ProductStatu($data1, $data2){
            $consult = $this->conexion->query("CALL SP_Update_ProductStatu('$data1', '$data2')");
            return $consult;
        }

        public function Update_soldDetail($data1, $data2){
            $consult = $this->conexion->query("CALL SP_Update_soldDetail('$data1', '$data2')");
            return $consult;
        }

        public function Update_replenishProduct($data1, $data2){
            $consult = $this->conexion->query("CALL SP_Update_replenishProduct('$data1', '$data2')");
            return $consult; 
        }

        public function Update_dardeAlta($data1, $data2){
            $consult = $this->conexion->query("CALL SP_Update_dardeAlta('$data1', '$data2')");
            return $consult;
        }

        public function Update_replenish($data1){
            $consult = $this->conexion->query("CALL SP_Update_replenish('$data1')");
            return $consult;
        }

        public function Update_SupplierStatu($data1){
            $consult = $this->conexion->query("CALL SP_Update_SupplierStatu('$data1')");
            return $consult;
        }

        public function Update_deposito($data1, $data2, $data3, $data4, $data5){
            $consult = $this->conexion->query("CALL SP_Update_deposito('$data1', '$data2', '$data3', '$data4', '$data5')");
            return $consult;
        }
        
    }
?>
