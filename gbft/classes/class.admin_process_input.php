<?
include_once(dirname(__FILE__)."/adodb/adodb.inc.php");

include_once(dirname(__FILE__)."/class.gbft.php");



/*
This class processes all the inputed data from the user, for adding/editing to table, etc..
*/
class admin_process_input extends gbft{
	
	var $conn;
	
	var $vars;
	
	var $submitter_ip; // ip address of the submitter
	
	var $results = array(); // array of results and their values, for external access to the results of internal events.
	
	var $new_submitted_file_dir = "./submitted_files";
	
	var $approved_submitted_file_dir = "../submitted_files";
		
	function admin_process_input(){
		$this->submitter_ip = $_SERVER['REMOTE_ADDR'];
		
		$this->get_conn();	
//		$this->conn->debug=true;
	}
	
	function set_conn($conn){
		$this->conn = $conn;
	}
	

	function go(){
		$confirm_all = $this->vars['confirm_all'];
		if(is_array($this->vars['new_joins'])){
			foreach($this->vars['new_joins'] as $table_name=>$new_joins){
				foreach($new_joins as $new_join){
					if($new_join['action'] == 'delete'){
						$this->delete_new_join($new_join);
					}elseif($new_join['action'] == 'confirm' or ($confirm_all && $new_join['action'] != 'bypass')){
						$this->validate_new_join($new_join);
					}
				}
			}
		}
		if(is_array($this->vars['new_entities'])){
			foreach($this->vars['new_entities'] as $type=>$new_entities){
				foreach($new_entities as $new_entity){
					if($new_entity['action'] == 'delete'){
						$this->delete_new_entity($new_entity);
					}elseif($new_entity['action'] == 'confirm' or ($confirm_all && $new_entity['action'] != 'bypass')){
						$this->validate_new_entity($new_entity);
					}
				}
			}
		}
		if(is_array($this->vars['change_entities'])){
			foreach($this->vars['change_entities'] as $type=>$entities){
				foreach($entities as $entity){
					if($entity['action'] == 'delete'){
						$this->delete_change_entity($entity);
					}elseif($entity['action'] == 'confirm' or ($confirm_all && $entity['action'] != 'bypass')){
						$this->validate_change_entity($entity);
						$this->delete_change_entity($entity);
					}
				}
			}
		}
		if(is_array($this->vars['change_joins'])){
			foreach($this->vars['change_joins'] as $table_name=>$joins){
				foreach($joins as $join){
					if($join['action'] == 'delete'){
						$this->delete_change_join($join);
					}elseif($join['action'] == 'confirm' or ($confirm_all && $join['action'] != 'bypass')){
						$this->validate_change_join($join);
						$this->delete_change_join($join);
					}
				}
			}
		}
		if(is_array($this->vars['new_articles'])){
			foreach($this->vars['new_articles'] as $article){
				if($article['action'] == 'delete'){
					$this->delete_new_article($article);
				}elseif($article['action'] == 'confirm'  or ($confirm_all && $article['action'] != 'bypass')){
					$this->validate_new_article($article);
				}
			}
		}
		if(is_array($this->vars['new_files'])){
			foreach($this->vars['new_files'] as $file){
				if($file['action'] == 'delete'){
					$this->delete_new_file($file);
				}elseif($file['action'] == 'confirm' or ($confirm_all && $file['action'] != 'bypass')){
					$this->validate_new_file($file);
				}
			}
		}
	}


	function validate_new_join($join){
		$join_id = $join['ID'];
		$table_name = $join['table_name'];
		
		$query = "UPDATE
					".mysql_real_escape_string($table_name)."
				SET
					status = 'approved'
				WHERE
					ID = '".mysql_real_escape_string($join_id)."'";
		$result = $this->conn->execute($query);
		return $result;
	}
	
	
	
	
	function validate_new_entity($entity){
		$entity_type = $entity['type'];
		$entity_id = $entity['ID'];
		
		$query = "UPDATE
					".mysql_real_escape_string($entity_type)."
				SET
					status = 'approved'
				WHERE
					ID = '".mysql_real_escape_string($entity_id)."'";
		$result = $this->conn->execute($query);
		return $result;
		
	}
	
	
	
	
	
	function validate_change_join($join){
		$join_id = $join['ID'];
		$table_name = $join['table_name'];
		
		$query = "SELECT
					* 
				FROM
					".mysql_real_escape_string($table_name)."
				WHERE
					ID= '".mysql_real_escape_string($join_id)."'";
		$rs = $this->conn->execute($query);
		if(!$rs or strlen($rs->fields['ID']) == 0){
			return false;
		}
		
		$set_array = array();
		foreach($rs->fields as $key=>$value){
			if($key != 'ID' and $key != 'orig_id' and $key != 'status' ){
				$set_array[] = "$key = '".mysql_real_escape_string($value)."'";	
			}
		}
		$set_string = implode(',', $set_array);
		
		$query = "UPDATE
					".mysql_real_escape_string($table_name)."
				SET
					$set_string,
					status = 'approved'
				WHERE
					ID = '".mysql_real_escape_string($rs->fields['orig_id'])."' ";
		$result = $this->conn->execute($query);
		
		 
	}
	
	function validate_change_entity($entity){
		$entity_type = $entity['type'];
		$entity_id = $entity['ID'];
		$query = "SELECT
					* 
				FROM
					".mysql_real_escape_string($entity_type)."
				WHERE
					ID= '".mysql_real_escape_string($entity_id)."'";
		$rs = $this->conn->execute($query);
		if(!$rs or strlen($rs->fields['ID']) == 0){
			return false;
		}
		
		$set_array = array();
		foreach($rs->fields as $key=>$value){
			if($key != 'ID' and $key != 'orig_id' and $key != 'status' ){
				$set_array[] = "$key = '".mysql_real_escape_string($value)."'";	
			}
		}
		$set_string = implode(',', $set_array);
		
		$query = "UPDATE
					".mysql_real_escape_string($entity_type)."
				SET
					$set_string,
					status = 'approved'
				WHERE
					ID = '".mysql_real_escape_string($rs->fields['orig_id'])."' ";
		$result = $this->conn->execute($query);
		if(!$result){
			return false;
		}
				
			
	}
	
	
	function validate_new_file($file){
		$file_id = $file['ID'];
		$query = "UPDATE
					submitted_files
				SET
					status = 'approved'
				WHERE
					ID = '".mysql_real_escape_string($file_id)."' ";
		$rs = $this->conn->execute($query);
		
		$query = "SELECT
					*
				FROM
					submitted_files
				WHERE
					ID = '".mysql_real_escape_string($file_id)."' ";
		$rs = $this->conn->execute($query);
		$entity_type = $rs->fields['entity_type'];
		$entity_id = $rs->fields['entity_ID'];
		$filename = $rs->fields['filename'];
		
		
		if(!file_exists($this->approved_submitted_file_dir."/".$entity_type)){
			mkdir($this->approved_submitted_file_dir."/".$entity_type);
		}
		if(!file_exists($this->approved_submitted_file_dir."/".$entity_type."/".$entity_id)){
			mkdir($this->approved_submitted_file_dir."/".$entity_type."/".$entity_id);
		}
				
		$file_from = $this->new_submitted_file_dir."/".$entity_type."/".$entity_id."/".$filename;
		$file_to = $this->approved_submitted_file_dir."/".$entity_type."/".$entity_id."/".$filename;
		
		
		rename($file_from, $file_to);
		
	 		
	}
	
	function validate_new_article($article){
		$article_id = $article['ID'];
		$article_text = stripslashes($article['text']);
		
		$query = "UPDATE
					articles
				SET
					text = '".mysql_real_escape_string($article_text)."',
					status = 'approved'
				WHERE
					ID = '".mysql_real_escape_string($article_id)."' ";
		$rs = $this->conn->execute($query);
		
		
	}

	
	
	

	function delete_new_join($join){
		$join_id = $join['ID'];
		$table_name = $join['table_name'];
		
		$query = "DELETE FROM
					".mysql_real_escape_string($table_name)."
				WHERE 
					ID = '".mysql_real_escape_string($join_id)."'";
		$rs = $this->conn->execute($query);
	}
	
	function delete_new_entity($entity){
		$entity_type = $entity['type'];
		$entity_id = $entity['ID'];
		$query = "DELETE FROM
					".mysql_real_escape_string($entity_type)."
				WHERE 
					ID = '".mysql_real_escape_string($entity_id)."'";
		$rs = $this->conn->execute($query);
		
		
	}
	
	
	function delete_new_file($file){
		$file_id = $file['ID'];		
		$query = "SELECT
					*
				FROM
					submitted_files
				WHERE
					ID = '".mysql_real_escape_string($file_id)."' ";
		$rs = $this->conn->execute($query);
		$entity_type = $rs->fields['entity_type'];
		$entity_id = $rs->fields['entity_ID'];
		$filename = $rs->fields['filename'];

		$file_from = $this->new_submitted_file_dir."/".$entity_type."/".$entity_id."/".$filename;

		unlink($file_from);
		
		$query = "DELETE FROM
					submitted_files
				WHERE
					ID = '".mysql_real_escape_string($file_id)."'";
		$rs = $this->conn->execute($query);
		
		
	}
	
	
	
	
	function delete_change_join($join){
		$join_id = $join['ID'];
		$table_name = $join['table_name'];
		
		$query = "DELETE FROM
					".mysql_real_escape_string($table_name)."
				WHERE 
					ID = '".mysql_real_escape_string($join_id)."'";
		$rs = $this->conn->execute($query);
		
	}
	
	function delete_change_entity($entity){
		$entity_type = $entity['type'];
		$entity_id = $entity['ID'];
		$query = "DELETE FROM
					".mysql_real_escape_string($entity_type)."
				WHERE 
					ID = '".mysql_real_escape_string($entity_id)."'";
		$rs = $this->conn->execute($query);
		
	}
	
	

	
	function delete_new_article($article){
		$article_id = $article['ID'];
		
		$query = "DELETE FROM
					articles
				WHERE
					ID = '".mysql_real_escape_string($article_id)."'";
		$rs= $this->conn->execute($query);
		
	}
	
	
	
	
}

?>