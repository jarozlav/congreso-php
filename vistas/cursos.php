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
            if(!isNullorEmpty($_SESSION, array('cursos'))){
                $cursos = $_SESSION['cursos'];
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
                    
                        foreach($cursos as $curso){
                        ?>
                        <tr>
                            <td class='text'>
                                Nombre del curso:
                            </td>
                            <td class='data'>
                                <?php echo $curso->nombre?>
                            </td>
                        </tr>
                        <tr>
                            <td class='text'>
                                Nombre del instructor:
                            </td>
                            <td class='data'>
                                <?php echo $curso->instructor?>
                            </td>
                        </tr>
                        <tr>
                            <td class='text'>
                                Academia del curso:
                            </td>
                            <td class='data'>
                                <?php echo $curso->academia?>
                            </td>
                        </tr>
                        <tr>
                            <td class='text'>
                                Fecha de inicio:
                            </td>
                            <td class='data'>
                                <?php echo $curso->fecha_inicio?>
                            </td>
                        </tr>
                        <tr>
                            <td class='text'>
                                Fecha fin del curso:
                            </td>
                            <td class='data'>
                                <?php echo $curso->fecha_fin?>
                            </td>
                        </tr>
                        <tr>
                            <td class='text'>
                                Lugar:
                            </td>
                            <td class='data'>
                                <?php echo $curso->lugar?>
                            </td>
                        </tr>
                        <tr>
                            <td class='text'>
                                Hora del curso:
                            </td>
                            <td class='data'>
                                <?php echo $curso->hora?>
                            </td>
                        </tr>
                        <tr>
                            <td class='text'>
                                Precio:
                            </td>
                            <td class='data'>
                                <?php echo $curso->precio?>
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
