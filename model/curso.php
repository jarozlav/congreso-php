<?php

    include_once('../database/toMysql.php');

class curso{
    private $id = -1;
    public $nombre = '';
    public $instructor = '';
    public $academia = '';
    public $fecha_inicio = '';
    public $fecha_fin = '';
    public $lugar = '';
    public $hora = '';
    public $precio = 0.0;
    
    
    public static function All(){
        $sql = 'select * from curso order by nombre';
        return curso::Consulta($sql);
    }
    
    private static function Consulta($sql = ''){
        if($sql != ''){
            $index = 0;
            $cursos_ = null;
            $_mysql = new toMysql();
            $cursos = $_mysql->_select($sql);
            if($cursos){
                foreach($cursos as $datos){
                    $curso = new curso();
                    $curso->nombre = $datos[1];
                    $curso->instructor = $datos[2];
                    $curso->academia = $datos[3];
                    $curso->fecha_inicio = $datos[4];
                    $curso->fecha_fin = $datos[5];
                    $curso->lugar = $datos[6];
                    $curso->hora = $datos[7];
                    $curso->precio = $datos[8];
                    $cursos_[$index] = $curso;
                    $index += 1;
                }
            }
            return $cursos_;
        }
        return null;
    }
    
    public static function Select($where){
        if($where != ''){
            $sql = 'select * from curso where '.$where;
            return curso::Consulta($sql);
        }
        return null;
    }
    
}

?>