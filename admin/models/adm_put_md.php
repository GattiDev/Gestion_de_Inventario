<?php
    class Put_Model{
        private $conexion;
        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }

        public function Put_supplier($data1, $data2, $data3, $data4){
            $consult = $this->conexion->query("CALL SP_Put_supplier('$data1', '$data2', '$data3', '$data4')");
            return var_dump($consult);
        }

        public function Put_product($data1, $data2, $data3, $data4, $data5, $data6){
            $consult = $this->conexion->query("CALL SP_Put_product('$data1', '$data2', '$data3', '$data4', '$data5', '$data6')");
            return var_dump($consult);
        }

        public function Put_box($data1){
            $consult = $this->conexion->query("CALL SP_Put_box('$data1')");
            return var_dump($consult); 
        }

        public function Put_soldDetail($data1, $data2){
            $consult = $this->conexion->query("CALL SP_Put_soldDetail('$data1', '$data2')");
            return var_dump($consult);
        }

        public function Put_replenish($data1, $data2, $data3){
            $consult = $this->conexion->query("CALL SP_Put_replenish('$data1', '$data2', '$data3')");
            return $consult;
        }

        public function Put_datagraph($data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8, $data9, $data10, $data11, $data12, $data13, $data14, $data15, $data16){
            $consult = $this->conexion->query("CALL SP_Put_datagraph('$data1', '$data2', '$data3', '$data4', '$data5', '$data6', '$data7', '$data8', '$data9', '$data10', '$data11', '$data12', '$data13', '$data14', '$data15', '$data16')");
            return $consult;
        }

        public function Put_Graph_AreaPolar($data1, $data2, $data3){
            $consult = $this->conexion->query("CALL SP_Put_Graph_AreaPolar('$data1', '$data2', '$data3')");
            return $consult;
        }

        public function Put_deposito($data1, $data2, $data3, $data4, $data5){
            $consult = $this->conexion->query("CALL SP_Put_deposito('$data1', '$data2', '$data3', '$data4', '$data5')");
            return var_dump($consult);
        }
        
    }
?>