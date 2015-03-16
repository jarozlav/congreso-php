<?php

    include_once('../tools/tools.php');
    include_once('../model/academia.php');

    session_start();
    print_r($_POST);
    $parameters = array(
        'user',
        'pass'
    );
    if(!isNullorEmpty($_POST, $parameters)){
        $user = $_POST['user'];
        $_SESSION['user'] = $user;
        //$_SESSION['academias'] = toDataBase('academias');
        
        $names = array('ISC','IGE','IQ');
        $academias = null;
        $index = 0;
        foreach($names as $name){
            $academia = new academia();
            $academia->name = $name;
            $academias[$index] = $academia;
            $index += 1;
        }
        
        $_SESSION['academias'] = $academias;
        header('location: ../vistas/index.php');
    }else{
        $_SESSION['error_login']='No ingresaste usuario ni contraseña';
        header('location: ../vistas/login.php');
    }
    
?>