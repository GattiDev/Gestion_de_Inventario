<?php
    //---> IMPORTACIONES 
    require('../../../bookstores/pdf/fpdf/fpdf.php');
    include('../../../setting/database.php');
    require_once "../../../admin/models/admin_model.php";

    class PDF extends FPDF{
        //---> Footer  
        function Footer(){
            $this->Ln(1);
            $this->Cell(70);
            $this->SetFont('Arial','I',10);
            $this->Cell(40,6,utf8_decode('Página ').$this->PageNo().' de {nb}',0,1,'C');
            $this->Ln(-3);
            
            $this->SetFont('Arial','B',10);
            $this->Cell(50,0,'Gatti Dev',0,2,'L');
            $this->Cell(18);
            
            $this->SetFont('Arial','I',9);
            $this->Cell(190,0,utf8_decode('www.gattidev.com'),0,2,'L');

            $this->SetFont('Arial','B',10);
            $this->Cell(0,0,'Jose Genna Respuestos S.R.L.',0,2,'R');
            $this->Cell(18);
        }
    }

    //---> Configuracion del Archivo PDF  
    $pdf = new PDF('P','mm','A4'); 
    $pdf->AddPage();
    $pdf->AliasNbPages();
    
     //---> Recorro 
    $obj_run = new Run_Model();
    $data_supplier = $obj_run->Run_supplier();
  
    while ($get_supplier = mysqli_fetch_assoc($data_supplier)) {     
        $Supplier = $get_supplier['code_supplier'] . " ~ " . $get_supplier['supplier'];
    
        //--------------- Primer encabezado de la tabla ---------------// 
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetDrawColor(40,40,40); //---> Color de los Bordes
        $pdf->SetFillColor(40,40,40); //--> Color del Fondo
        $pdf->SetTextColor(255); //---> Color de la Letra
        $pdf->SetLineWidth(.5);//---> Ancho del borde (.5 mm)
        $pdf->Cell(0,9,utf8_decode($Supplier),1,1,'C',true);//---> Título
              
        //--------------- Segundo encabezado de la tabla ---------------//         
        $pdf->SetFillColor(91,148,207);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(40,40,40);
        $pdf->SetLineWidth(.5);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell(32,10, utf8_decode('Codigo'), 1, 0, 'C',1);
        $pdf->Cell(140,10, utf8_decode('Producto | Descripción'), 1, 0, 'C',1);
        $pdf->Cell(18,10, utf8_decode('Pedir'), 1, 1, 'C',1);
            
        $valor = $get_supplier['id'];
      
        //---> Cuerpo de la Tabla 
        $pdf->SetFont('Arial', '', 12);
        //---> Restauración de colores y fuentes
        $pdf->SetTextColor(0);//---> LETRAS

        $obj_getPs = new Get_Model();
        $data_productSupplier = $obj_getPs->Get_productSupplier($valor);

        while ($get_productSupplier = mysqli_fetch_assoc($data_productSupplier)) { 
        
            $code = $get_productSupplier['code'];
            $product_description = $get_productSupplier['product_description'];

            $box = $get_productSupplier['box'];
            
            if($get_productSupplier['replenish_product'] == 'not'){
            
                if($get_productSupplier['priority'] == 'yes'){
                    
                    $obj_get = new Get_Model();
                    $data_box = $obj_get-> Get_Box($box);

                    while ($get_box = mysqli_fetch_assoc($data_box)) { 
                        
                        $amount = 0;
                    
       
                        $stock = $get_box['stock'];
                        $minimun = $get_box['minimun_product'];
            
                        if($stock < $minimun){
                            $amount = $minimun - $stock;
             
                            
                            //--> Voy completando la tabla          
                            $pdf->Cell(32,10, utf8_decode($code), 1, 0, 'C');
                            $pdf->Cell(140,10, utf8_decode($product_description), 1, 0, 'C');  
                            $pdf->Cell(18,10, $amount, 1, 1, 'C'); 
                        }    
                    }
                }
            }
        }
    }   
 
    //--------------- Ver el PDF ---------------//
    $pdf->Output();

    /*#####################################################################*/
        /*##################### INFO #########################*/
    /*#####################################################################*/
    //---> Link de la libreria y para saber mas detalle de su funcionamineto http://www.fpdf.org/?go=script&id=16
?>