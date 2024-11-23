<?php 
    $obj_SeeRun = new Run_Model();
    $Get_SeeImage = $obj_SeeRun->Run_image();
?>
<h2>Ver Imágenes</h2>
<?php 
    echo "<div id='See'>";
        while ($SeeImage = mysqli_fetch_assoc($Get_SeeImage)) { 
   
            echo "<div class='SeeImage'>";
                echo "<img class='img' src='data:".$SeeImage['type'].";base64,".base64_encode($SeeImage['image'])."'>";
                echo "<p>".$SeeImage['archive']."</p>";
            echo "</div>";
  
        }
    echo "</div>";
?>