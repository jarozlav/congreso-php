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
            if(!isNullorEmpty($_SESSION, array('academias'))){
                $academias = $_SESSION['academias'];
            ?>
            <div class='logo'>
                <img src='imagenes/logo.png' alt='logo' width='100' height='100'/>
            </div>
            <div class='portada'>
                <img src='imagenes/portada.png' alt='logo' width='600' height='100'/>
            </div>
            <div class='encabezado'><h1>Bienvenido a la semana de ingenierias</h1></div>
            <div class='cuerpo'>
                <div>
                    <form action='../control/cursos.php' method='post'>
                        Selecciona la academia para ver los cursos:<br><br>
                        <select name='academia'>
                            <?php
                                foreach($academias as $academia){
                                ?>
                                    <option ><?php echo $academia->name ?></option>
                                <?php
                                }
                            ?>
                        </select><br><br>
                        <input type='submit' name='aceptar' value='Aceptar'/>
                    </form>
                </div>
                <br><br>
                <div>
                    <form action='../control/conferencias.php' method='post'>
                        Selecciona la academia para ver las conferencias:<br><br>
                        <select name='academia'>
                            <?php
                                foreach($academias as $academia){
                                ?>
                                    <option ><?php echo $academia->name ?></option>
                                <?php
                                }
                            ?>
                        </select><br><br>
                        <input type='submit' name='aceptar' value='Aceptar'/>
                    </form>
                </div>
            </div>
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
