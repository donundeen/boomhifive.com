<?php
include_once(dirname(__FILE__)."/adodb/adodb.inc.php");
include_once(dirname(__FILE__)."/class.gbft.php");



class admin_page extends gbft{
	
	
	var $new_entities 	 = array();
	var $new_joins 		 = array();
	var $change_entities = array();
	var $change_joins  	 = array();
	
	var $new_articles = array();
	var $new_files 	  = array();
	
	var $new_members  = array();
	
	var $new_suscriptions = array();
	

	function populate(){
		$this->get_conn();
//		$this->conn->debug = true;		
		$this->get_new_entities();
		$this->get_new_joins();
		$this->get_change_entities();
		$this->get_change_joins();	
		$this->get_new_articles();
		$this->get_new_files();
	}
	
	
	
	function get_new_entities(){
		foreach($this->all_types as $type){
			$query = "SELECT 
						*
					FROM
						$type
					WHERE
						status = 'new'";
			$rs =  $this->conn->GetArray($query);
			if(count($rs) > 0){
				$this->new_entities[$type] = $rs;
			}
							
			
		}	
	}
	
	function get_new_joins(){
		foreach($this->all_join_types as $join_type){
			$split = explode("_", $join_type);
			$entity_1_type = $split[0];
			$entity_2_type = $split[1];
			$query = "SELECT
						j.ID,
						'".mysql_real_escape_string($entity_1_type)."' as entity_1_type,
						'".mysql_real_escape_string($entity_2_type)."' as entity_2_type,
						e1.name as entity_1_name,
						e1.ID as entity_1_id,
						e2.name as entity_2_name,
						e2.ID as entity_2_id,
						j.details as details
					FROM
						$join_type j
						JOIN
							$entity_1_type e1
						ON
							j.".mysql_real_escape_string($entity_1_type)."_ID = e1.ID
						JOIN
							$entity_2_type e2
						ON
							j.".mysql_real_escape_string($entity_2_type)."_ID = e2.ID
					WHERE
						j.status='new'";
//			$this->conn->debug = true;
			$rs =  $this->conn->GetArray($query);
			
			if(is_array($rs) && count($rs) > 0){
				$this->new_joins[$join_type] = $rs;
			}
		}	
	}
	
	function get_change_entities(){
		foreach($this->all_types as $type){
			$query = "SELECT 
						*
					FROM
						$type
					WHERE
						status = 'change'";
			$rs =  $this->conn->GetArray($query);
			if(is_array($rs) && count($rs) > 0){
				foreach($rs as $id=>$fields){
					$rs[$id]['info'] = $fields;
					$query = "SELECT
								*
							FROM
								$type
							WHERE
								ID = '".mysql_real_escape_string($fields['orig_id'])."' ";
					$result = $this->conn->execute($query);
					if($result and strlen($result->fields['ID']) > 0){
						$rs[$id]['orig_row'] = $result->fields;
					}
				}
				$this->change_entities[$type] = $rs;
			}
		}			
	}
	
	function get_change_joins(){
		foreach($this->all_join_types as $join_type){
			$split = explode("_", $join_type);
			$entity_1_type = $split[0];
			$entity_2_type = $split[1];
			$query = "SELECT
						j.ID,
						'".mysql_real_escape_string($entity_1_type)."' as entity_1_type,
						e1.name as entity_1_name,
						e1.ID as entity_1_id,
						'".mysql_real_escape_string($entity_2_type)."' as entity_2_type,
						e2.name as entity_2_name,
						e2.ID as entity_2_id,
						j.details as details,
						j.orig_id
					FROM
						$join_type j
						JOIN
							$entity_1_type e1
						ON
							j.".mysql_real_escape_string($entity_1_type)."_ID = e1.ID
						JOIN
							$entity_2_type e2
						ON
							j.".mysql_real_escape_string($entity_2_type)."_ID = e2.ID
					WHERE
						j.status='change'";
			$rs =  $this->conn->GetArray($query);
			if(is_array($rs) && count($rs) > 0){
				foreach($rs as $id=>$fields){
					$rs[$id]['info'] = $fields;
					$query = "SELECT
									j.ID,
									'".mysql_real_escape_string($entity_1_type)."' as entity_1_type,
									e1.name as entity_1_name,
									e1.ID as entity_1_id,
									'".mysql_real_escape_string($entity_2_type)."' as entity_2_type,
									e2.name as entity_2_name,
									e2.ID as entity_2_id,
									j.details as details,
									j.orig_id
								FROM
									$join_type j
									JOIN
										$entity_1_type e1
									ON
										j.".mysql_real_escape_string($entity_1_type)."_ID = e1.ID
									JOIN
										$entity_2_type e2
									ON
										j.".mysql_real_escape_string($entity_2_type)."_ID = e2.ID
								WHERE
									j.ID = '".mysql_real_escape_string($fields['orig_id'])."'";
					$result = $this->conn->execute($query);
					if($result and strlen($result->fields['ID']) > 0){
						$rs[$id]['orig_row'] = $result->fields;
					}
				}
				$this->change_joins[$join_type] = $rs;
			}
		}			
	}
	
	function get_new_articles(){
		$query = "SELECT
					*
				FROM
					articles
				WHERE
					status = 'new'";
		$rs = $this->conn->GetArray($query);
		if(is_array($rs)){
			foreach($rs as $id=>$fields){
				$entity_id = $fields['entity_ID'];
				$type = $fields['entity_type'];
				$query = "SELECT
							*
						FROM
							$type
						WHERE
							ID = '".mysql_real_escape_string($entity_id)."' ";
				$result = $this->conn->execute($query);
				if($result && strlen($result->fields['ID']) > 0){
					$rs[$id]['entity_info'] = $result->fields;
				}
			}
		}
		$this->new_articles = $rs;
//		echo "<pre>".__LINE__." ".print_r($this->new_articles, true)."</pre>";
	}
	
	function get_new_files(){
		$query = "SELECT
					*
				FROM
					submitted_files
				WHERE
					status = 'new'";
		$rs = $this->conn->GetArray($query);
		if(is_array($rs)){
			foreach($rs as $id=>$fields){
				$entity_id = $fields['entity_ID'];
				$type = $fields['entity_type'];
				$query = "SELECT
							*
						FROM
							$type
						WHERE
							ID = '".mysql_real_escape_string($entity_id)."' ";
				$result = $this->conn->execute($query);
				if($result && strlen($result->fields['ID']) > 0){
					$rs[$id]['entity_info'] = $result->fields;
				}
			}
		}
		$this->new_files = $rs;
//		echo "<pre>".__LINE__." ".print_r($this->new_articles, true)."</pre>";		
	}
	
	
	function process_tpl($smarty){

		$smarty->assign("new_entities", $this->new_entities);
		$smarty->assign("new_joins", $this->new_joins);
		$smarty->assign("change_entities", $this->change_entities);
		$smarty->assign("change_joins", $this->change_joins);
		$smarty->assign("new_articles", $this->new_articles);
		$smarty->assign("new_files", $this->new_files);
		
		$smarty->assign("new_members", $this->new_members);
		$smarty->assign("new_subscriptions", $this->new_suscriptions);
		
		return $smarty;
	}
	
	
	
}


