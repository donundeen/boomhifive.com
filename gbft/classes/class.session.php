<?php


include_once(dirname(__FILE__)."/class.user.php");

class session extends gbft{
	
	
	var $session_vars = array("user_name","user_pass","user_events_only");
	
	var $vars;
	
	var $user = false;
	
	var $ERROR_MSGS = array();
	
	function __construct(){
		
		
		$this->get_conn();

		$this->conn->debug = true;
		session_start();
		foreach($this->session_vars as $varname){
			if(isset($_SESSION[$varname])){
				$this->vars[$varname] = $_SESSION[$varname];	
			}else{
				$this->vars[$varname] = "";
			}
		}
		if(isset($_REQUEST['user_events_only']) and $_REQUEST['user_events_only'] == 'true'){
			$this->vars['user_events_only'] = $_REQUEST['user_events_only'];
		}
		if(isset($_REQUEST['user_events_only']) and $_REQUEST['user_events_only'] == 'false'){
			unset($this->vars['user_events_only']);		
		}
		if(isset($_GET['action']) and $_GET['action'] == "logout_user" and 
			isset($_POST['action']) and $_POST['action'] != 'login_user'){
			$this->logout_user();
		}else{
			$this->login_user();
		}		
	}
	
	function login_user(){
		
		global $ERROR_MSGS;
		$user_name = "";
		$user_pass = "";
		if(isset($_POST['user_name'])){
			$user_name = $_POST['user_name'];
		}
		if(isset($_POST['user_pass'])){
			$user_pass = $_POST['user_pass'];
		}
		
		if(strlen($user_name) > 0){
			$user = user::get_valid_user($this->conn, $user_name, $user_pass);
			if(!$user){
				$ERROR_MSGS[] = "Invalid Username/Password";
			}else{
			}
		}else{
			$user_name = $this->vars['user_name'];
			$user_pass = $this->vars['user_pass'];
			$user = user::get_valid_user($this->conn, $user_name, $user_pass);
		}
		
		if($user){
			$this->user = $user;
			$this->user->populate_entity();
			$this->vars['user_name'] = $user_name;
			$this->vars['user_pass'] = $user_pass;
			$this->write_session();
		}
			 
		
	}

	
	function get_user(){
		return $this->user;
	}
	
	function logout_user(){
		unset($this->user);
		unset($_SESSION['user_name']);
		unset($_SESSION['user_pass']);
		unset($_SESSION['user_events_only']);
		unset($this->vars['user_name']);
		unset($this->vars['user_pass']);
		unset($this->vars['user_events_only']);
	}
	
	function write_session(){
		foreach($_SESSION as $key=>$val){
			unset($_SESSION[$val]);
		}
		foreach($this->session_vars as $varname){
			$_SESSION[$varname] = $this->vars[$varname];	
		}
		session_write_close();
	}
	
}

