<?php
    include_once('../model/academia.php');
    include_once('../model/curso.php');
    include_once('../model/conferencia.php');
    
    function academias(){
        return academia::All();
    }
    
    function cursos($where = ''){
        if($where != ''){
            return curso::Select($where);
        }
        return curso::All();
    }
    
    function conferencias($where = ''){
        if($where != ''){
            return conferencia::Select($where);
        }
        return conferencia::All();
    }
    
    
?>