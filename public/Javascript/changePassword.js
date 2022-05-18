const newPass = document.querySelector("#newPass");
const confirmNewPass = document.querySelector("#confirmNewPass");

nouveauPassword.addEventListener("keyup",function(){
    checkPassword();
})

confirmNewPass.addEventListener("keyup",function(){
    checkPassword();
})

function checkPassword(){
    if(nouveauPassword.value === confirmNewPass.value){
        document.querySelector("#btnValidation").disabled = false;
        document.querySelector("#erreur").classList.add("d-none");   
    } else {
        document.querySelector("#btnValidation").disabled = true;
        document.querySelector("#erreur").classList.remove("d-none");   
    }
}