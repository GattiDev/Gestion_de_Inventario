<?PHP 
  include ('../setting/database.php');
  require_once "../models/main_model.php";
  include ('../setting/st_gallery.php');  
?>
<!DOCTYPE html>
  <html lang="en" >
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>GattiDev : : Login</title>    
	<!--/ Icon /-->
  <?php $dataIcon = $Image_Icon->Get_Image($titleIcon, $DestinyIcon);
    		while($getIcon = mysqli_fetch_assoc($dataIcon)){ 
				//--> Construyo la imagen
				$Icon = "href='data:".$getIcon['type'].";base64,".base64_encode($getIcon['image'])."'";
				echo "<link rel='shortcut icon'". $Icon .">";
			}
		?>
    <link rel="stylesheet" href="<?php echo INCLUDES_URL; ?>login_style.css" />
  </head>
  <body>
    
    <div id="box_body">
      
      <div class="avatar" onclick="login()">
        <div class="avatar_box">
          <div id="avatar_img">
            <?php $dataLogo = $Image_Logo->Get_Image($Profile, $DestinyLogo);
						  while($getLogo = mysqli_fetch_assoc($dataLogo)){ 
							  //--> Construyo la imagen
							  $Logo = "src='data:".$getLogo['type'].";base64,".base64_encode($getLogo['image'])."'"; 
								echo "<img ". $Logo ." alt='Banner GattiDev' class='img1' />"; 
						 }
					?>
           
          </div>
        </div>
      </div>

      <div id="Formbox">
        <form action="<?php echo CONTROLLERS_URL?>main_login.php" method="POST">
          <div id="boxInputName">
            <div class="InputName">
              <input type="text" class="name" name="user" required pattern='[A-Za-z Á-É-Í-Ó-Úá-é-í-ó-ú]+' maxlength="10"/>
              <label class="name-label">User</label>
            </div>
          </div>
        
          <div id="boxInputPass"> 
            <div class="InputPass">
              <input type="password" class="pass" name="password" required maxlength="10" />
              <label class="pass-label">Password</label>       
           </div>
          </div>
          <button type="submit" style="opacity: 0;"></button>
        </form>
      </div>
    <script src="<?php echo JS_URL ?>login_main.js"></script>
  </body>
</html>