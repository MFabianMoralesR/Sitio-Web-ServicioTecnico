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
            height: 300px;
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
            .table{
                font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 28px;    margin: 45px;     width: 480px; text-align: center;    border-collapse: collapse;    margin: 0 auto;
            }
            th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

            td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }
    
        tr:hover td { background: #d0dafd; color: #339; }

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
        <li><a href="Servicios1.php">Iniciar sesion</a></li>
            
        </ul>
        
    </li>
    <li>
        <a href="">Servicios</a>
        <ul>
            <li><a href="mision.html">Celulares</a></li><BR>
            <li><a href="vision.html">Computadoras</a></li>
            <li><a href="vision.html">Redes</a></li>
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
    <h1 style = "font-family: cursive;"><center>Estado de su equipo</center></H1><BR></BR>
        <center><img src="img/celular.png" width="1500"
            height="400"></center>
        
            <?php ?>

            <!-- Content -->
            <div class="container-fluid">
            
                <!-- Heading -->
                
            
                <div>
                    <div >
            
                        <div >
                        
                    
                              
                                    <table class="table" >
                                        <tr>
                                            <td>Numero de Nota</td>
                                            <td>Nombre</td>
                                            <td>Apellido</td>
                                            <td>Equipo</td>
                                            <td>Estatus</td>
                                        </tr>
                                  

                             
                                <?php
                                    include "conexion.php";

            $usuario = $_POST['usuario'];
           
         
         
                                    $query = mysqli_query($conexion, "SELECT * FROM notas WHERE idnotas=$usuario");
                              
                                    $result = mysqli_num_rows($query);
                                    if ($result > 0) {
                                        while ($data = mysqli_fetch_array($query)) { ?>
                                            <tr >
                                                
                                                <td><?php echo $data['idnotas']; ?></td>
                                                <td><?php echo $data['nombre']; ?></td>
                                                <td><?php echo $data['apellido']; ?></td>
                                                <td><?php echo $data['equipo']; ?></td>
                                                <td><?php echo $data['estatus']; ?></td>
                                               
                                                <td>
                                              
                                                </tr> 
                                                </td>
                                                <?php } ?>
                                    
                                           
                                            
                                    <?php }
                              
                                
                              ?>
      
            
        
                              
      <br><br>
   
 
    
 
</header>
</body>

</html>

