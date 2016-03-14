<?php

class sdb 
{  
    protected  static $PDOInstance; 
    
    public function __construct() {

       if(!self::$PDOInstance) { 
            try {
               self::$PDOInstance = new PDO("mysql:host=127.0.0.1;dbname=unistmocalificaciones","Cosijopii","cosijopii",array('charsert'=>'utf-8'));
               self::$PDOInstance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
               self::$PDOInstance->query("SET CHARACTER SET utf8");
            } catch (PDOException $e) { 
               die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
            }
        }
        return self::$PDOInstance; 
    }

   
	public function beginTransaction() {
		return self::$PDOInstance->beginTransaction();
	}
        

	public function commit() {
		return self::$PDOInstance->commit();
	}
	

    public function errorCode() {
    	return self::$PDOInstance->errorCode();
    }
    

    public function errorInfo() {
    	return self::$PDOInstance->errorInfo();
    }
    
   
    public function exec($statement) {
    	return self::$PDOInstance->exec($statement);
    }
    
 
    public function getAttribute($attribute) {
    	return self::$PDOInstance->getAttribute($attribute);
    }

    public function getAvailableDrivers(){
    	return Self::$PDOInstance->getAvailableDrivers();
    }
    

	public function lastInsertId($name) {
		return self::$PDOInstance->lastInsertId($name);
	}
        

    public function prepare ($statement, $driver_options=false) {
    	if(!$driver_options) $driver_options=array();
    	return self::$PDOInstance->prepare($statement, $driver_options);
    }
    

    public function query($statement) {
    	return self::$PDOInstance->query($statement);
    }
    
  
    public function queryFetchAllAssoc($statement) {
    	return self::$PDOInstance->query($statement)->fetchAll(PDO::FETCH_ASSOC);
    }
    
   
    public function queryFetchRowAssoc($statement) {
    	return self::$PDOInstance->query($statement)->fetch(PDO::FETCH_ASSOC);    	
    }
    
     public function queryFetchColAssoc($statement) {
    	return self::$PDOInstance->query($statement)->fetchColumn();    	
    }
    
   
    public function quote ($input, $parameter_type=0) {
    	return self::$PDOInstance->quote($input, $parameter_type);
    }
    
    public function rollBack() {
    	return self::$PDOInstance->rollBack();
    }      
    

    public function setAttribute($attribute, $value  ) {
    	return self::$PDOInstance->setAttribute($attribute, $value);
    }
}




?>