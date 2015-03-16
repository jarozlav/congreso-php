<?php

    include_once('../database/toMysql.php');

class conferencia{
    
    private $id = -1;
    public $nombre = '';
    public $ponente = '';
    public $academia = '';
    public $fecha = '';
    public $lugar = '';
    public $hora = '';
    public $precio = 0.0;
    
    
    public static function All(){
        $sql = 'select * from conferencia';
        return conferencia::Consulta($sql);
    }
    
    private static function Consulta($sql = ''){
        if($sql != ''){
            $index = 0;
            $conferencias_ = null;
            $_mysql = new toMysql();
            $conferencias = $_mysql->_select($sql);
            if($conferencias){
                foreach($conferencias as $datos){
                    $conferencia = new conferencia();
                    $conferencia->nombre = $datos[1];
                    $conferencia->ponente = $datos[2];
                    $conferencia->academia = $datos[3];
                    $conferencia->fecha = $datos[4];
                    //$conferencia->lugar = $datos[6];
                    $conferencia->hora = $datos[5];
                    $conferencia->precio = $datos[6];
                    $conferencias_[$index] = $conferencia;
                    $index += 1;
                }
            }
            return $conferencias_;
        }
        return null;
    }
    
    public static function Select($where){
        if($where != ''){
            $sql = 'select * from conferencia where '.$where;
            return conferencia::Consulta($sql);
        }
        return null;
    }
    
}

?>