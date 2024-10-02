const botonDesac = document.querySelector(".fieldset");
const botonAct = document.querySelector(".cont-busq");
const btn = document.querySelector(".btn-act");
const reinicio = document.querySelectorAll(".busq");
const ctrl = document.querySelector(".control");
if (ctrl.value == "1"){
    botonDesac.classList.replace("fieldset","buscador-desac");
    botonAct.classList.replace("cont-busq","cont-busq-act");
    btn.innerHTML = "Volver a búsqueda normal";
    }
    else if (ctrl.value == "0"){
        botonAct.classList.replace("cont-busq-act","cont-busq");
        botonDesac.classList.replace("buscador-desac","fieldset");
        btn.innerHTML = "Búsqueda Más Específica";
        reinicio[0].value = "a"
        reinicio[1].value = "a"
        reinicio[2].value = "a"
    }
btn.addEventListener("click",()=>{
    if (ctrl.value == "0"){
    botonDesac.classList.replace("fieldset","buscador-desac");
    botonAct.classList.replace("cont-busq","cont-busq-act");
    btn.innerHTML = "Volver a búsqueda normal";
    ctrl.value = "1"
    }
    else if (ctrl.value == "1"){
        botonAct.classList.replace("cont-busq-act","cont-busq");
        botonDesac.classList.replace("buscador-desac","fieldset");
        btn.innerHTML = "Búsqueda Más Específica";
        ctrl.value = "0"
        reinicio[0].value = "a"
        reinicio[1].value = "a"
        reinicio[2].value = "a"
    }
});
history.replaceState(null,null,location.pathname);