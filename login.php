
<?php

// Inicializa la sesión

session_start();

 

/* Verifique si el usuario ya ha iniciado sesión, si es así, 

rediríjalo a la página de bienvenida (index.php)*/

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

  header("location: Tecnico2.php");

  exit;

}

 

// Incluir el archivo de configuración

require_once "config.php";

 

// Definir variables e inicializar con valores vacíos

$username = $password = $username_err = $password_err = "";

 

// Procesamiento de datos del formulario cuando se envía el formulario

if($_SERVER["REQUEST_METHOD"] == "POST"){

 

    // Comprobar si el nombre de usuario está vacío

    if(empty(trim($_POST["username"]))){

        $username_err = "Por favor ingrese su usuario.";

    } else{

        $username = trim($_POST["username"]);

    }

    

    // Comprobar si la contraseña está vacía

    if(empty(trim($_POST["password"]))){

        $password_err = "Por favor ingrese su contraseña.";

    } else{

        $password = trim($_POST["password"]);

    }

    

    // Validar información del usuario

    if(empty($username_err) && empty($password_err)){

        // Preparar la consulta select

        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        

        if($stmt = mysqli_prepare($link, $sql)){

            /* Vincular variables a la declaración preparada como parámetros, s es por la

			variable de tipo string*/

            mysqli_stmt_bind_param($stmt, "s", $param_username);

            

            // Asignar parámetros

            $param_username = $username;

            

            // Intentar ejecutar la declaración preparada

            if(mysqli_stmt_execute($stmt)){

                // almacenar el resultado de la consulta

                mysqli_stmt_store_result($stmt);

                

                /*Verificar si existe el nombre de usuario, si es así,

				verificar la contraseña*/

                if(mysqli_stmt_num_rows($stmt) == 1){                    

                    // Vincular las variables del resultado

                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

					//obtener los valores de la consulta

                    if(mysqli_stmt_fetch($stmt)){

						/*comprueba que la contraseña ingresada sea igual a la 

						almacenada con hash*/

                        if(password_verify($password, $hashed_password)){

                            // La contraseña es correcta, así que se inicia una nueva sesión

                            session_start();

                            

                            // se almacenan los datos en las variables de la sesión

                            $_SESSION["loggedin"] = true;

                            $_SESSION["id"] = $id;

                            $_SESSION["username"] = $username;                            

                            

                            // Redirigir al usuario a la página de inicio

                            header("location: Tecnico2.php");

                        } else{

                            // Mostrar un mensaje de error si la contraseña no es válida

                            $password_err = "La contraseña que ha ingresado no es válida.";

                        }

                    }

                } else{

                    // Mostrar un mensaje de error si el nombre de usuario no existe

                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";

                }

            } else{

                echo "Algo salió mal, por favor vuelve a intentarlo.";

            }

        }

        

        // Cerrar la sentencia de consulta

        mysqli_stmt_close($stmt);

    }

    

    // Cerrar laconexión

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

    



        <p>Por favor, introduzca usuario y contraseña para iniciar sesión.</p><br><br>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <label>Usuario</label>

                <input type="text" name="username"  value="<?php echo $username; ?>">

                <span ><?php echo $username_err; ?></span><br>

              

                <label>Contraseña</label>

                <input type="password" name="password">

                <span ><?php echo $password_err; ?></span><br><br>

            

            

                <input class='button' type="submit"  value="Ingresar"><br><br><br><br>

                <p>¿No tienes una cuenta? <a href="register.php">Regístrate ahora</a>.</p>

        </form>

     

</body>

</html>


