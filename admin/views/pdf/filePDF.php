<?php
    include ('../../../setting/database.php');
?>
<nav id="section_button">	
    
    <div class="btn_pdf" style='display: inline-block !important; width: 250px !important;'>
        <a class='menu-btn' style='text-decoration: none; color: black;' href='<?php echo AD_VIEWS;?>pdf_caja.php' target="_blank">
            <i class="fa-solid fa-box"></i>    
            <span class="title">Las cajas</span>    
        </a>
    </div>

    <div class="btn_pdf" style='display: inline-block !important; width: 250px !important;'>
        <a class='menu-btn' style='text-decoration: none; color: black;' href='<?php echo AD_VIEWS;?>pdf_productosPendientes.php' target="_blank">
            <i class="fa-solid fa-truck-arrow-right"></i> 
            <span class="title">Pendientes</span>    
        </a>
    </div>

    <div class="btn_pdf" style='display: inline-block !important; width: 250px !important;'>
        <a class='menu-btn' style='text-decoration: none; color: black;' href='<?php echo AD_VIEWS;?>pdf_comprobarStock.php' target="_blank">
            <span class="title">Comprobar Stock</span>    
            <i class="fa-solid fa-clipboard"></i>
        </a>
    </div>
</nav>