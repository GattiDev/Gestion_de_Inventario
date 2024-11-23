<?php
    //---> IMPORTACIONES 
    require('../../../bookstores/pdf/fpdf/fpdf.php');
    include('../../../setting/database.php');
    require_once "../../../admin/models/admin_model.php";

    class PDF extends FPDF{}

    //---> Configuracion del Archivo PDF  
    $pdf = new PDF('P','mm','A4'); 
    $pdf->AddPage();
    $pdf->AliasNbPages();
    
     //---> Recorro 
    $obj_run = new Run_Model();
    $data_listaventas = $obj_run->Run_ListaVentas();
    
    //--> Titulo Derecho
    $pdf->SetFont('Arial','B',18);
    $pdf->SetFillColor(91,148,207);
    $pdf->SetTextColor(255);
    $pdf->SetDrawColor(40,40,40);
    $pdf->SetLineWidth(.5);
    $pdf->SetLineWidth(.5);//---> Ancho del borde (.5 mm)
    $pdf->Cell(0,9,utf8_decode('Listas de Ventas 2024'),1,3,'R',true);//---> Título

    while ($get_listaventas = mysqli_fetch_assoc($data_listaventas)) {     
        
        $listaventas = $get_listaventas['code'] . " ~ " . $get_listaventas['description'];
    
        //--------------- Primer encabezado de la tabla ---------------// 
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetDrawColor(40,40,40); //---> Color de los Bordes
        $pdf->SetFillColor(40,40,40); //--> Color del Fondo
        $pdf->SetTextColor(255); //---> Color de la Letra
        $pdf->SetLineWidth(.5);//---> Ancho del borde (.5 mm)
        $pdf->Cell(0,9,utf8_decode($listaventas),1,1,'C',true);//---> Título
              
        //--------------- Segundo encabezado de la tabla ---------------//         
        $pdf->SetFillColor(91,148,207);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(40,40,40);
        $pdf->SetLineWidth(.5);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell(15,10, utf8_decode('Ene'), 1, 0, 'C',1);
        $pdf->Cell(15,10, utf8_decode('Fer'), 1, 0, 'C',1);
        $pdf->Cell(15,10, utf8_decode('Mar'), 1, 0, 'C',1);
        $pdf->Cell(15,10, utf8_decode('Abr'), 1, 0, 'C',1);
        $pdf->Cell(15,10, utf8_decode('May'), 1, 0, 'C',1);
        $pdf->Cell(15,10, utf8_decode('Jun'), 1, 0, 'C',1);
        $pdf->Cell(15,10, utf8_decode('Jul'), 1, 0, 'C',1);
        $pdf->Cell(15,10, utf8_decode('Ago'), 1, 0, 'C',1);
        $pdf->Cell(15,10, utf8_decode('Sep'), 1, 0, 'C',1);
        $pdf->Cell(15,10, utf8_decode('Oct'), 1, 0, 'C',1);
        $pdf->Cell(15,10, utf8_decode('Nov'), 1, 0, 'C',1);
        $pdf->Cell(15,10, utf8_decode('Dic'), 1, 0, 'C',1);
        $pdf->Cell(10,10, utf8_decode('T'), 1, 1, 'C',1);
     
        //---> Cuerpo de la Tabla 
        $pdf->SetFont('Arial', '', 12);
        //---> Restauración de colores y fuentes
        $pdf->SetTextColor(0);//---> LETRAS
    
        //--> Voy completando la tabla          
        $pdf->Cell(15,10, utf8_decode($get_listaventas['ene']), 1, 0, 'C');
        $pdf->Cell(15,10, utf8_decode($get_listaventas['fer']), 1, 0, 'C');
        $pdf->Cell(15,10, utf8_decode($get_listaventas['mar']), 1, 0, 'C');
        $pdf->Cell(15,10, utf8_decode($get_listaventas['abri']), 1, 0, 'C');
        $pdf->Cell(15,10, utf8_decode($get_listaventas['may']), 1, 0, 'C');
        $pdf->Cell(15,10, utf8_decode($get_listaventas['jun']), 1, 0, 'C');
        $pdf->Cell(15,10, utf8_decode($get_listaventas['jul']), 1, 0, 'C');
        $pdf->Cell(15,10, utf8_decode($get_listaventas['ago']), 1, 0, 'C');
        $pdf->Cell(15,10, utf8_decode($get_listaventas['sep']), 1, 0, 'C');
        $pdf->Cell(15,10, utf8_decode($get_listaventas['oct']), 1, 0, 'C');
        $pdf->Cell(15,10, utf8_decode($get_listaventas['nov']), 1, 0, 'C');
        $pdf->Cell(15,10, utf8_decode($get_listaventas['dic']), 1, 0, 'C');
        $pdf->Cell(10,10, utf8_decode($get_listaventas['total']), 1, 1, 'C');

        $pdf->Ln(9);
        
    }  

    //--------------- Ver el PDF ---------------//
    $pdf->Output();

    /*#####################################################################*/
        /*##################### INFO #########################*/
    /*#####################################################################*/
    //---> Link de la libreria y para saber mas detalle de su funcionamineto http://www.fpdf.org/?go=script&id=16
?>