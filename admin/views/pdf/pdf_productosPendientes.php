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
    
    //--------------- Primer encabezado de la tabla ---------------// 
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetDrawColor(40,40,40); //---> Color de los Bordes
    $pdf->SetFillColor(40,40,40); //--> Color del Fondo
    $pdf->SetTextColor(255); //---> Color de la Letra
    $pdf->SetLineWidth(.5);//---> Ancho del borde (.5 mm)
    $pdf->Cell(0,9,utf8_decode('Productos Pendientes'),1,1,'C',true);//---> Título
               
    //--------------- Segundo encabezado de la tabla ---------------//        
    $pdf->SetFillColor(91,148,207);
    $pdf->SetTextColor(255);
    $pdf->SetDrawColor(40,40,40);
    $pdf->SetLineWidth(.5);
    $pdf->SetFont('Times', 'B', 14);
    $pdf->Cell(30,10, utf8_decode('Código'), 1, 0, 'C',1);
    $pdf->Cell(98,10, utf8_decode('Producto | Descripción'), 1, 0, 'C',1);
    $pdf->Cell(22,10, utf8_decode('Cant.'), 1, 0, 'C',1);
    $pdf->Cell(40,10, utf8_decode('F.Pedido'), 1, 1, 'C',1);
            
    //---> Cuerpo de la Tabla 
    $pdf->SetFont('Arial', '', 12);
    //---> Restauración de colores y fuentes
    $pdf->SetTextColor(0);//---> LETRAS

    //---> Recorro 
    $obj_run = new Run_Model();
    $data_replenish = $obj_run->Run_replenish();
  
    while ($get_replenish = mysqli_fetch_assoc($data_replenish)) {   
        if($get_replenish['add_date'] == '0000-00-00'){
        
        
            $code = $get_replenish['code'];
            $amount = $get_replenish['amount'];
            $order_date = $get_replenish['order_date'];
            $OrderDate = date("d/m/Y", strtotime($order_date));
                          
                                               
            //--> Voy completando la tabla          
            $pdf->Cell(30,10, utf8_decode($code), 1, 0, 'C');
            
            //---> Obtengo el nombre del producto 
            $obj_get = new Get_Model();
            $data_producto = $obj_get->Get_productCode($code);
            while ($get_producto = mysqli_fetch_assoc($data_producto)) { 
                $product_description = $get_producto['product_description']; 
                $pdf->Cell(98,10, utf8_decode($product_description), 1, 0, 'C');
                $pdf->Cell(22,10, utf8_decode($amount), 1, 0, 'C'); 
                $pdf->Cell(40,10, utf8_decode($OrderDate), 1, 1, 'C'); 
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