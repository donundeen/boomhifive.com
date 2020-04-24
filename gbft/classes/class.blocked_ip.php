<?
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
		
		$query = "SELECT
					*
				FROM
					blocked_ip
				ORDER BY
					ip_address";
		$this->blocked_ips = $this->conn->GetArray($query);
	}
	
	
	function insert_blocked_ip($ip_address){
		$query = "INSERT IGNORE INTO
					blocked_ip
				SET
					ip_address = '".mysql_real_escape_string($ip_address, $this->conn)."'";
		$rs = $this->conn->execute($query);
	}
	
	function delete_blocked_ip($blocked_ip_id){
		$query = "DELETE FROM
					blocked_ip 
				WHERE
					blocked_ip_id = '".mysql_real_escape_string($blocked_ip_id, $this->conn)."'";
		$rs = $this->conn->execute($query);				
		
	}
	
	
	
	public static function ip_blocked($ip_address){
		$conn = gbft::static_get_conn();
		
		$query = "SELECT 
					blocked_ip_id
				FROM
					blocked_ip
				WHERE
					ip_address = '".mysql_real_escape_string($ip_address, $this->conn)."'";
		$rs = $conn->execute($query);
		if($rs && strlen($rs->fields['blocked_ip_id']) > 0){
			return true;	
		}
		return false;
		
	}
	
	
	function process_tpl($smarty){
		$smarty->assign("blocked_ips", $this->blocked_ips);
		
		return $smarty;	
		
	}
	
}


?>