<?PHP 

    include ('../../setting/database.php');
	require_once "../models/admin_model.php";
	include ('../../setting/st_gallery.php');
	

	$Run_Model = new Run_Model();
    $Run_product = $Run_Model->Run_Product();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<!--/ Para que funcione en los navegadores viejos /-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--/ Para los celulares, para que no hagan zoom /-->
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>GattiDev : : Gestión de Inventarios</title>
		<!--/ Icon /-->
		<?php $dataIcon = $Image_Icon->Get_Image($titleIcon, $DestinyIcon);
    		while($getIcon = mysqli_fetch_assoc($dataIcon)){ 
				//--> Construyo la imagen
				$Icon = "href='data:".$getIcon['type'].";base64,".base64_encode($getIcon['image'])."'";
				echo "<link rel='shortcut icon'". $Icon .">";
			}
		?> 
		<!--/ Styles /-->
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL;?>styles.css" />

		<!--/ Font Awesome V6 /-->
		<script src="https://kit.fontawesome.com/e28972e8bb.js" crossorigin="anonymous"></script>
		
		<!--/ JS /-->
		<script src="<?php echo BOOKSTORES_URL; ?>jquery/jquery-3.7.0.min.js"></script>
		
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
	</head>
    <body>
        <div id="content">
			
			<!-- Head Content - Inicio -->
			<header id="head_content">
                <span id="logobox">
					<?php $dataBanner = $Image_Banner->Get_Image($Banner, $DestinyBanner);
						while($getBanner = mysqli_fetch_assoc($dataBanner)){ 
							$Banner = "src='data:".$getBanner['type'].";base64,".base64_encode($getBanner['image'])."'";
							echo "<img ". $Banner ." alt='Banner GattiDev' class='img1' />";
						}
					?>
				</span>
				
				<address class="datebox">
				    <div class="fecha">
						<p id="date" class="date"></p>
					</div>
	
					<div class="reloj">
						<p id="time" class="time"></p>
					</div>
				</address>				
			</header> 
			
			<!-- Main Content - Inicio -->
			<main id="main_content">
				<nav id="section_button">	
                        
                    <a class="menu-btn" href="selectProduct.php">                     
                        <i class="icon fa-solid fa-reply-all"></i> 
                        <span class="title">Volver</span>           	  
                    </a>

            		<a class="menu-btn" href="graph.php">
                        <span class="title">Gráfico Área Polar</span>
                            <i class="icon fa-solid fa-chart-pie"></i>              	  
                        </span>
                    </a>
					
				</nav>

				<section class="graph_line">
				
					<h2 id="titulo">Detalle de la Venta</h2>
				
					<?php 
						$id_code = $_POST['id_code'];
				
						//--> SERVIDOR
						$con = new mysqli('localhost','u183373037_josegenna','Jose.G-Inventario23','u183373037_jginventory');

						//-->LOCAL
						//$con = new mysqli('localhost','root','','inventory_management');

						//--> YEAR
						require_once('graph_year.php');

					?>
				      
				</section> 

                <!-- Footer - Inicio -->
                <footer id="footer_content">
			        <h6 class="copybox"> GD | 2023 - <?php echo date("Y");?> | Todos los derechos reservados | V 2.1.1</h6>
			        <p class="devbox">
		                &copy; Developed and Designed by GattiDev
				    </p>
                </footer>			
            </man>

        </div>
		
        <script type="text/javascript" src="<?php echo JS_URL;?>time.js"></script>
	</body>
</html>	