<?php
    
    //include_once('../tools/tools.php');
    //
    //
    //session_start();
    //$method = $_SERVER['REQUEST_METHOD'];
    //$cursos = null;
    //if(strcasecmp($method, 'post') == 0){
    //    if(!isNullorEmpty($_POST, array('academia'))){
    //        $where = 'academia = '.$_POST['academia'];
    //        $cursos = toDataBase('cursos', $where);
    //    }else{
    //        $cursos = toDataBase('cursos');
    //    }
    //}elseif(strcasecmp($method, 'get') == 0){
    //    $cursos = toDataBase('cursos');
    //}
    //$_SESSION['cursos'] = $cursos;
    header('location: ../vistas/cursos.php');

?>