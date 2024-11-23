<?php
    class Run_Model{
        private $conexion;
        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }

        public function Run_supplier(){
            $consult = $this->conexion->query("CALL SP_Run_supplier()");
            return $consult;
        }

        public function Run_Product(){
            $consult = $this->conexion->query("CALL SP_Run_Product()");
            return $consult;
        }

        public function Run_box(){
            $consult = $this->conexion->query("CALL SP_Run_box()");
            return $consult;
        }

        public function Run_soldDetail(){
            $consult = $this->conexion->query("CALL SP_Run_soldDetail()");
            return $consult;
        }

        public function Run_replenish(){
            $consult = $this->conexion->query("CALL SP_Run_replenish()");
            return $consult;
        }

        public function Run_productOrder(){
            $consult = $this->conexion->query("CALL SP_Run_productOrder()");
            return $consult;
        }

        public function Run_productReplenishProduct(){
            $consult = $this->conexion->query("CALL SP_Run_productReplenishProduct()");
            return $consult;
        }

        
        public function Run_datagraph(){
            $consult = $this->conexion->query("CALL SP_Run_datagraph()");
            return $consult;
        }

        public function Run_SoldDetailGraph(){
            $consult = $this->conexion->query("CALL SP_Run_SoldDetailGraph()");
            return $consult;
        }

        public function Run_selectYear(){
            $consult = $this->conexion->query("CALL SP_Run_selectYear()");
            return $consult;
        }
        
         public function Run_graph_area_polar(){
            $consult = $this->conexion->query("CALL SP_Run_graph_area_polar()");
            return $consult;
        }
         
        public function Run_Deposit(){
            $consult = $this->conexion->query("CALL SP_Run_deposit()");
            return $consult;
        }

        public function Run_ListaVentas(){
            $consult = $this->conexion->query("CALL SP_RUN_listaVentas()");
            return $consult;
        }
    }
?>
