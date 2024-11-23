function key_generator(base, length){
    let password = "";
    for (let x = 0; x < length; x++) {
        let random = Math.floor(Math.random() * base.length);
        password += base.charAt(random);
    }
    return password;
};

function generator_key(){
    let length = 3;

    let base = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const numbers = "0123456789";
    const symbols = ".?,;-_¡!¿*%&$/()[]{}|@><";

    base += numbers;

    var key_one = key_generator(base, length);
    var key_two = key_generator(base, length);
    var key_three = key_generator(base, length);

    var lincense = key_one + '-' + key_two + '-' + key_three;
    
    $('#up_licencia').val(lincense);
    $('#upM_licencia').val(lincense);

};

window.addEventListener("DOMContentLoaded", () => {
    btnGenerate.addEventListener("click", () => {
        generator_key();
    });
});
