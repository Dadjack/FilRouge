
//--<> BUTTON MODIFICATION MAIL <>--//
let btnChangeMail = document.querySelector("#btnChangeMail");
let btnValidChangeMail = document.querySelector("#btnValidChangeMail");
let divMail = document.querySelector("#mail");
let divChangeMail = document.querySelector("#changeMail");

btnChangeMail.addEventListener("click", function(){
    divMail.classList.add("d-none"); //---<> ClassList permet d'ajouter et modifier une classe <>---//
    divChangeMail.classList.remove("d-none");
})

//--<> BUTTON MODIFICATION NAME <>--//
let btnChangeName = document.querySelector("#btnChangeName");
let btnValidChangeName = document.querySelector("#btnValidChangeName");
let divName = document.querySelector("#name");
let divChangeName = document.querySelector("#changeName");

btnChangeName.addEventListener("click", function(){
    divName.classList.add("d-none");
    divChangeName.classList.remove("d-none");
})

//--<> BUTTON MODIFICATION FIRSTNAME <>--//
let btnChangeFirstName = document.querySelector("#btnChangeFirstName");
let btnValidChangeFirstName = document.querySelector("#btnValidChangeFirstName");
let divFirstName = document.querySelector("#firstName");
let divchangeFirstName = document.querySelector("#changeFirstName");

btnChangeFirstName.addEventListener("click", function(){
    divFirstName.classList.add("d-none");
    divchangeFirstName.classList.remove("d-none");
})

//--<> BUTTON MODIFICATION PHONE <>--//
let btnChangePhone = document.querySelector("#btnChangePhone");
let btnValidChangePhone = document.querySelector("#btnValidChangePhone");
let divPhone = document.querySelector("#phone");
let divChangePhone = document.querySelector("#changePhone");

btnChangePhone.addEventListener("click", function(){
    divPhone.classList.add("d-none");
    divChangePhone.classList.remove("d-none");
})

document.querySelector("#btnDelAccount").addEventListener("click",function(){
    document.querySelector("#deleteAccount").classList.remove("d-none");
});

