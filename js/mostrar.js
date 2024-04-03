const check = document.getElementById("mostrar");
const pass = document.getElementById("pass");
check.addEventListener("click",()=>{
switch(pass.type){
case "password":
    pass.type = "text";
    break;
case "text":
    pass.type="password";
    break;    
}
})