<?php 

	$date_actual = date("Y");
	$query_24 = $con->query("SELECT * FROM `datagraph` WHERE `code` = '$id_code' AND `year` = $date_actual");

	//Compruebo si trae valor 
    if($query_24->num_rows > 0){
		echo "<h3 id='year'>2024</h3>";
		foreach($query_24 as $data){
			$month_24 = ['Enero','Febrero','Marzo','Abril','	Mayo','	Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
			$amount_24 = [$data['ene'], $data['fer'],$data['mar'], $data['abri'],$data['may'], $data['jun'],$data['jul'], $data['ago'], $data['sep'], $data['oct'], $data['nov'], $data['dic']];
		}
	}
									
    $obj_Get_24 = new Get_Model();
	$data_product_24 = $obj_Get_24->Get_productCode($id_code);
					
	$title = "";

    while ($get_product_24 = mysqli_fetch_assoc($data_product_24)) { 
		$description = $get_product_24['product_description'];
		$title = $id_code . ' ~ ' . $description;
	}
	
	if($query_24->num_rows > 0){
?>
   
<div id="boxGraph">
	<!--Gráfico de barras-->						
	<canvas id="myChart_24"></canvas>
</div>
                	
<br>
	
<?php } ?>

<script>
	const labels_24 = <?php echo json_encode($month_24) ?>;
	const data_24 = {
    	labels: labels_24,
		datasets: [{
							
			label: <?php echo json_encode($title); ?>,
			data: <?php echo json_encode($amount_24) ?>,
			backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
	    		'rgba(255, 159, 64, 0.2)',
		    	'rgba(255, 205, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(153, 102, 255, 0.2)',
				'rgba(39, 170, 245, 0.2)',
                'rgba(39, 245, 230, 0.2)',
                'rgba(39, 245, 178, 0.2)',
                'rgba(39, 245, 106, 0.2)',
                'rgba(140, 245, 39, 0.2)',
                'rgba(226, 245, 39, 0.2)'
                                        
			],
			
            borderColor: [
				'rgba(255, 99, 132)',
				'rgba(255, 159, 64)',
				'rgba(255, 205, 86)',
				'rgba(75, 192, 192)',
				'rgba(54, 162, 235)',
				'rgba(153, 102, 255)',
				'rgba(39, 170, 245)',
                'rgba(39, 245, 230)',
                'rgba(39, 245, 178)',
                'rgba(39, 245, 106)',
                'rgba(140, 245, 39)',
                'rgba(226, 245, 39)'
			],
			
            borderWidth: 1
		}]
	};

  	const config_24 = {
    	type: 'bar',
    	data: data_24,
    	options: {
    		legend: {
                labels: {
                    fontColor: "#ffffff",
                    fontSize: 18
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "#ffffff",
                        fontSize: 18,
                        stepSize: 1,
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: "#ffffff",
                        fontSize: 16,
                        stepSize: 1,
                        beginAtZero: true
                    }
                }]
            }
    	},
  	};

    var myChart_24 = new Chart(
		document.getElementById('myChart_24'),
		config_24
	);

</script>