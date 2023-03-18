
<?php

// se incluye el archivo de configuración

require_once "config.php";

 

// Definir variables e inicializar con valores vacíos

$username = $password = $confirm_password = "";

$username_err = $password_err = $confirm_password_err = "";

 

// Procesamiento de datos del formulario cuando se envía el formulario

if($_SERVER["REQUEST_METHOD"] == "POST"){

 

    // Validar el nombre de usuario

    if(empty(trim($_POST["username"]))){

        $username_err = "Por favor ingrese un usuario.";

    } else{

        // Preparar la consulta

        $sql = "SELECT id FROM users WHERE username = ?";

        

        if($stmt = mysqli_prepare($link, $sql)){

            // Vincular variables a la declaración preparada como parámetros

            mysqli_stmt_bind_param($stmt, "s", $param_username);

            

            // asignar parámetros

            $param_username = trim($_POST["username"]);

            

            // Intentar ejecutar la declaración preparada

            if(mysqli_stmt_execute($stmt)){

                /* almacenar resultado*/

                mysqli_stmt_store_result($stmt);

                

                if(mysqli_stmt_num_rows($stmt) == 1){

                    $username_err = "Este usuario ya fue tomado.";

                } else{

                    $username = trim($_POST["username"]);

                }

            } else{

                echo "Al parecer algo salió mal.";

            }

        }

         

        // Declaración de cierre

        mysqli_stmt_close($stmt);

    }

    

    // Validar contraseña

    if(empty(trim($_POST["password"]))){

        $password_err = "Por favor ingresa una contraseña.";     

    } elseif(strlen(trim($_POST["password"])) < 6){

        $password_err = "La contraseña al menos debe tener 6 caracteres.";

    } else{

        $password = trim($_POST["password"]);

    }

    

    // Validar que se confirma la contraseña

    if(empty(trim($_POST["confirm_password"]))){

        $confirm_password_err = "Confirma tu contraseña.";     

    } else{

        $confirm_password = trim($_POST["confirm_password"]);

        if(empty($password_err) && ($password != $confirm_password)){

            $confirm_password_err = "No coincide la contraseña.";

        }

    }

    

    // Verifique los errores de entrada antes de insertar en la base de datos

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        

        // Prepare una declaración de inserción

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

         

        if($stmt = mysqli_prepare($link, $sql)){

            // Vincular variables a la declaración preparada como parámetros

            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            

            // Establecer parámetros

            $param_username = $username;

			$param_password = password_hash($password, PASSWORD_DEFAULT); // Crear una contraseña hash

            

            // Intentar ejecutar la declaración preparada

            if(mysqli_stmt_execute($stmt)){

                // Redirigir a la página de inicio de sesión (login.php)

                header("location: login.php");

            } else{

                echo "Algo salió mal, por favor inténtalo de nuevo.";

            }

        }

         

        // claración de cierre

        mysqli_stmt_close($stmt);

    }

    

    // Cerrar la conexión

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

<body>


<head>

   

    <title>Registro</title>

</head>

<body>

    

        <h2>Registro</h2>

        <p>Por favor complete este formulario para crear una cuenta.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <label>Usuario</label>

                <input type="text" name="username"  value="<?php echo $username; ?>">

                <span><?php echo $username_err; ?></span><br>

            

                <label>Contraseña</label>

                <input type="password" name="password"  value="<?php echo $password; ?>">

                <span><?php echo $password_err; ?></span><br>

            

            

                <label>Confirmar contraseña</label>

                <input type="password" name="confirm_password"  value="<?php echo $confirm_password; ?>">

                <span><?php echo $confirm_password_err; ?></span><br>

            

                <input type="submit"  value="Ingresar">

                <input type="reset"  value="Borrar"><br>

            

            <p>¿Ya tienes una cuenta? <a href="login.php">Ingresa aquí</a>.</p>

        </form>

    

</body>

</html>