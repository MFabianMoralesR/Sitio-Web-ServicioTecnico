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
            height: 600px;
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
    font-size: 28px;    margin: 45px;     width: 680px; text-align: center;    border-collapse: collapse;    margin: 0 auto;
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
    <h1 style = "font-family: cursive;"><center>Servicio Tecnico - Fabian Morales</center></H1><BR>
    <h1 style = "font-family: cursive;"><center>Agregar Nuevo Cliente</center></H1><BR>

  
<form action='agregar2.php' method='post' name='form1' id='form1'><br>
  <div id='widthmenu'>
  <table class="table "width='45%' border='1'>
    <td colspan='2'><div align='center'><strong>DATOS DEL CLIENTE</strong></div></td>
    <tr>
      <td>Numero Nota</td>
      <td ><input class='trasparencia' type='text'  name='id_notas' id='textfield'></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td ><input class='trasparencia' type='text' name='nombre' id='textfield2'></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><input class='trasparencia' type='text' name='apellido' id='textfield3'></td>
    </tr>
  	<tr>
      <td>Telefono</td>
      <td><input class='trasparencia' type='text' name='telefono' id='textfield4'></td>
    </tr>
	<tr>
      <td>Equipo</td>
      <td><input class='trasparencia' type='text' name='equipo' id='textfield4'></td>
    </tr>
	<tr>
	  <td>Descripcion</td>
      <td><input class='trasparencia' type='text' name='descripcion' id='textfield4'></td>
    </tr>
	<tr>
	  <td>Fecha</td>
      <td><input class='trasparencia' type='text' name='fecha' id='textfield4'></td>
    </tr>
	<tr>
	  <td>Status</td>
      <td><input class='trasparencia' type='text' name='estatus' id='textfield4'></td>
    </tr>
    <tr align='center'>
      <td colspan='2'>
	  <input type='submit' name='enviar' id='enviar' value='Enviar'/>
      <input type='reset' name='restablecer' id='restablecer' value='Restablecer'/></td>
    </tr>
  </table></div></form>
  
<br /><hr />
    	
    <?php


