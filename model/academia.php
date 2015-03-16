<?php

    include_once('../database/toMysql.php');

class academia {
    private $id = -1;
    public $name = '';
    
    public static function All(){
        $index = 0;
        $academias_ = null;
        $sql = 'select academia from academia order by academia';
        $_mysql = new toMysql();
        $academias = $_mysql->_select($sql);
        if($academias){
            foreach($academias as $datos){
                $academia = new academia();
                $academia->name = $datos[0];
                $academias_[$index] = $academia;
                $index += 1;
            }
        }
        return $academias_;
    }
    
}

    
?>