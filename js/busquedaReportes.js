const btn = document.querySelector(".btn-act");
const cont = document.querySelector(".form-act");
const cont2 = document.querySelector(".form-desac");
const control = document.querySelectorAll(".control");
if(control[0].value == '1' && control[1].value == '1'){
        btn.innerHTML = "Cambiar a busqueda normal";
        cont.classList.replace("form-act","form-desac")
        cont2.classList.replace("form-desac","form-act");
    }
    else if(control[0].value == '0' && control[1].value == '0'){
        btn.innerHTML = "Cambiar modo de búsqueda";
        cont.classList.replace("form-desac","form-act")
        cont2.classList.replace("form-act","form-desac");
    }

btn.addEventListener("click",()=>{
    if(control[0].value == '0'  && control[1].value == '0'){
        btn.innerHTML = "Cambiar a busqueda normal";
        cont.classList.replace("form-act","form-desac")
        cont2.classList.replace("form-desac","form-act");
        control[0].value = '1';
        control[1].value = '1';
    }
    else if(control[0].value == '1' && control[1].value == '1'){
        btn.innerHTML = "Cambiar modo de búsqueda";
        cont.classList.replace("form-desac","form-act")
        cont2.classList.replace("form-act","form-desac");
        control[0].value = '0';
        control[1].value = '0';
    }
})