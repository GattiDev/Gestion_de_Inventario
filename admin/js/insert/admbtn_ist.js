'use strict';
//------------------------->  Funcion de los Botones 

//----> Variales
var state_proveedor = '';
var state_dardeAlta = '';
var state_cajaStock = '';
var state_dardeBaja = '';
var state_inventario = '';
var state_reponer = '';
var state_perdir = '';
var state_detalle = ''; 
var state_deposito = '';//
var state_archivo = '';
var state_actualizar = '';
var state_graph_areaPolar = '';
var state_graph_line = '';

//------------------------->  Funcion de las Opciones 
function timer(){
    setTimeout(function(){
        location.reload();
    }, 2000);
}

function btn_exit(name_id){
    var exit_modal = document.querySelector(name_id);
    exit_modal.style.display = "none";
};

function mostrar(modal){
    var views = document.querySelector(modal);
    views.style.display = "block";
}

function ocultar(tb){
    var disgise_tb = document.querySelector(tb); //-> Tb User
    disgise_tb.style.display = "none";
}

function enable(Descrip){
    var titulo = document.querySelector("#titulo"); //---> Obtengo el Div del titulo
    titulo.innerHTML = Descrip; //---> Modifico el Titulo
    
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////// HOME ///////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function btn_proveedor(){
    /*---> Deshabilito <---*/
	ocultar('.tb_dardeAlta');
	ocultar('.tb_cajaStock');    
    ocultar('.tb_dardeBaja');
	ocultar('.tb_inventario');
	ocultar('.tb_reponer');
    ocultar('.perdir');
	ocultar('.tb_detalle');
	ocultar('.tb_deposito');
	ocultar('.archivosPDF'); 
    
    /*---> Titulo <---*/
    enable('Listado de Proveedores');
    /*---> Habilitado <---*/
    mostrar('#modal_PutSupplier');
    
    /*---/ Condición/---*/
	if(state_proveedor == ''){
        $(".tb_proveedor").show(); //---> Visible
        $('.tb_proveedor').load('views/table/tb_proveedor.php'); //--->  Cargo la tabla
		state_proveedor = 'La tabla ya esta cargada';
	}else{
		var views_proveedor = document.querySelector(".tb_proveedor");
		views_proveedor.style.display = "block";
	}
    
};

function btn_dardeAlta(){
    /*---> Deshabilito <---*/
    ocultar('.tb_proveedor');
	ocultar('.tb_cajaStock');    
    ocultar('.tb_dardeBaja');
	ocultar('.tb_inventario');
	ocultar('.tb_reponer');
    ocultar('.perdir');
	ocultar('.tb_detalle');
	ocultar('.tb_deposito');
	ocultar('.archivosPDF'); 
    
    enable('Dar de Alta los Productos');

    mostrar('#modal_PutProduct');    

    /*---> Habilitado <---*/
    if(state_dardeAlta == ''){
        $(".tb_dardeAlta").show();
        $(".tb_dardeAlta").load('views/table/tb_dardeAlta.php');
        state_dardeAlta = 'La tabla ya esta cargada';
    }else{
        var tb_dardeAlta = document.querySelector(".tb_dardeAlta");
        tb_dardeAlta.style.display = "block";
    }
    
};

function btn_cajaStock(){
    /*---> Deshabilito <---*/
    ocultar('.tb_proveedor');
	ocultar('.tb_dardeAlta');
    ocultar('.tb_dardeBaja');
	ocultar('.tb_inventario');
	ocultar('.tb_reponer');
    ocultar('.perdir');
	ocultar('.tb_detalle');
	ocultar('.tb_deposito');
	ocultar('.archivosPDF');
    
    /*---> Titulo <---*/
    enable('Caja con su Stock');
    
    mostrar('#modal_PutStock');  

    /*---> Habilitado <---*/
    if(state_cajaStock == ''){
        $(".tb_cajaStock").show();
        $(".tb_cajaStock").load('views/table/tb_cajaStock.php');
        state_cajaStock = 'La tabla ya esta cargada';
    }else{
        var tb_cajaStock = document.querySelector(".tb_cajaStock");
        tb_cajaStock.style.display = "block";
    }
}

function btn_dardeBaja(){
    /*---> Deshabilito <---*/
    ocultar('.tb_proveedor');
	ocultar('.tb_dardeAlta');
	ocultar('.tb_cajaStock');    
	ocultar('.tb_inventario');
	ocultar('.tb_reponer');
    ocultar('.perdir');
	ocultar('.tb_detalle');
	ocultar('.tb_deposito');
	ocultar('.archivosPDF');
    
    /*---> Titulo <---*/
    enable('Dar de Baja los Productos');

    /*---> Habilitado <---*/
    if(state_dardeBaja == ''){
        $(".tb_dardeBaja").show();
        $(".tb_dardeBaja").load('views/table/tb_dardeBaja.php');
        state_dardeBaja = 'La tabla ya esta cargada';
    }else{
        var tb_dardeBaja = document.querySelector(".tb_dardeBaja");
        tb_dardeBaja.style.display = "block";
    }
    
}

function btn_inventario(){
    /*---> Deshabilito <---*/
    ocultar('.tb_proveedor');
	ocultar('.tb_dardeAlta');
	ocultar('.tb_cajaStock');    
    ocultar('.tb_dardeBaja');
	ocultar('.tb_reponer');
    ocultar('.perdir');
	ocultar('.tb_detalle');
	ocultar('.tb_deposito');
	ocultar('.archivosPDF'); 
    
    /*---> Titulo <---*/
    enable('Inventario de la Venta');
    
    /*---> Habilitado <---*/
    if(state_inventario == ''){
        $(".tb_inventario").show();
        $(".tb_inventario").load('views/table/tb_inventario.php');
        state_inventario = 'La tabla ya esta cargada';
    }else{
        var tb_inventario = document.querySelector(".tb_inventario");
        tb_inventario.style.display = "block";
    }
}

function btn_reponer(){
    /*---> Deshabilito <---*/
    ocultar('.tb_proveedor');
	ocultar('.tb_dardeAlta');
	ocultar('.tb_cajaStock');    
    ocultar('.tb_dardeBaja');
	ocultar('.tb_inventario');
    ocultar('.perdir');
	ocultar('.tb_detalle');
	ocultar('.tb_deposito');
	ocultar('.archivosPDF'); 
    
    /*---> Titulo <---*/
    enable('Reponer Productos');

    /*---> Habilitado <---*/
    if(state_reponer == ''){
        $(".tb_reponer").show();
        $(".tb_reponer").load('views/table/tb_reponer.php');
        state_reponer = 'La tabla ya esta cargada';
    }else{
        var tb_reponer = document.querySelector(".tb_reponer");
        tb_reponer.style.display = "block";
    }
    
}

function btn_perdir(){
    /*---> Deshabilito <---*/
    ocultar('.tb_reponer');
    
    /*---> Titulo <---*/
    enable('Hacer Pedido');

    /*---> Habilitado <---*/
    if(state_perdir == ''){
        $(".perdir").show();
        $(".perdir").load('views/perdirProduct.php');
        state_perdir = 'Los datos se cargaron';
    }else{
        var perdir = document.querySelector(".perdir");
        perdir.style.display = "block";
    }
    
}

function btn_detalle(){
    /*---> Deshabilito <---*/
    ocultar('.tb_proveedor');
	ocultar('.tb_dardeAlta');
	ocultar('.tb_cajaStock');    
    ocultar('.tb_dardeBaja');
	ocultar('.tb_inventario');
	ocultar('.tb_reponer');
    ocultar('.perdir');
	ocultar('.tb_deposito');
	ocultar('.archivosPDF');
    
    /*---> Titulo <---*/
    enable('Detalle del Pedido');

    /*---> Habilitado <---*/
    if(state_detalle == ''){
        $(".tb_detalle").show();
        $(".tb_detalle").load('views/table/tb_detalle.php');
        state_detalle = 'La tabla ya esta cargada';
    }else{
        var tb_detalle = document.querySelector(".tb_detalle");
        tb_detalle.style.display = "block";
    }
    
}

function btn_deposito(){
    //---> Deshabilito <---
    ocultar('.tb_proveedor');
	ocultar('.tb_dardeAlta');
	ocultar('.tb_cajaStock');    
    ocultar('.tb_dardeBaja');
	ocultar('.tb_inventario');
	ocultar('.tb_reponer');
    ocultar('.perdir');
	ocultar('.tb_detalle');
	ocultar('.archivosPDF'); 
    
    //---> Titulo <---
    enable('Depósito');

    mostrar('#modal_PutDeposito'); 

    //--> Habilitado <---
    if(state_deposito == ''){
        $(".tb_deposito").show();
        $(".tb_deposito").load('views/table/tb_deposito.php');
        state_deposito = 'El Archivo ya esta cargado';
    }else{
        var deposito = document.querySelector(".tb_deposito");
        deposito.style.display = "block";
    }
    
}

function btn_archivo(){
    /*---> Deshabilito <---*/
    ocultar('.tb_proveedor');
	ocultar('.tb_dardeAlta');
	ocultar('.tb_cajaStock');    
    ocultar('.tb_dardeBaja');
	ocultar('.tb_inventario');
	ocultar('.tb_reponer');
    ocultar('.perdir');
	ocultar('.tb_detalle');
	ocultar('.tb_deposito'); 
    
    /*---> Titulo <---*/
    enable('Archivos .PDF');
    
    /*--> Habilitado <---*/
    if(state_archivo == ''){
        $(".archivosPDF").show();
        $(".archivosPDF").load('views/pdf/filePDF.php');
        state_archivo = 'El Archivo ya esta cargado';
    }else{
        var file_pdf = document.querySelector(".archivosPDF");
        file_pdf.style.display = "block";
    }
}


//--->
function btn_graphPolarArea(){
    /*---> Deshabilito <---*/
    ocultar('.graph_line');

    /*---> Titulo <---*/
    enable('Productos más vendido');

    /*--> Habilitado <---*/
    if(state_graph_areaPolar == ''){
        $(".graph_areaPolar").show();
        $(".graph_areaPolar").load('graph_polarArea.php');
        state_graph_areaPolar = 'El Archivo ya esta cargado';
    }else{
        var graph_areaPolar = document.querySelector(".graph_areaPolar");
        graph_areaPolar.style.display = "block";
    }
}

function btn_graphLine(){
    /*---> Deshabilito <---*/
    ocultar('.graph_areaPolar');
	

    /*---> Titulo <---*/
    enable('Detalle de la Venta');

    /*--> Habilitado <---*/
    if(state_graph_line == ''){
        $(".graph_line").show();
        $(".graph_line").load('graph_line.php');
        state_graph_line = 'El Archivo ya esta cargado';
    }else{
        var graph_line = document.querySelector(".graph_line");
        graph_line.style.display = "block";
    }
}



//<---