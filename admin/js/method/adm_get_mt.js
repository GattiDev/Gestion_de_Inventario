'use strict'

//-----> Supplier <--------//
function get_supplier(Data){
    if(Data){
        mostrar('#modal_GetSupplier');
    }
    $('#edit_codeD').val(Data[0]);
    $('#edit_codeH').val(Data[0]);
    $('#edit_supplier').val(Data[1]);
    $('#edit_phone').val(Data[2]);
    $('#edit_mail').val(Data[3]);
}

//-----> Dar de Alta <---------//
function get_product(Data){
    if(Data){
        mostrar('#modal_GetProductStock');
    }
    $('#edit_codeDaH').val(Data[0]);
    $('#edit_codeDaD').val(Data[0]);
    $('#edit_codealt').val(Data[1]);
    $('#edit_productdescrip').val(Data[2]);
    $('#edit_stock').val(Data[3]);
    $('#edit_caja').val(Data[4]); 
    if(Data[5] == "<span class='fa-solid fa-star'></span>"){
        $('#edit_priority').val('yes');
    }
    if(Data[5] == "<span class='fa-solid fa-trash'></span>"){
        $('#edit_priority').val('x');       
    }
    if(Data[5] == "<span class='fa-solid fa-star-half'></span>"){
        $('#edit_priority').val('not');
    }
}

//-----> Deposito <---------//
function get_deposito(Data){
    if(Data){
        mostrar('#modal_GetDeposito');
    }

    $('#edit_codeDaHD').val(Data[0]);
    $('#edit_codeDaDD').val(Data[0]);
    $('#edit_codealtD').val(Data[1]);
    $('#edit_productdescripD').val(Data[2]);
    $('#edit_amount').val(Data[3]);
    $('#edit_place').val(Data[4]); 
}

//-----> CajaStock <---------//
function get_cajaStock(Data){
    if(Data){
        mostrar('#modal_GetCajaStock');
    }
    $('#boxCsH').val(Data[0]);
    $('#boxCsD').val(Data[0]);
    $('#Cstock_min').val(Data[2]);
    $('#Cstock_cri').val(Data[3]);
}

//-----> Dar de Baja <--------//
function get_productB(Data){
    if(Data){
        mostrar('#modal_GetProductDB');
    }
    $('#codeFp').val(Data[0]);
    $('#codeHFp').val(Data[0]);
    $('#productFp').val(Data[2]);
    $('#StockH').val(Data[3]);
     
    var stock = document.querySelector("#Stock");
    stock.innerHTML = Data[3];
}

//-----> Sold Detail <--------//
function get_soldDetail(Data){
    if(Data){
        mostrar('#modal_GetSoldDetail');
    }
    $('#edit_idSD').val(Data[0]);
    $('#edit_codeSD').val(Data[1]);
    $('#edit_HcodeSD').val(Data[1]);
    $('#edit_descriSD').val(Data[2]);
    $('#edit_HamountSD').val(Data[3]);
    var act = document.querySelector("#Act");
    act.innerHTML = Data[3];
    $('#edit_dataSD').val(Data[4]);
}

//-----> Replenish <--------//
function get_replenish(Data){
    if(Data){
        mostrar('#modal_GetPedido');
    }
    $('#codeMR').val(Data[0]);
    $('#codeHMR').val(Data[0]);
    $('#edit_descriMR').val(Data[2]);
}

//-----> Replenish Product <--------//
function get_replenishProduct(Data){
    if(Data){
        mostrar('#modal_GetDardealta');
    }	
    $('#codeDA').val(Data[0]);
    $('#codeHDA').val(Data[0]);
    $('#edit_descriDA').val(Data[2]);
}