<?php

    include_once('../tools/tools.php');

    session_start();
    $parameters = array(
        'user',
        'pass'
    );
    if(!isNullorEmpty($_POST, $parameters)){
        $user = $_POST['user'];
        $_SESSION['user'] = $user;
        $_SESSION['academias'] = toDataBase('academias');
        header('location: ../vistas/index.php');
    }else{
        $_SESSION['error_login']='No ingresaste usuario ni contraseña';
        header('location: ../vistas/login.php');
    }
    
?>