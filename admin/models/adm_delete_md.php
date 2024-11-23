<?php
    class Delete_Model{
        private $conexion;
        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }

        public function Delete_supplier($data1){
            $consult = $this->conexion->query("CALL SP_Delete_Supplier('$data1')");
            return var_dump($consult);
        }

        public function Delete_product($data1){
            $consult = $this->conexion->query("CALL SP_Delete_product('$data1')");
            return var_dump($consult);
        }

        public function Delete_productS($data1){
            $consult = $this->conexion->query("CALL SP_Delete_product('$data1')");
            return $consult;
        }

        public function Delete_box($data1){
            $consult = $this->conexion->query("CALL SP_Delete_box('$data1')");
            return $consult;
        }

        public function Delete_soldDetail($data1){
            $consult = $this->conexion->query("CALL SP_Delete_soldDetail('$data1')");
            return $consult;
        }

        public function Delete_replenish($data1){
            $consult = $this->conexion->query("CALL SP_Delete_replenish('$data1')");
            return $consult;
        }

        public function DeleteTotal_datagraph(){
            $consult = $this->conexion->query("CALL SP_DeleteTotal_datagraph()");
            return $consult;
        }

        public function DeleteTotal_Graph_AreaPolar(){
            $consult = $this->conexion->query("CALL SP_DeleteTotal_Graph_AreaPolar()");
            return $consult;
        }

        public function Delete_deposito($data1){
            $consult = $this->conexion->query("CALL SP_Delete_deposito('$data1')");
            return var_dump($consult);
        }
    }
?>