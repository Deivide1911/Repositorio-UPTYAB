<?php 
include('./control/validacion(index).php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="estilos(nuevo index)/style.css">
    <link rel="icon" type="image/x-icon" href="images/icon.png">
</head>
<div class="logo">
    <a href="register.php"><img src="images (nuevo index)/logomin.png" alt="logo" class="registerlogo-uptyab"></a>
    <div class="sub-div">
        <h2 class="texto1">REPOSITORIO UPTYAB</h2>
    </div>
</div>

<body class="registerbody">
    <section class="register-container">
        <form class="register-info-container" method="post">
            <div class="register-inputs-container">
                <h1 class="registrotitulo">Registrate</h1>
                <input type="text" placeholder="Primer Nombre" name="pnombre" class="box-text" required>
                <input type="text" placeholder="Segundo Nombre" name="snombre" class="box-text" required>
                <input type="text" placeholder="Primer Apellido" name="papellido" class="box-text" required>
                <input type="text" placeholder="Segundo Apellido" name="sapellido" class="box-text" required>
                <input type="date" placeholder="Fecha de nacimiento" name="fecha" class="box-text" required>
                <label for="">Ingresa tu sexo</label>
                <div class="sex cntr">
                    <label for="hombre">Hombre</label>
                    <input type="radio" name="sexo" id="hombre" class="sex1" value="Hombre">
                    <label for="mujer">Mujer</label>
                    <input type="radio" name="sexo" id="mujer" class="sex1" value="Mujer">
                </div>
                <input type="text" placeholder="Cédula" name="ci" class="box-text" required>
                <input type="password" placeholder="Contraseña" name="contraseña" class="box-text" required>
                <p>¿Tienes cuenta? <span class="span"><a href="index.php">Logueate</a></span></p>
                <input type="submit" class="btn button" name="btn">
                
            </div>
        </form>
        <?php
            include("./control/registro.php");
        ?>
        <aside>
            <img src="images (nuevo index)/register.jpg" alt="s" class="image-container">
        </aside>
    </section>
    <style>
/* NUEVO ESTILO DEL REGISTER.PHP */
.registerbody{
    margin: 0;
    height: 130vh;
    font-family: "Nunito", sans-serif;
    background-image: linear-gradient(to top, #1d5685 0%, #a9ddff 100%);
}

.register-container{
    height: 41.45em;
    width: 60em;
    margin: 3em auto;
    display: flex;
    justify-content: space-between;
    overflow: hidden;
    border-radius: 10px;
    opacity: 0;
            transform: translateY(20px);
            animation: aparecer 1s forwards;
            
        }
        @keyframes aparecer {
    to {
        opacity: 1; /* Hacer visible el texto */
        transform: translateY(0); /* Regresar a la posición original */
    }
        }

.register-info-container{
    width: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding-top: 0.5rem;
    background-color: var(--login-bg);
    margin-bottom: 0em;
    
}
/* Ajustes de las imagenes */
.register-image-container{
    width: 30em;
    background-color: var(--image-bg);
    height: 800px;
}
/* titulo */
.registrotitulo{
    text-transform: capitalize;
    font-size: 2.5rem;
    font-weight: 600;
    letter-spacing: 1px;
    color: var(--titulo);
}

/* Inputs */
.register-inputs-container{
    height: 55%;
    width: 85%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    
}
input, .btn{
    width: 90%;
    height: 2rem;
    font-size: 1em;
    margin: 10px;
    padding: 7px;
}
input{
    border: none;
    border-radius: 5px;
    font-weight: 600;
    letter-spacing: 1px;
    box-sizing: border-box;
    padding: 5px;
}

.box-text{
    border: 1px solid transparent;
}

.box-text:hover{
    border: 1px solid var(--button-bg);
}

.sex{
    display: flex;
    gap: 10px;
}

.sex1{
    padding:0;
    margin-top: -1px;

}
.registerlogo-uptyab{
    margin-top: 10px;
    height: 81px;
    width: 150px;
}
    </style>
</body>
</html>