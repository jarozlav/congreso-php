<?php
    include_once('../model/academia.php');
    include_once('../model/curso.php');
    include_once('../model/conferencia.php');
    
    function academia(){
        return Academia::All();
    }
    
    function cursos($where = ''){
        if($where != ''){
            return Curso::Select($where);
        }
        return Curso::All();
    }
    
    function conferencias($where = ''){
        if($where != ''){
            return Conferencia::Select($where);
        }
        return Conferencia::All();
    }
    
    
?>