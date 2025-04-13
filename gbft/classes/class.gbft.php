<?php
include_once(dirname(__FILE__)."/adodb/adodb.inc.php");

class gbft {

	
	var $all_types = array("band","event","member","musician","venue");
	
	var $all_join_types = array("band_event", 
								"band_musician", 
								"band_venue", 
								"event_member",
								"event_musician",
								"event_venue", 
								"member_venue",
								"musician_venue", 
								"member_musician", 
								"band_member");
	
		
	function get_conn(){

		$this->conn = gbft::static_get_conn();
		if($_POST['db_debug'] == 'true' or $_GET['db_debug'] == 
'true' or $GLOBALS['db_debug'] == true){
			$this->conn->debug=true;
		}
		return $this->conn;
	}
	
	
	function set_vars(){
		foreach($_COOKIE as $key=>$val){
			$this->vars[$key] = $this->stripslashes_recursive($val);	
		}	
		foreach($_GET as $key=>$val){
			$this->vars[$key] = $this->stripslashes_recursive($val);
		}
		foreach($_POST as $key=>$val){
			$this->vars[$key] = $this->stripslashes_recursive($val);
		}
	}

	
	function stripslashes_recursive($array){
		if(!is_array($array)){
			return stripslashes($array);
		}else{
			foreach($array as $key=>$value){
				$array[$key] = $this->stripslashes_recursive($value);
			}
			return $array;
		}	
	}
	

	
	public static function static_get_conn(){
		global $DB_DEBUG;
		$conn = NewADOConnection('mysqli');
 		$conn->Connect($GLOBALS['db_host'], $GLOBALS['db_user'], 
$GLOBALS['db_pass'], $GLOBALS['db_name']);
		$conn->setFetchMode(ADODB_FETCH_ASSOC);
		return $conn;
		
	}
	
	function get_table_name($type1, $type2){
		if(strcasecmp($type1, $type2) < 0){
			$table_name =  $type1."_".$type2;
		}else{
			$table_name =  $type2."_".$type1;
		}
		if(in_array($table_name, $this->all_join_types)){
			return $table_name;
		}else{
			return false;
		}
	}
	
	
}


