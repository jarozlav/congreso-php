<?php
    
    include_once('../tools/tools.php');
    
    
    session_start();
    $method = $_SERVER['REQUEST_METHOD'];
    $conferencias = null;
    if(strcasecmp($method, 'post') == 0){
        if(!isNullorEmpty($_POST, array('academia'))){
            $where = 'academia = \''.$_POST['academia']."'";
            $conferencias = toDataBase('conferencias', $where);
        }else{
            $conferencias = toDataBase('conferencias');
        }
    }elseif(strcasecmp($method, 'get') == 0){
        $conferencias = toDataBase('conferencias');
    }
    $_SESSION['conferencias'] = $conferencias;
    header('location: ../vistas/conferencias.php');

?>