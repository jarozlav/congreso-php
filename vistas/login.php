<!DOCTYPE>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='Expires' content='0'>
	<link href='css/estructura.css' type='text/css' rel='stylesheet'/>
        <title>Semana de Ingenierias</title>
    </head>
    <body>
        <div class='up'>
            
        </div>
        <div class='logo'>
	    <img src='imagenes/logo.png' alt='logo' width='100' height='100'/>
	</div>
	<div class='portada'>
	    <img src='imagenes/portada.png' alt='logo' width='600' height='100'/>
	</div>
        <div class='encabezado'><h1>Inicia sesión</h1></div>
        <br>
        <div class='cuerpo'>
            <form action='../control/login.php' method='post' class='login'>
                <?php
                    session_start();
                    if(isset($_SESSION['error_login'])){
                    ?>
			<span style='color: red'><?php echo $_SESSION['error_login']; ?></span><br>
		    <?php
                    $_SESSION['error_login'] = null;
                    }
                ?>
                <div class='etiqueta'>
                    Usuario:
                </div>
                <input type='text' name='user' class='user'/><br><br>
                
                <div class='etiqueta'>
                    Contraseña:
                </div>
                <input type='password' name='pass' class='pass'/><br><br>
                <input type='submit' name='aceptar' value='Aceptar'/>
            </form>
        </div>
    </body>
</html>
