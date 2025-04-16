<?php
include_once(dirname(__FILE__)."/class.gbft.php");

class blocked_ip extends gbft {

	
	var $blocked_ips = array();
	
	
	
	function process(){
		$this->get_conn();
		$this->set_vars();
		
		$action = $this->vars['action'];
		
		if($action == 'insert_blocked_ip'){
			$this->insert_blocked_ip($this->vars['blocked_ip']['ip_address']);
		}
		if($action == 'delete_blocked_ip'){
			$this->delete_blocked_ip($this->vars['blocked_ip_id']);
		}
		$this->get_blocked_ips();	
		
	}
	
	
	function get_blocked_ips(){

		$query = "SELECT * FROM blocked_ip ORDER BY ip_address";
		$result = $this->conn->Execute($query);
		$this->blocked_ips = $result->GetArray();
	}
	
	
	function insert_blocked_ip($ip_address){

		$query = "INSERT IGNORE INTO blocked_ip SET ip_address = ".$this->conn->qstr($ip_address)."";
		$this->conn->Execute($query);
	}
	
	function delete_blocked_ip($blocked_ip_id){

		$query = "DELETE FROM blocked_ip WHERE blocked_ip_id = ".$this->conn->qstr($blocked_ip_id);
		$this->conn->Execute($query);
	}
	
	
	
	public static function ip_blocked($ip_address){

		$conn = gbft::static_get_conn();
		$query = "SELECT blocked_ip_id FROM blocked_ip WHERE ip_address = ".$conn->qstr($ip_address);
		try {    
			$rs = $conn->Execute($query);
			if($rs && !$rs->EOF) {
				return true;
			}
			return false;
		} catch (Exception $e) {
			error_log("Error checking blocked IP: " . $e->getMessage());
			return false;
		}
	}
	
	
	function process_tpl($smarty){
		$smarty->assign("blocked_ips", $this->blocked_ips);
		
		return $smarty;	
		
	}
	
}


