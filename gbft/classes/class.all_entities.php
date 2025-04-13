<?php
include_once(dirname(__FILE__)."/adodb/adodb.inc.php");
include_once(dirname(__FILE__)."/class.gbft.php");



class all_entities extends gbft{

	var $conn = "";
	var $type = "";
	
	var $entities = array(); // array of all entites of given type
	
	
	function __construct($type = ""){
		$this->get_conn();
		
		$this->set_type($type);

	//	$this->populate_entity();
	}
	
	
	function set_type($type){
		$this->type = $type;
	}
	
	function populate(){
		
		$this->get_all_entities();
		
	}
	
	
	function get_all_entities(){
		
		if($this->type == 'event'){
			$orderby = 'start_date';
		}else{
			$orderby = 'name';
		}
		
		if($this->type != 'member'){
			$query = "SELECT
						*
					FROM
						`".$this->type."`
					ORDER BY
						$orderby";
			$this->entities = $this->conn->getArray($query);
		}	
	}
	
	
	
}

