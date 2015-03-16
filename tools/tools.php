<?php

    include_once('../database/connectToMysql.php');

    function isNullorEmpty($_post, $parameters){
        foreach ($parameters as $parameter){
            if (!isset($_post[$parameter])){
                return true;
            }
            if ($_post[$parameter] == null){
                return true;
            }
            if (empty($_post[$parameter])){
                return true;
            }
        }
        return false;
    }
    
    function toDataBase($entity, $where = ''){
        if($where != ''){
            return $entity($where);
        }
        return $entity();
    }
    
    
?>