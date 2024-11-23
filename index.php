<?PHP 
    include ('setting/database.php');
	require_once "admin/models/admin_model.php";
	include ('setting/st_gallery.php');

 	//--> Creo una Array para guardar el primer N° que esta en la Caja
	$Porduct = array();
	$Replenish = array();

 	/* ---> Recorro <--- */
	$run_Product = new Run_Model();
	$run_Replenish = new Run_Model();

	$data_Product = $run_Product->Run_Product();
	$data_Replenish = $run_Replenish->Run_replenish(); 

	while ($get_product = mysqli_fetch_assoc($data_Product)){
		//--> Guardo los codigo en el Array
		$Porduct[] = $get_product['code'];
	}

	while ($get_replenish = mysqli_fetch_assoc($data_Replenish)){
		if($get_replenish['add_date'] == '0000-00-00'){
			$Replenish[] = $get_replenish['code'];
		}
	}

 	//--> Cuento cuanto datos tengo en mi Array
	$ProductCant = count($Porduct);
	$ReplenishCant = count($Replenish);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<!--/ Para que funcione en los navegadores viejos /-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--/ Para los celulares, para que no hagan zoom /-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta athor="GattiDev : Ezequiel Gatti" date="20/11/2023">
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
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>styles.css" />

		<!--/ Font Awesome V6 /-->
		<script src="https://kit.fontawesome.com/e28972e8bb.js" crossorigin="anonymous"></script>
		
		<!--/ JS /-->
		<script src="<?php echo JS_URL; ?>welcome.js"></script>
		<script src="<?php echo INSERT_URL; ?>btn_ist.js"></script>
		<script src="<?php echo BOOKSTORES_URL; ?>jquery/jquery-3.7.0.min.js"></script>
				
		<!--/ ALERTIFY /-->	
		<link rel="stylesheet" type="text/css" href="<?php echo BOOKSTORES_URL;?>alertify/css/alertify.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BOOKSTORES_URL;?>alertify/css/themes/bootstrap.css">
		<script src="<?php echo BOOKSTORES_URL;?>alertify/alertify.js"></script>
			
	</head>
    <body>
        <div id="content">
			
			<!-- Head Content - Inicio -->
			<header id="head_content">
                <span id="logobox">
					<?php $dataBanner = $Image_Banner->Get_Image($Banner, $DestinyBanner);
						while($getBanner = mysqli_fetch_assoc($dataBanner)){ 
							//--> Construyo la imagen
							$Banner = "src='data:".$getBanner['type'].";base64,".base64_encode($getBanner['image'])."'"; ?>
							
							<a href="<?php echo ADMIN_URL?>login.php" target="_blank" title="Gatti Developer">
								<?php echo "<img ". $Banner ." alt='Banner GattiDev' class='img1' />"; ?>
							</a>
						<?php }
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
			<!-- Head Content - Fin -->
			
			<!-- Main Content - Inicio -->
			<main id="main_content">
				<nav id="section_button">	

					<a class="menu-btn" title="Productos" onclick="btn_productos()">
						<i class="icon fa-solid fa-gear fa-spin"></i>
						<span class="title"><?php echo $ProductCant; ?></span>                      	  
                    </a>

					<a class="menu-btn" title="Stock" onclick="btn_stock()">
						<i class="fa-solid fa-layer-group"></i>
	                </a> 

					<a class="menu-btn" onclick="btn_deposito()">
						<i class="fa-solid fa-cubes"></i>
						<span class="title">Depósito</span>
    				</a>
					
					<a class="menu-btn" style="text-decoration: none; color: black;" title="Pedidos ya realizados" onclick="btn_replenish()">  
						<i class="fa-solid fa-truck-arrow-right"></i>
						<span class="title"><?php echo $ReplenishCant; ?></span>
    				</a>

				</nav>

				<h2 id="titulo"></h2>
				
				<aside id="table">
					<section class="tb_products"></section>
					<section class="tb_stock"></section>
					<section class="tb_deposito"></section>
					<section class="tb_replenish"></section>
				</aside>		
			</main> 
            <!-- Footer - Inicio -->
            <footer id="footer_content">
			    <h6 class="copybox"> Jose Genna | 2023 - <?php echo date("Y");?> | Todos los derechos reservados | V 2.1.1</h6>
			    <p class="devbox">
					&copy; Developed and Designed by <a href="#" target="_blank" title="Gatti Developer">GattiDev</a>
				</p>
            </footer>
			<!-- Footer - Fin -->
			
		</div>

		<!-- OPCIONES PARA COMPLETAR -->	
		
        <script  src="<?php echo JS_URL; ?>time.js"></script>
		
	</body>
</html>	
<!--/ Metodos /-->

