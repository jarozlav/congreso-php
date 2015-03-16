<?php
class toMysql extends mysql {
    		
    function __construct($user="user",$pass="pass",$dbname="dbname"){
	//parent::__construct($user,$pass,$dbname);
	parent::__construct();
    }
	    
    public function _select($sql){
	$consulta=NULL;
	try{
	    parent::Conectar();
	    parent::set_Sql($sql);
	    $consulta=parent::Ejecutar_consulta();
	    parent::set_Sql();
	    parent::Desconectar();
	    return $consulta;	
	}catch(Exception $e){
	    throw $e;
	}
    }

    public function _insert($sql){
	$rows=-1;
	try{
	    if($this->valida_insert($sql)){
		parent::Conectar();
		parent::set_Sql($sql);
		$rows=parent::Ejecutar_comando();
		parent::set_Sql();
		parent::Desconectar();
		return $rows;	
	    }else{
		throw new Exception("toMysql->_insert(): No es un comando insert");
		return FALSE;
	    }
		
	}catch(Exception $e){
	    throw $e;
	}
    }
		
    private function valida_insert($sql){
	if(strcmp($sql, '') == 0){
	    throw new Exception("toMysql->valida_insert(): Sql vacio");
	    return FALSE;
	}else{
	    $insert=substr($sql, 0, 6);
	    if(strcasecmp($insert, "INSERT") == 0){
		    return TRUE;
	    }else{
		    return FALSE;
	    }
	}
    }
		
    public function _update($sql){
	$rows=-1;
	try{
	    if($this->valida_update($sql)){
		parent::Conectar();
		parent::set_Sql($sql);
		$rows=parent::Ejecutar_comando();
		parent::set_Sql();
		parent::Desconectar();
		return $rows;	
	    }else{
		throw new Exception("toMysql->_update(): No es un comando update");
		return FALSE;
	    }
		
	}catch(Exception $e){
	    throw $e;
	}
    }
		
    private function valida_update($sql){
	if(strcmp($sql, '') == 0){
	    throw new Exception("toMysql->valida_update(): Sql vacio");
	    return FALSE;
	}else{
	    $update=substr($sql, 0, 6);
	    if(strcasecmp($update, "UPDATE") == 0){
		    return TRUE;
	    }else{
		    return FALSE;
	    }
	}
    }
		
    public function _delete($sql){
	$rows=-1;
	try{
	    if($this->valida_delete($sql)){
		parent::Conectar();
		parent::set_Sql($sql);
		$rows=parent::Ejecutar_comando();
		parent::set_Sql();
		parent::Desconectar();
		return $rows;	
	    }else{
		throw new Exception("toMysql->_delete: No es un comando delete");
		return FALSE;
	    }
		
	}catch(Exception $e){
	    throw $e;
	}
    }
		
    private function valida_delete($sql){
	if(strcmp($sql, '') == 0){
	    throw new Exception("toMysql->valida_delete(): Sql vacio");
	    return FALSE;
	}else{
	    $delete=substr($sql, 0, 6);
	    if(strcasecmp($delete, "DELETE") == 0){
		    return TRUE;
	    }else{
		    return FALSE;
	    }
	}
    }
}
?>