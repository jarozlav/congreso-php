<?php

class mysql {
    		
    //definicion de la clase abstracta
    
    private $conection =-1;
    
    private $user="";
    
    private $pass="";
    
    private $dbname="";
    
    private $host="localhost"; // ip or hostname of server mysql
    
    //private $port=0; //number server port
     
    private $sql="";
    
    private $connect="";	
	    
    //metodos de la clase abstracta
    
    function __construct($user="user",$pass="pass",$dbname="dbname"){
	    $this->user=$user;
	    $this->pass=$pass;
	    $this->dbname=$dbname;
    }
    
    private function get($item){
	    return $this->$item;
    }
    
    private function set($item,$data){
	    $this->$item=$data;
    }
    
    protected function Conectar(){
	$this->connect=  mysql_connect($this->host, $this->user, $this->pass) or
	    die('No se pudo conectar con el servidor '.$this->host);
	mysql_select_db($this->dbname, $this->connect) or
	    die('No se pudo conectar a la base de datos '.$this->dbname);
	$this->conection = 1;
    }
    
    protected function Desconectar(){
	$this->conection = -1;
	mysql_close();
    }	

    protected function Ejecutar_consulta(){
	    if($this->conection == -1){
		    throw new Exception("mysql->Ejecutar_consulta(): No hay una conexion abierta");
		    return FALSE;
	    }else{
		    if(strcmp($this->sql, "") == 0){
			    throw new Exception("mysql->Ejecutar_consulta(): No hay consulta");
			    return FALSE;
		    }else{
			    if($this->valida_select()){
				    $resultset=mysql_query($this->get_Sql(), $this->conection);
				    if($resultset != FALSE){
					    if(mysql_num_rows($resultset)>0){
						    return $this->convertir_matriz($resultset);
					    }else{
						    return FALSE;
					    }	
				    }else{
					    throw new Exception("mysql->Ejecutar_consulta(): No se ejecuto la consulta");
				    }
				    
			    }else{
				    throw new Exception("mysql->Ejecutar_consulta(): No es una consulta SELECT");
				    return FALSE;
			    }
		    }
	    }
    }
    
    private function convertir_matriz($resultset){
	    if($resultset != FALSE){
		    $i=0;
		    $j=0;
		    $array=NULL;
		    while($row=mysql_fetch_row($resultset)){
			    foreach ($row as $data) {
				    $array[$i][$j]=$data;
				    $j++;
			    }
			    $i++;
			    $j=0;
		    }
		    return $array;
	    }else{
		    return FALSE;
	    }
    }
    
    private function valida_select(){
	    if(strcmp($this->get_Sql(), "") == 0){
		    return FALSE;
	    }else{
		    $select=substr($this->sql, 0, 6);
		    if(strcasecmp($select, "SELECT") == 0){
			    return TRUE;
		    }else{
			    return FALSE;
		    }
	    }
    }
    
    protected function Ejecutar_comando(){
	    if($this->conection == -1){
			    throw new Exception("mysql->Ejecutar_comando(): No hay conexion");
			    return FALSE;
	    }else{
		    if(strcmp($this->sql, "") == 0){
			    throw new Exception("mysql->Ejecutar_comando(): No hay consulta");
			    return FALSE;
		    }else{
			    $command=mysql_query($this->get_Sql(), $this->conection);
			    if($command != FALSE){
				    return mysql_affected_rows($command);
			    }
			    else{
				    throw new Exception("mysql->Ejecutar_comando(): No se ejecuto correctamente el comando");
				    return FALSE;
			    } 
		    }
	    }
    }
    
    
    public function get_Sql(){
	    return $this->get("sql");
    }
    
    public function set_Sql($data=""){
	    $this->set("sql", $data);
    }
    
}
?>