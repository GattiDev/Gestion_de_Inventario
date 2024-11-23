'use strict'
function get_datatb_administrator(Data){
    if(Data){
        mostrar('#modal_administratorUP');
    }
    $('#up_id').val(Data[0]);
    $('#up_admD').val(Data[1]);
    $('#up_admH').val(Data[1]);
    $('#up_passD').val(Data[2]);
}