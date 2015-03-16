<!DOCTYPE>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='Expires' content='0'>
	<link href='css/estructura.css' type='text/css' rel='stylesheet'/>
        <title>Semana de Ingenierias</title>
    </head>
    <body>
        <?php
        include_once('../tools/tools.php');
        session_start();
        if(!isNullorEmpty($_SESSION, array('user'))){
        ?>
        <div class='wrap'>
	    <nav>
		<ul class='menu'>
		    <li>
			<a href='../vistas/index.php'>Inicio</a>
		    </li>
		    <li>
			<a href='#'>Lista de opciones</a>
			<ul>
			    <li>
				<a href='../control/cursos.php'>Cursos</a>
			    </li>
			    <li>
				<a href='../control/conferencias.php'>Conferencias</a>
			    </li>
			</ul>
		    </li>
		    <li>
			<a href='../control/logout.php'>Cerrar sesion</a>
		    </li>
		</ul>
		<div class='clearfix'></div>
	    </nav>
        </div>
	<?php
            if(!isNullorEmpty($_SESSION, array('conferencias'))){
                $conferencias = $_SESSION['conferencias'];
            ?>
            <div class='logo'>
                <img src='imagenes/logo.png' alt='logo' width='100' height='100'/>
            </div>
            <div class='portada'>
                <img src='imagenes/portada.png' alt='logo' width='600' height='100'/>
            </div>
            <div class='encabezado'><h1>Bienvenido a la semana de ingenierias</h1></div>
                <table class='info'>
                    <?php
                    
                        foreach($conferencias as $conferencia){
                        ?>
                        <tr>
                            <td class='text'>
                                Nombre del conferencia:
                            </td>
                            <td class='data'>
                                <?php echo $conferencia->nombre?>
                            </td>
                        </tr>
                        <tr>
                            <td class='text'>
                                Nombre del instructor:
                            </td>
                            <td class='data'>
                                <?php echo $conferencia->ponente?>
                            </td>
                        </tr>
                        <tr>
                            <td class='text'>
                                Academia del conferencia:
                            </td>
                            <td class='data'>
                                <?php echo $conferencia->academia?>
                            </td>
                        </tr>
                        <tr>
                            <td class='text'>
                                Fecha de la conferencia:
                            </td>
                            <td class='data'>
                                <?php echo $conferencia->fecha?>
                            </td>
                        </tr>
                        <tr>
                            <td class='text'>
                                Lugar de la conferencia:
                            </td>
                            <td class='data'>
                                <?php echo $conferencia->lugar?>
                            </td>
                        </tr>
                        <tr>
                            <td class='text'>
                                Hora del conferencia:
                            </td>
                            <td class='data'>
                                <?php echo $conferencia->hora?>
                            </td>
                        </tr>
                        <tr>
                            <td class='text'>
                                Precio:
                            </td>
                            <td class='data'>
                                <?php echo $conferencia->precio?>
                            </td>
                        </tr>
                        <tr>
                            <td class='salto'></td>
                            <td class='salto'></td>
                        </tr>
                
                        <?php
                        }
                    ?>
               </table>
            <?php
            }
        }else{
	    ?>
	    <script type='text/javascript'>
	        window.location.href = "../control/logout.php"
	    </script>
	    <?php
	}
        ?>
    </body>
</html>
