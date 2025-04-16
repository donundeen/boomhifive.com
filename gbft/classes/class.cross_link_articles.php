<?php
include_once(dirname(__FILE__)."/adodb/adodb.inc.php");
include_once(dirname(__FILE__)."/class.gbft.php");



class cross_link_articles extends gbft{

	var $conn = "";

	var $all_types = array('band','musician','venue');
	
	function cross_link_articles(){
		$this->get_conn();
	}
	
	function process(){
		$this->delete_brackets();
		
		foreach($this->all_types as $type){
			$this->do_articles_of_type($type);	
		}
	}
	
	
	function delete_brackets(){
		$query = "update articles set text = REPLACE(text, ']]', ''), submit_date = submit_date";
		$this->conn->Execute($query);
		$query = "update articles set text = REPLACE(text, '[[', ''), submit_date = submit_date";
		$this->conn->Execute($query);
	}
	
	
	function do_articles_of_type($type){
		$query = "select * from $type order by length(name) desc";	
		
		$rows = $this->conn->GetArray($query);
		
		foreach($rows as $row){
			$name = $row['name'];
		    //echo __LINE__." name $name<BR>\n";
		    $name = preg_replace("/'/","\'",$name);
		    if(strlen($name) >0){
		        $query = "update
		                    articles
		                  set
		                    text = REPLACE(text, '".$this->conn->qstr($name)."', '[[".$this->conn->qstr($name)."]]'),
		                    submit_date = submit_date
		                  where
		                    text like ".$this->conn->qstr('% '.$name.' %')." or
		                    text like ".$this->conn->qstr('% '.$name."\'s %")." or
		                    text like ".$this->conn->qstr('% '.$name.',%')." or
		                    text like ".$this->conn->qstr('% '.$name."\'s,%")." or
		                    text like ".$this->conn->qstr('% '.$name.'.%')." or
		                    text like ".$this->conn->qstr('% '.$name."\'s.%'");
		        $this->conn->Execute($query);
		        echo "<pre>".__LINE__." ".print_r($query, true)."</pre>";
		    }
		}
		
	}
	
}
