<?php
    class Put_Model{
        private $conexion;
        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }
    
        public function Put_setting($data1, $data2, $data3){
       
            if($data1 == '' || $data3 == ''){
                return var_dump('False');
            }else{
                $consult = $this->conexion->query("CALL SP_Put_Setting('$data1', '$data2', '$data3')");
                return var_dump($consult);
            }
        }

        public function Put_administrator($data1, $data2, $data3, $data4, $data5){
            if($data3 == ''){
                return var_dump('False');
            }else{
                $encryption = password_hash($data3, PASSWORD_BCRYPT, ['cost'=>14]);
                $consult = $this->conexion->query("CALL SP_Put_Administrator('$data1', '$data2', '$data3', '$encryption', '$data4', '$data5')");
                return var_dump($consult);
            }
            
        }
        
        public function Put_image($data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8){
            $binaryImage = mysqli_escape_string($this->conexion, $data4);
            $consult = $this->conexion->query("CALL SP_Put_image('$data1', '$data2', '$data3', '$binaryImage', '$data5', '$data6', '$data7', '$data8')");
            return;
        }

        
    }
?>