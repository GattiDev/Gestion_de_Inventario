<?PHP 
    include ('../../setting/database.php');
	require_once "../models/admin_model.php";
	include ('../../setting/st_gallery.php');
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

                    <a class="menu-btn" href="../adm.php">                     
                        <i class="icon fa-solid fa-reply-all"></i>  
                        <span class="title">Volver</span>           	  
                    </a>

                    <a class="menu-btn" href="selectProduct.php">
                        <span class="title">Gráfico Línea</span>
                            <i class="icon fa-solid fa-chart-line"></i>             	  
                        </span>
                    </a>
                                        
                    <a class="menu-btn" style='text-decoration: none; color: black;' href="<?php echo AD_VIEWS; ?>listado_venta.php" target='_blank'>
                        <span class="title">Archivos</span>
                            <i class="icon fa-solid fa-file-pdf"></i>                  	  
                        </span>
                    </a>
				</nav>

                <section class="graph_areaPolar">
                    <h2 id="titulo">Productos más vendido</h2>
                
                    <div id="boxGraph">
                        <!--Gráfico de barras-->
                        <canvas id="myChart" style="position: relative; height: 40vh; width: 80vw;"></canvas>
                    </div>
    
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <script>
                        // Gráficos de área polar
                        var ctx = document.getElementById('myChart')
                        var myChart = new Chart(ctx, {
                            type:'polarArea',
                            data:{
                                datasets: [{
                                    label: 'Cant.',
                                    backgroundColor: [
                                        'rgba(39, 170, 245, 0.8)',
                                        'rgba(39, 245, 230, 0.8)',
                                        'rgba(39, 245, 178, 0.8)',
                                        'rgba(39, 245, 106, 0.8)',
                                        'rgba(140, 245, 39, 0.8)',
                                        'rgba(226, 245, 39, 0.8)',
                                        'rgba(245, 178, 39, 0.8)',
                                        'rgba(245, 106, 39, 0.8)',
                                        'rgba(63, 39, 245, 0.8)',
                                        'rgba(174, 39, 245, 0.8)'
                                    ],
                                    borderColor: [
                                        'rgba(39, 170, 245)',
                                        'rgba(39, 245, 230)',
                                        'rgba(39, 245, 178)',
                                        'rgba(39, 245, 106)',
                                        'rgba(140, 245, 39)',
                                        'rgba(226, 245, 39)',
                                        'rgba(245, 178, 39)',
                                        'rgba(245, 106, 39)',
                                        'rgba(63, 39, 245)',
                                        'rgba(174, 39, 245)'
								    ],
								    borderWidth: 1              
                                }]
                            },
                            options:{
                                plugins: {
                                    legend: {
                                        position: 'bottom',
  
                                        labels: {
                                            // This more specific font property overrides the global property
                                            font: {
                                                size: 15
                                            }
                                        }
                                    }
                                    
                                  
            
                                }
                            }
                        })
                        //SERVER
                        let url = 'https://jginventory.josegennarepuestos.com.ar/admin/chart_apirest/graph_apirest.php'
                        // LOCAL
                        //let url = 'http://localhost/Gestión-de-Inventarios-actual/admin/chart_apirest/graph_apirest.php'
                        fetch(url)
                        .then( response => response.json() )
                        .then( datos => mostrar(datos) )
                    
                        const mostrar = (articulos) =>{
                            articulos.forEach(element => {
                                if(element.total != 0){
                                    myChart.data['labels'].push(element.code + ' ~ ' + element.description)
                                    myChart.data['datasets'][0].data.push(element.total)
                                    myChart.update()
                                } 
                            });
                            console.log(myChart.data)
                        }    
                    </script>
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