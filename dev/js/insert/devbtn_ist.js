'use strict';
//------------------------->  Funcion de los Botones 

//----> Variales
var state_user = '';
var state_lincense = '';
var state_updateImage = '';
var state_image = '';

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

function btn_admin(){
    /*---> Deshabilito <---*/
    ocultar('.tb_lincense');
    ocultar('.up_image');
    ocultar('.image');

    /*---> Habilitado <---*/
    enable('Listado de Administradores');
    mostrar('#modal_administrator');
    /*---/ Condición/---*/
	if(state_user == ''){
        $(".tb_admin").show(); //---> Visible
        $('.tb_admin').load('views/table/tb_admin.php'); //--->  Cargo la tabla
		state_user = 'La tabla ya esta cargada';
	}else{
		var tb_user = document.querySelector(".tb_admin");
		tb_user.style.display = "block";
	}
};

function btn_lincense(){
   /*---> Deshabilito <---*/
    ocultar('.tb_admin');
    ocultar('.up_image');
    ocultar('.image');

    /*---> Habilitado <---*/
    enable('Listado de Licencias');

    //---> Habilitado <---//
    if(state_lincense == ''){
        $('.tb_lincense').show();
        $('.tb_lincense').load('views/table/tb_lincense.php');
        state_lincense = 'La tabla ya esta cargada';
    }else{
        var tb_lincense = document.querySelector(".tb_lincense");
        tb_lincense.style.display = "block";
    }
}

function btn_updateImage(){
    /*---> Deshabilito <---*/
    ocultar('.tb_admin');
    ocultar('.tb_lincense');
    ocultar('.image');

    /*---> Habilitado <---*/
    enable('Subir Imágenes');

    /*---/ Condición/---*/
	if(state_updateImage == ''){
        $(".up_image").show(); //---> Visible
        $('.up_image').load('views/updateImage.php'); //--->  Cargo la tabla
		state_updateImage = 'Ya esta cargada';
	}else{
		var up_image = document.querySelector(".up_image");
		up_image.style.display = "block";
	}
}

function btn_image(){
    /*---> Deshabilito <---*/
    ocultar('.tb_admin');
    ocultar('.tb_lincense');
    ocultar('.up_image');

    /*---> Habilitado <---*/
    enable('Imágenes');

    /*---/ Condición/---*/
	if(state_image == ''){
        $(".image").show(); //---> Visible
        $('.image').load('views/table/tb_image.php'); //--->  Cargo la tabla
		state_image = 'La tabla ya esta cargada';
	}else{
		var tb_image = document.querySelector(".image");
		tb_image.style.display = "block";
	}
}