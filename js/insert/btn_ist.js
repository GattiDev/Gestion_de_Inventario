'use strict';
//------------------------->  Funcion de los Botones 

//----> Variales
var state_product = '';
var state_stock = '';
var state_deposito = ''; //
var state_replenish = '';


//------------------------->  Funcion de las Opciones 
function timer(){
    setTimeout(function(){
        location.reload();
    }, 2000);
}

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

function btn_productos(){
    /*---> Deshabilito <---*/
	ocultar('.tb_stock');
	ocultar('.tb_replenish');    
    ocultar('.tb_deposito');

    /*---> Titulo <---*/
    enable('Productos');
    
    /*---/ Condición/---*/
	if(state_product == ''){
        $(".tb_products").show(); //---> Visible
        $('.tb_products').load('views/table/tb_products.php'); //--->  Cargo la tabla
		state_product = 'La tabla ya esta cargada';
	}else{
		var views_products = document.querySelector(".tb_products");
		views_products.style.display = "block";
	}
    
};

function btn_stock(){
    /*---> Deshabilito <---*/
    ocultar('.tb_products');
	ocultar('.tb_replenish');    
    ocultar('.tb_deposito');

    enable('Stock Crítico');

    /*---> Habilitado <---*/
    if(state_stock == ''){
        $(".tb_stock").show();
        $(".tb_stock").load('views/table/tb_stock.php');
        state_stock = 'La tabla ya esta cargada';
    }else{
        var tb_stock = document.querySelector(".tb_stock");
        tb_stock.style.display = "block";
    }
};

function btn_deposito(){
    /*---> Deshabilito <---*/
    ocultar('.tb_products');
	ocultar('.tb_replenish');    
    ocultar('.tb_stock');

    enable('Depósito');

    /*---> Habilitado <---*/
    if(state_deposito == ''){
        $(".tb_deposito").show();
        $(".tb_deposito").load('views/table/tb_deposito.php');
        state_deposito = 'La tabla ya esta cargada';
    }else{
        var tb_deposito = document.querySelector(".tb_deposito");
        tb_deposito.style.display = "block";
    }
}


function btn_replenish(){
    /*---> Deshabilito <---*/
    ocultar('.tb_products');
	ocultar('.tb_stock');
    ocultar('.tb_deposito');    

    /*---> Titulo <---*/
    enable('Pedidos ya Realizados');

    /*---> Habilitado <---*/
    if(state_replenish == ''){
        $(".tb_replenish").show();
        $(".tb_replenish").load('views/table/tb_replenish.php');
        state_replenish = 'La tabla ya esta cargada';
    }else{
        var tb_replenish = document.querySelector(".tb_replenish");
        tb_replenish.style.display = "block";
    }
}

