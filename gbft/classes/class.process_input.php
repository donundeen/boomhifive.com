<?php
include_once(dirname(__FILE__)."/adodb/adodb.inc.php");

include_once(dirname(__FILE__)."/class.gbft.php");



/*
This class processes all the inputed data from the user, for adding/editing to table, etc..
*/
class process_input extends gbft{
	
	var $conn;
	
	var $vars;
	
	var $submitter_ip; // ip address of the submitter
	
	var $results = array(); // array of results and their values, for external access to the results of internal events.
	
	var $user = ''; 
	
	var $new_submitted_file_dir = "./admin/submitted_files";
	
	function process_input(){
		$this->submitter_ip = $_SERVER['REMOTE_ADDR'];
		
		$this->get_conn();	
//		$this->conn->debug=true;
	}
	
	function set_conn($conn){
		$this->conn = $conn;
	}
	

	
	function set_user($user){
		$this->user = $user;
	}	
	
	function go(){
		$this->set_vars();
		$this->submitter_ip = $_SERVER['REMOTE_ADDR'];
		switch ($this->vars['action']){
			case "add_join":
				$this->add_join();
				break;
			case "add_event":
				$this->add_event();
				break;
			case "add_event_from_calendar":
				$this->add_event_from_calendar();
				break;
			case "edit_entity":
				$this->edit_entity();
				break;
			case "edit_join":
				$this->edit_join();
				break;
			case "add_article":
				$this->add_article();
				break;
			case "add_file":
				$this->add_file();
				break;
			case "register_user":
				$this->register_user();
				break;
			case "subscribe_user":
				$this->subscribe_user();
				break;
			case "unsubscribe_user":
				$this->unsubscribe_user();
				break;
			case "delete_join":
				$this->delete_join();
				break;
			case "set_public_visible":
				$this->set_public_visible();
				break;
		}		
	}

	/***************************************************/
	
	
	
	function add_join(){
		$entity1_type = trim($this->vars['entity1_type']);	
		$entity2_type = trim($this->vars['entity2_type']);	
		$entity1_name = trim($this->vars['entity1_name']);
		$entity2_name = trim($this->vars['entity2_name']);
		$entity1_id   = trim($this->vars['entity1_id']);
		$entity2_id   = trim($this->vars['entity2_id']);
		$join_details = trim($this->vars['join_details']);		

		if(strlen($this->vars['detailstime_hour']) > 0 ){
			$this->vars['band_event_details'] = sprintf("%02s",$this->vars['detailstime_hour']).":".sprintf("%02s",$this->vars['detailstime_minute']);
			$join_details = $this->vars['band_event_details'];
		}
		
		if(strlen($entity1_id) == 0){
			$entity1_id = $this->get_entity_id($entity1_type, $entity1_name);
		}
		if(strlen($entity2_id) == 0){
			$entity2_id = $this->get_entity_id($entity2_type, $entity2_name);
		}

		if(!$this->join_exists($entity1_type, $entity2_type, $entity1_id, $entity2_id, $join_details)){
			$this->insert_join($entity1_type, $entity2_type, $entity1_id, $entity2_id, $join_details);
		}	
	}

	function add_event(){
		
		print_r($this->vars);
		
		$this->vars['band_event_details'] = sprintf("%02s",$this->vars['detailstime_hour']).":".sprintf("%02s",$this->vars['detailstime_minute']);
		
		$start_date = trim($this->vars['start_date']);
		$event_name = trim($this->vars['event_name']);
		if($this->vars['entity2_type'] = "venue"){
			$band_id = trim($this->vars['band_id']);
			$band_name = trim($this->vars['band_name']);
			$band_event_details = trim($this->vars['band_event_details']);
			$venue_id = trim($this->vars['venue_id']);
			$venue_name = trim($this->vars['entity2_name']);
		}else{
			$band_id = trim($this->vars['band_id']);
			$band_name = trim($this->vars['entity2_name']);
			$band_event_details = trim($this->vars['band_event_details']);
			$venue_id = trim($this->vars['venue_id']);
			$venue_name = trim($this->vars['venue_name']);
		}			
		if(strlen($band_id) == 0){
			$band_id = $this->get_entity_id("band", $band_name);
		}
		if(strlen($venue_id) == 0){
			$venue_id = $this->get_entity_id("venue", $venue_name);		
		}
		$event_id = $this->get_entity_id("event", $event_name);
		if($event_id){
			if(strlen($venue_id) > 0 and !$this->join_exists("venue", "event", $venue_id, $event_id, "")){
				$this->insert_join("venue", "event", $venue_id, $event_id, "");
			}
			if(strlen($band_id) > 0 and !$this->join_exists("band", "event", $band_id, $event_id, $band_event_details)){
				$this->insert_join("band", "event", $band_id, $event_id, $band_event_details);
			}			
		}		
	}
	
	
	function add_event_from_calendar(){
		$event_name = trim($this->vars['event_name']);
		
		if(strlen($event_name) == 0){
			$event_name = 'Unnamed Event';
		}
		
		$start_date = $this->vars['start_date'];
		$venue_name = $this->vars['venue_name'];

		$band_name1 = $this->vars['band_name1'];
		$band1_start_time_hour = $this->vars['band1_start_time_hour'];	
		$band1_start_time_minute = $this->vars['band1_start_time_minute'];	
		$band1_start_time = $band1_start_time_hour.":".$band1_start_time_minute;
		
		$band_name2 = $this->vars['band_name2'];
		$band2_start_time_hour = $this->vars['band2_start_time_hour'];	
		$band2_start_time_minute = $this->vars['band2_start_time_minute'];	
		$band2_start_time = $band2_start_time_hour.":".$band2_start_time_minute;
		
		$band_name3 = $this->vars['band_name3'];
		$band3_start_time_hour = $this->vars['band3_start_time_hour'];	
		$band3_start_time_minute = $this->vars['band3_start_time_minute'];	
		$band3_start_time = $band3_start_time_hour.":".$band3_start_time_minute;
		
		$band_name4 = $this->vars['band_name4'];
		$band4_start_time_hour = $this->vars['band4_start_time_hour'];	
		$band4_start_time_minute = $this->vars['band4_start_time_minute'];	
		$band4_start_time = $band4_start_time_hour.":".$band4_start_time_minute;
		
		$event_id = $this->get_entity_id('event', $event_name);
		
		
		if(strlen($venue_name) > 0){
			$venue_id = $this->get_entity_id('venue', $venue_name);
			$this->insert_join('event','venue', $event_id, $venue_id,'');
		}
		
		
		if(strlen($band_name1) > 0){
			$band_id = $this->get_entity_id('band', $band_name1);
			$this->insert_join('band','event', $band_id, $event_id, $band1_start_time);	
		}
		
		if(strlen($band_name2) > 0){
			$band_id = $this->get_entity_id('band', $band_name2);
			$this->insert_join('band','event', $band_id, $event_id, $band2_start_time);	
		}
		
		if(strlen($band_name3) > 0){
			$band_id = $this->get_entity_id('band', $band_name3);
			$this->insert_join('band','event', $band_id, $event_id, $band3_start_time);	
		}
		
		if(strlen($band_name4) > 0){
			$band_id = $this->get_entity_id('band', $band_name4);
			$this->insert_join('band','event', $band_id, $event_id, $band4_start_time);	
		}
		
	}
	
	
	
	function join_exists($entity1_type, $entity2_type, $entity1_id, $entity2_id, $join_details){
		$table_name = $this->get_table_name($entity1_type, $entity2_type);
		
		$query = "SELECT 
					*
				FROM
					$table_name
				WHERE
					".$entity1_type."_ID = '$entity1_id' AND
					".$entity2_type."_ID = '$entity2_id' ";
		$rs = $this->conn->Execute($query);
		if(!$rs or !is_array($rs->fields)){
			return false;
		}else{
			return true;
		}
	}
	
	
	function set_public_visible(){
		$member_id = $this->vars['id'];
		$public_visible = $this->vars['public_visible'];
		
		if(is_object($this->user) && $this->user->info['ID'] = $member_id){
		
			$query = "UPDATE
						member
					SET
						public_visible = '".mysql_real_escape_string($public_visible)."'
					WHERE
						ID = '".mysql_real_escape_string($member_id)."' ";
			$rs = $this->conn->execute($query);	
		}else{ }
	}
	
	
	function insert_join($entity1_type, $entity2_type, $entity1_id, $entity2_id, $join_details){
		$table_name = $this->get_table_name($entity1_type, $entity2_type);
		
		if($this->user && 
				(($entity1_type == 'member' and $entity1_id == $this->user->info['ID']) or 
					($entity2_type == 'member' and $entity2_id == $this->user->info['ID']))){
			$status = 'approved';
		}else{
			$status = 'new';
		}
		if($entity1_type == 'member' && (!is_object($this->user) or $entity1_id != $this->user->info['ID'])){
			// only members can edit their own information
			return false;
		}
		
		if($entity2_type == 'member' && (!is_object($this->user) or $entity2_id != $this->user->info['ID'])){
			// only members can edit their own information
			return false;
		}
		

		
		$query = "INSERT INTO 
					$table_name
				SET
					".$entity1_type."_ID = '".mysql_escape_string($entity1_id)."',
					".$entity2_type."_ID = '".mysql_escape_string($entity2_id)."',
					details = '".mysql_escape_string($join_details)."',
					status = '$status',
					submitter_ip = '".$this->submitter_ip."' ";
		$rs = $this->conn->Execute($query);
	}
	
	
	function delete_join(){
		$entity1_id = $this->vars['entity1_id'];
		$entity1_type = $this->vars['entity1_type'];
		$entity2_id = $this->vars['entity2_id'];
		$entity2_type = $this->vars['entity2_type'];
		if($this->user && 
				(($entity1_type == 'member' and $entity1_id == $this->user->info['ID']) or 
					($entity2_type == 'member' and $entity2_id == $this->user->info['ID']))){
			$table_name = $this->get_table_name($entity1_type, $entity2_type);
						
			$query = "DELETE FROM
						$table_name
					WHERE
						".mysql_real_escape_string($entity1_type)."_ID = '".mysql_real_escape_string($entity1_id)."' AND
						".mysql_real_escape_string($entity2_type)."_ID = '".mysql_real_escape_string($entity2_id)."' ";
			$rs = $this->conn->execute($query);
						
		}
		
		
	}	
	
	
	function get_entity_id($entity_type, $entity_name){
		if(strlen($entity_name) == 0){
			return false;
		}
		$method_name = "get_entity_".$entity_type."_additional_where";
		if(method_exists($this, $method_name)){
			$additional_where = $this->$method_name($entity_type, $entity_name);
			if(!$additional_where){
				return false;
			}
		}else{
			$additional_where = "";
		}
		$query = "SELECT
					ID
				FROM
					$entity_type
				WHERE
					name LIKE '".mysql_escape_string($entity_name)."'
					$additional_where
				ORDER BY
					status
				LIMIT
					1";
		$rs = $this->conn->Execute($query);
		if($rs && strlen($rs->fields['ID']) > 0){
			return $rs->fields['ID'];
		}else{
			$id = $this->add_entity($entity_type, $entity_name);
			return $id;
		}
	}
	
	function get_entity_event_additional_where($entity_type, $entity_name){
		$start_date_ts = strtotime($this->vars['start_date']);
		if($start_date_ts <= 0){
			$this->ERROR_MSGS[] = "Invalid Start Date ".$this->vars['start_date'];
			return false;
		}
		$where = " AND start_date = '".date("Y-m-d", $start_date_ts)."'";
		return $where;
	}
	
	
	
	function edit_entity(){
		$entity_type = trim($this->vars['entity_type']);	
		$entity_name = trim($this->vars['entity_name']);
		$entity_id   = trim($this->vars['entity_id']);

		$method_name = "add_entity_".$entity_type."_clause";
		if(method_exists($this, $method_name)){
			$add_clause = $this->$method_name($entity_type, $entity_name, $status, $entity_id);
		}else{
			$add_clause = "";
		}
		
		if($entity_type == 'member' && (!is_object($this->user) or $entity_id != $this->user->info['ID'])){
			// only members can edit their own information
			return false;
		}
		
		$query = "INSERT INTO
					$entity_type
				SET
				 	name = '".mysql_escape_string($entity_name)."',
					status = 'change',
					orig_id = '".mysql_escape_string($entity_id)."',
					submitter_ip = '".$this->submitter_ip."'
					$add_clause";
		$rs = $this->conn->Execute($query);
		return $this->conn->Insert_ID();		
	}

	
	
	function edit_join(){
		
		$entity1_type = trim($this->vars['entity1_type']);	
		$entity2_type = trim($this->vars['entity2_type']);	

		
		$table_name = $this->get_table_name($entity1_type, $entity2_type);
		
		$join_details = $this->vars['join_details'];
		$orig_id = $this->vars['join_id'];
		$entity1_id = $this->vars[$entity1_type.'_ID'];
		$entity2_id = $this->vars[$entity2_type.'_ID'];
		
		
		$query = "INSERT INTO 
					$table_name
				SET
					".$entity1_type."_ID = '".mysql_escape_string($entity1_id)."',
					".$entity2_type."_ID = '".mysql_escape_string($entity2_id)."',
					details = '".mysql_escape_string($join_details)."',
					status = 'change',
					orig_id  = '".mysql_escape_string($orig_id)."',
					submitter_ip = '".$this->submitter_ip."' ";
		$rs = $this->conn->execute($query);
		
	}
	
	function add_entity($entity_type, $entity_name){
		$method_name = "add_entity_".$entity_type."_clause";
		if(method_exists($this, $method_name)){
			$add_clause = $this->$method_name($entity_type, $entity_name, $status, $entity_id);
		}else{
			$add_clause = "";
		}

		
		
		$query = "INSERT INTO
					$entity_type
				SET
				 	name = '".mysql_escape_string($entity_name)."',
					status = 'new'
					$add_clause,
					submitter_ip = '".$this->submitter_ip."' ";
		if(count($this->ERROR_MSGS) == 0 ){
			$rs = $this->conn->Execute($query);
			return $this->conn->Insert_ID();
			
		}else{
			return false;
		}
	}	

	
	function add_entity_event_clause($entity_type, $entity_name, $status, $entity_id){
		$start_date_ts = strtotime($this->vars['start_date']); 
		$event_type = $this->vars['event_type'];
		if($start_date_ts <= 0){
			$this->ERROR_MSGS[] = "Invalid Date Format for date '".$this->vars['start_date']."'";
			return false;
		}
		$add_clause = ",start_date = '".date("Y-m-d", $start_date_ts)."',
						start_time = '".date("H:i:s", $start_date_ts)."',
						event_type = '".mysql_real_escape_string($event_type)."'";
		return $add_clause;
	}
	
	function add_entity_member_clause($entity_type, $entity_name){
		$email = $this->vars['email_address'];
		$password = $this->vars['password'];
		$clause = ", email_address = '".mysql_escape_string($email)."',
					pass = '".mysql_escape_string($password)."' ";
		return $clause;	
		
	}
	
	function add_entity_venue_clause($entity_type, $entity_name, $status, $entity_id){
		$address = $this->vars['address'];
		$city = $this->vars['city'];
		$state = $this->vars['state'];
		
		
		$clause = ",address =  '".mysql_escape_string($address)."',
					city = '".mysql_escape_string($city)."',
					state = '".mysql_escape_string($state)."'";
		return $clause;
	}	
	
	
	function register_user(){
		global $ERROR_MSGS;
		global $SESSION;
		$name = $this->vars['name'];
		$email_address = $this->vars['email_address'];
		$pass = $this->vars['password'];
		$pass_confirm = $this->vars['password_confirm'];	
		if ($pass != $pass_confirm){
			$ERROR_MSGS[] = "'Password' and 'Confirm Password' must match";		
			return false;
		}
		if(entity::name_exists($this->conn, "member", $name)){
			$ERROR_MSGS[] = "That name, '$name', is already taken";			
			return false;
		}
		$this->add_entity("member", $name);
		
		$SESSION->vars['user_name'] = $name;
		$SESSION->vars['user_pass'] = $pass;
		$SESSION->login_user();
		
		$this->results['user_registered'] = true;
	}
	
	
	
	function add_article(){
		
		$entity_type  = $this->vars['entity_type'];
		$entity_id = $this->vars['entity_id'];
		$text = $this->vars['article_text'];
		$submitter_name = $this->vars['submitter_name'];
		$submitter_email = $this->vars['submitter_email'];
		
		if(strlen(trim($entity_id)) > 0 && strlen(trim($entity_type)) > 0 && strlen(trim($text)) > 0 && $entity_id != '0'){
		
			$query = "INSERT INTO 
						articles
					SET
						entity_type = '".mysql_escape_string($entity_type)."',
						entity_ID = '".mysql_escape_string($entity_id)."',
						text = '".mysql_escape_string($text)."',
						submitter_name = '".mysql_escape_string($submitter_name)."',
						submitter_email = '".mysql_escape_string($submitter_email)."',
						status = 'new',
						submitter_ip = '".$this->submitter_ip."' ";
			$rs = $this->conn->Execute($query);
			return $this->conn->Insert_ID();
		}else{
			return false;
		}		
		
	}
	
	function subscribe_user(){
		global $SESSION;
		
		
		$user_id = $this->vars['user_id'];
		$entity_type = $this->vars['type'];
		$entity_id = $this->vars['id'];
		$subscription_level = $this->vars['subscription_level'];
		
		
		if(!is_object($this->user) or $this->user->info['ID'] != $user_id){
			return false;
		}
		
		if(strlen($user_id) > 0 &&
			strlen($entity_type) > 0 &&
			strlen($entity_id) > 0 &&
			strlen($subscription_level) > 0){
			$table_name = $this->get_table_name("member", $entity_type);
			
			$query = "DELETE FROM
						$table_name
					WHERE
						member_ID = '$user_id' AND
						".$entity_type."_ID = '$entity_id'";
			$rs = $this->conn->execute($query);
						
			
			$query = "REPLACE INTO
						$table_name
					SET
						member_ID = '$user_id',
						".$entity_type."_ID = '$entity_id',
						subscription_level = '$subscription_level',
						status = 'approved'";
			$rs = $this->conn->execute($query);
			$SESSION = new session();
		}
	}

	
	
	function unsubscribe_user(){
		global $SESSION;
		$user_id = $this->vars['user_id'];
		$entity_type = $this->vars['type'];
		$entity_id = $this->vars['id'];

		if(!is_object($this->user) or $this->user->info['ID'] != $user_id){
			return false;
		}
		
		
		if(strlen($user_id) > 0 &&
			strlen($entity_type) > 0 &&
			strlen($entity_id) > 0){
			$table_name = $this->get_table_name("member", $entity_type);
			
			
			$query = "DELETE FROM
						$table_name
					WHERE
						member_ID = '$user_id' AND
						".$entity_type."_ID = '$entity_id'";
			$rs = $this->conn->execute($query);
			
			$SESSION = new session();
		}
	}

	
	
	
	
	function add_file(){
		$entity_type = $this->vars['type'];
		$entity_id = $this->vars['id'];
		$submitter_name = $this->vars['submitted_files']['submitter_name'];
		$submitter_email = $this->vars['submitted_files']['submitter_email'];
		
		$dir = $this->new_submitted_file_dir."/".$entity_type;
		if(!file_exists($dir)){
			mkdir($dir);
		}
		$dir = $this->new_submitted_file_dir."/".$entity_type."/".$entity_id;
		if(!file_exists($dir)){
			mkdir($dir);
		}
		$uploadfile = $this->new_submitted_file_dir."/".$entity_type."/".$entity_id."/".basename($_FILES['submitted_files']['name']['userfile']);
		
		
		$result = move_uploaded_file($_FILES['submitted_files']['tmp_name']['userfile'], $uploadfile);
		
		if(!$result){
			$this->ERROR_MSGS[] = "couldn't move ".$_FILES['submitted_files']['tmp_name']['userfile']." to ". $uploadfile;
			return false;
		}		
		$this->conn->debug = true;
		$query = "INSERT INTO
					submitted_files
				SET
					filename		 = '".mysql_real_escape_string(basename($_FILES['submitted_files']['name']['userfile']))."',
					description		 = '".mysql_real_escape_string($this->vars['submitted_files']['description'])."',
					submitter_name	 = '".mysql_real_escape_string($submitter_name)."',
					submitter_email	 = '".mysql_real_escape_string($submitter_email)."',
					entity_type		 = '".mysql_real_escape_string($entity_type)."',
					entity_ID		 = '".mysql_real_escape_string($entity_id)."',
					status			 = 'new'";
		$rs = $this->conn->execute($query);
		
		$this->conn->debug = false;
		
	}
	
	
	
}
