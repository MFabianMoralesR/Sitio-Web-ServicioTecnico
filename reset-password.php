<?php

// inicializa la sesión

session_start();

 

/* Compruebe si el usuario ha iniciado sesión; 

	de lo contrario, redirija a la página de inicio de sesión (login.php)*/

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

    header("location: login.php");

    exit;

}

 

// incluir el archivo de configuración

require_once "config.php";

 

// Definir variables e inicializar con valores vacíos

$new_password = $confirm_password = "";

$new_password_err = $confirm_password_err = "";

 

// Procesamiento de datos del formulario cuando se envía el formulario

if($_SERVER["REQUEST_METHOD"] == "POST"){

 

    // Validar la nueva contraseña

    if(empty(trim($_POST["new_password"]))){

        $new_password_err = "Por favor, introduzca la nueva contraseña.";     

    } elseif(strlen(trim($_POST["new_password"])) < 6){

        $new_password_err = "La contraseña debe tener al menos 6 caracteres.";

    } else{

        $new_password = trim($_POST["new_password"]);

    }

    

    // Validar la confirmación de contraseña

    if(empty(trim($_POST["confirm_password"]))){

        $confirm_password_err = "Por favor confirme la contraseña.";

    } else{

        $confirm_password = trim($_POST["confirm_password"]);

        if(empty($new_password_err) && ($new_password != $confirm_password)){

            $confirm_password_err = "Las contraseñas no coinciden.";

        }

    }

        

    // Verifique los errores de entrada antes de actualizar la base de datos

    if(empty($new_password_err) && empty($confirm_password_err)){

        // Prepare la declaración de actualización

        $sql = "UPDATE users SET password = ? WHERE id = ?";

        

        if($stmt = mysqli_prepare($link, $sql)){

            // Vincular variables a la declaración preparada como parámetros

            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            

            // Asignar parámetros

            $param_password = password_hash($new_password, PASSWORD_DEFAULT);

            $param_id = $_SESSION["id"];

            

            // Intente ejecutar la declaración preparada

            if(mysqli_stmt_execute($stmt)){

                /* Contraseña actualizada exitosamente. 

				Destruye la sesión y redirige a la página de inicio de sesión (login.php)*/

                session_destroy();

                header("location: login.php");

                exit();

            } else{

                echo "Algo salió mal, por favor vuelva a intentarlo.";

            }

        }

        

        // Declaración de cierre

        mysqli_stmt_close($stmt);

    }

    

    // Cerrar conexión

    mysqli_close($link);

}

?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	


		<plantilla>
			
			<link rel=Stylesheet href="css\pchd.css" type="text/css" media="screen and (max-width:3600px) and (min-width:1201px)">
		</plantilla>
    <title>Servicio Técnico</title>
    <style>
        @media screen and (max-width: 980px){
    #contenedor{
        width: 90%;
    }
    #contenido{
        width: 60%;
    }
    #barra_lateral{
        width:30%;
    }
}
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

   
        header {
            background-color: #010f09 ;
            padding: 30px;
            text-align: center;
            font-size: 35px;
            color: white;
        }

      
        nav {
            float: left;
            width: 30%;
            height: 300px;

            background: rgb(39, 196, 170);
            padding: 20px;
        }
        nav {
            float: left;
            width: 100%;
            height: 80px;
          
            background: rgb(6, 101, 179);
            padding: 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        article {
            float: left;
            padding: 20px;
            width: 100%;
            background-color: #201c8f;
            height: 1500px;
        }

       
        section::after {
            content: "";
            display: table;
            clear: both;
            display:none;
        }

       
        footer {
            background-color: #777;
            padding: 10px;
            text-align: center;
            color: white;
        }

      
        @media (max-width: 600px) 
        {

nav,
article {
    width: 100%;
    height: auto;
}
}
        a{
  border-radius: 5px;
  padding: 10px 7px;
  text-decoration: none;
  color: #fff;
  background-color: #333;
  margin: 5px;
}

.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:#10aa24;
				color:#fff;
				width: 105px;
				padding:10px 12px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#434343;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}
            
			.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;	
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
        

    </style>
    <div style="clear:both;display:none;"></div>
    
    <nav class="nav">
<ul>
    <li>
        <a href="index.html">Inicio</a>
    </li>
    <li>
        <a href="">Conocenos</a>
        <ul>
            <li><a href="mision.html">MISION</a></li>
            <li><a href="vision.html">VISION</a></li>
            
        </ul>
    </li>

    <li>
        <a href="Usuario.html">Usuario</a>
    </li>
    <li>
        <a href="">Tecnico</a>
        <ul>
        <li><a href="Servicios1.php">Cerrar Sesion</a></li>
        
            
        </ul>
        
    </li>
    <li>
        <a href="">Servicios</a>
        <ul>
            <li><a href="Celulares.html">Celulares</a></li>
            <li><a href="Computadora.html">Pcs</a></li>
            <li><a href="Redes.html">Redes</a></li>
        </ul>
    </li>
    <li>
        <a href="Contactanos.html">Contactanos</a>
    </li>
   
</ul>

   
</nav>
<div style="clear:both;"></div>

<head>
  <title>Servicio Técnico</title>
</head>

<body style="background-color: #0c0606 ;">

  <header>
    <h1 style = "font-family: cursive;"><center>Administracion para el Tecnico</center></H1><BR></BR>
      
        <center><img src="img/celular.png" width="1500"
            height="400"></center><br><br>

		

	</head>


    <title>Cambio de contraseña</title>

</head>

<body>

        <h1>Cambio contraseña</h1><br><br>

        <p>Complete este formulario para restablecer su contraseña.</p><br><br>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 

        

                <label>Nueva contraseña</label>

                <input type="password" name="new_password" value="<?php echo $new_password; ?>">

                <span><?php echo $new_password_err; ?></span><br><br>

            

                <label>Confirmar contraseña</label>

                <input type="password" name="confirm_password" >

                <span><?php echo $confirm_password_err; ?></span><br><br>

            

                <input class="button" type="submit" value="Enviar"><br><br>

                <a class="btn btn-link" href="index.php">Cancelar</a>

           

        </form>

  

</body>

</html>


