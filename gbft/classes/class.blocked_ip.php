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
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$this->blocked_ips = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	
	function insert_blocked_ip($ip_address){
		$query = "INSERT IGNORE INTO blocked_ip SET ip_address = :ip_address";
		$stmt = $this->conn->prepare($query);
		$stmt->execute(['ip_address' => $ip_address]);
	}
	
	function delete_blocked_ip($blocked_ip_id){
		$query = "DELETE FROM blocked_ip WHERE blocked_ip_id = :blocked_ip_id";
		$stmt = $this->conn->prepare($query);
		$stmt->execute(['blocked_ip_id' => $blocked_ip_id]);
	}
	
	
	
	public static function ip_blocked($ip_address){
		$conn = gbft::static_get_conn();
		return false;
		$query = "SELECT blocked_ip_id FROM blocked_ip WHERE ip_address = :ip_address";
		$stmt = $conn->prepare($query);
		try {	
			$stmt->execute(['ip_address' => $ip_address]);
			return $stmt->rowCount() > 0;
		} catch (PDOException $e) {
			error_log("Error checking blocked IP: " . $e->getMessage());
			return false;
		}
	}
	
	
	function process_tpl($smarty){
		$smarty->assign("blocked_ips", $this->blocked_ips);
		
		return $smarty;	
		
	}
	
}


