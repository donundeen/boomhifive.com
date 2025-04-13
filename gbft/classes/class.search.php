<?php
include_once(dirname(__FILE__)."/adodb/adodb.inc.php");
include_once(dirname(__FILE__)."/class.gbft.php");



class Search extends gbft{

	var $search_string = '';

	var $search_results = array();
	
	var $article_search_results = array();
	
	var $search_table_columns = array('band'=>array('name'),
									   'musician'=>array('name'),
									   'venue'=>array('name','address','city','state'),
									   'event'=>array('name','start_date','start_time'));
	
	function set_search_string($string){
		$this->search_string = trim($string);
	}
	
	function Search(){
		
	}
	
	function populate(){
		$this->get_conn();
		$this->set_vars();	
		$this->set_search_string($this->vars['search_string']);	

		if(strlen($this->search_string) > 0){
			$this->search_entities();
		
			$this->search_articles();
		}
	}

	function search_articles(){
		$where = $this->get_where_clause('articles', array('text'));
		foreach($this->all_types as $page_name){
			$query = "SELECT
						e.name as entity_name,
						a.*
					FROM
						articles a
						JOIN
							".mysql_real_escape_string($page_name, $this->conn)." e
						ON
							a.entity_id = e.ID
					WHERE
						a.entity_type = '".mysql_real_escape_string($page_name, $this->conn)."' AND
						$where
					ORDER BY
						e.name";
			$this->article_search_results[$page_name] = $this->conn->GetArray($query);
		}
	}
	
	function search_entities(){
		foreach($this->search_table_columns as $table=>$columns){
			$where = $this->get_where_clause($table, $columns);
			$query = "SELECT 
						*
					FROM
						$table
					WHERE
						$where
					ORDER BY
						name";			
			$this->search_results[$table] = $this->conn->GetArray($query);	
			
		}	
		
	}
	
	
	
	function get_where_clause($table_name, $search_columns){

		$search = $this->search_string;
		$search = stripslashes($search);
		$oldsearch = $search;



		// get smarter with the searching:
		if(preg_match_all("/\"([^\"]+)\"/",$search, $matches)){
			$quoted = $matches[1];
		}
		$search=preg_replace("/\"[^\"]*\"/","",$search);
		if($search != ""){
			$search_array = preg_split("/\s+/",trim($search));
			if(is_array($quoted)){
				$search_array = array_merge($quoted,  $search_array);
			}elseif(strlen($quoted) > 0){
				array_push($search_array, $quoted);				
			}
			$search = $search_array;
		}else{
			if(is_array($quoted)){
				$search = $quoted;
			}
		}
		if(!$logical){
			$logical = "AND";
		}

		$like_array = array();
		foreach($search as $key=>$val){
			
			if($val != ""){
				$value_array = array();
				foreach($search_columns as $column_name){
					$value_array[] = "$column_name LIKE '%".addslashes($val)."%'";
				}
				$like_array[] = "(".implode(" or ",$value_array).")";
			}
		}
		$search = implode(" $logical ", $like_array);
		if($table_name == "articles"){
			$search = preg_replace("/ name LIKE '/"," text LIKE '",$search);
			//$query = "select * from articles where $search";
		}else{
			//searching band list:
		//	$query = "select * from $table_name where $search";
		} 


		return $search;
	}


	function process_tpl($smarty){
		$smarty->assign('search_results', $this->search_results);
		$smarty->assign('article_search_results', $this->article_search_results);
		$smarty->assign('search_string', $this->search_string);
		return $smarty;
	}
	
	
}

