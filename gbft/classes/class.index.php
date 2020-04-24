<?
include_once(dirname(__FILE__)."/adodb/adodb.inc.php");
include_once(dirname(__FILE__)."/class.gbft.php");



class Index extends gbft{
	
	
	var $user;
	
	var $new_files = array();
	
	var $new_articles = array();
	
	var $new_entities = array();
	
	var $entity_count = array();
	
	var $new_date = "2 weeks ago";
	var $new_date_string = "2 weeks ago";
	
	var $new_date_text = "2 weeks ago";
	
	var $new_date_ts = "";
	
	function populate_index(){
		
		
		$this->new_date_ts = strtotime($this->new_date_string);
		
		$this->new_date_text = date("Y-m-d", $this->new_date_ts);
		
		$this->get_conn();
		$this->get_entity_count();
		$this->get_new_articles();
		$this->get_new_entities();
		$this->get_new_files();
	}
	
	
	
	function set_user($user){
		$this->user = $user;
	}
		

	function get_entity_count(){
		foreach($this->all_types as $type){
			$query = "SELECT
						count(ID) as total_count
					FROM
						$type";
			$rs = $this->conn->execute($query);
			$this->entity_count[$type] = $rs->fields['total_count'];
			
			
			
		}
		
	}
	
	
	function get_new_articles(){
		$query = "SELECT
					*
				FROM
					articles
				WHERE
					submit_date > '".date("Y-m-d H:i:s", $this->new_date_ts)."' 
				ORDER BY
					entity_type";
		$rows = $this->conn->GetArray($query);
		foreach($rows as $key=>$row){
			$type = $row['entity_type'];
			$id = $row['entity_ID'];	
			$query = "SELECT
						name
					FROM
						$type
					WHERE
						ID = '$id'";
			$rs = $this->conn->execute($query);
			if($rs && strlen($rs->fields['name']) > 0){
				$row['entity_name'] = $rs->fields['name'];
				$this->new_articles[] = $row;
			}
			
		}
		
	}
	
	function get_new_entities(){
		foreach($this->all_types as $type){
			$query = "SELECT
						*
					FROM
						$type
					WHERE
						submit_date > '".date("Y-m-d H:i:s", $this->new_date_ts)."'
					ORDER BY
						submit_date DESC";
			$this->new_entities[$type] = $this->conn->GetArray($query);
						
			
			
		}
	}
	
	function get_new_files(){
		$this->new_date_ts = strtotime("2005-01-01");
		
		$query = "SELECT
					*
				FROM
					submitted_files
				WHERE
					submit_date > '".date("Y-m-d H:i:s", $this->new_date_ts)."' 
				ORDER BY
					entity_type";
		$rows = $this->conn->GetArray($query);
		foreach($rows as $key=>$row){
			$type = $row['entity_type'];
			$id = $row['entity_ID'];	
			$query = "SELECT
						name
					FROM
						$type
					WHERE
						ID = '$id'";
			$rs = $this->conn->execute($query);
			if($rs && strlen($rs->fields['name']) > 0){
				$row['entity_name'] = $rs->fields['name'];
				$this->new_files[] = $row;
			}
			
		}		
	}
	
	
	
	
}




?>
