<?php
include_once(dirname(__FILE__)."/adodb/adodb.inc.php");
include_once(dirname(__FILE__)."/class.gbft.php");



class Entity extends gbft{

	var $conn = "";
	var $type = "";
	var $id = "";
	
	var $info = array();
	var $files = array();
	var $articles = array();
	
	var $join_info = array();
	var $join_num_articles =array();
	var $join_num_files = array();
	
	var $join_types = array();
	
	var $unapproved_entity_changes = array();
	
	var $user = false;
	
	var $thumbnailed_images = array(); // array of images to show as reduced-size thumbnails
	
	var $num_thumbnails = 3;

	
	function __construct($type = "", $id = ""){
		print __FILE__.":".__LINE__."<BR>\n";
		$this->get_conn();
		
		$this->set_type($type);
		$this->set_id($id);
		print $this->type;
		print $this->id;
	//	$this->populate_entity();
	}

	function set_user($user){
		$this->user = $user;
	}
		
	
	
	function populate_entity(){
		$this->get_entity_info();
		print __FILE__.":".__LINE__."<BR>\n";
		print_r($this->info);
		if(count($this->info)== 0){
			echo "i got nothing";
			return false;
		}
		$this->get_entity_articles();
		
		$this->crosslink_articles();
		
		$this->get_entity_files();
		
		$this->check_files();
		
		$this->pick_thumbnail_images();
		
		$this->get_entity_joins();
		if($this->user && $this->type == 'member' && $this->id == $this->user->info['ID']){
			$this->get_watchlist_events();
		}
		
		$this->get_unapproved_entity_changes();
		
		$this->get_event_all_bands();
		
		/*
		echo "<pre>";
		print_r($this->join_info);
		echo "</pre>";
		*/
	}
	
	
	
	//STATIC FUNCTION
	function name_exists($conn, $type, $name){
		$query = "SELECT
					* 
				FROM
					$type
				WHERE
					name LIKE '".$this->conn->qstr($name)."'";
		$rs = $conn->Execute($query);
		
		if($rs && strlen($rs->fields['ID']) > 0){
			return true;
		}else{
			return false;
		}
	}

	
	function set_id($id){
		$this->id = $id;
	}
	
	function set_type($type){
		$this->type = $type;
		$this->join_types = array();
		reset($this->all_types);
		foreach($this->all_types as $type){
			$table_name = $this->get_table_name($this->type, $type);
			if($table_name){
				$this->join_types[] = $type;
			}
		}
	}
	
	
	
	function get_entity_info(){
		global $GLOBALS;
		$id = intval($this->id);
		$type = $this->type;
		if(!in_array($type, $GLOBALS['entity_types'])){echo __LINE__.$type . " isn't valid"; return false;}
		if(strlen($type) > 0 && strlen($id) > 0){
			$query = "SELECT
						* 
					FROM
						`".$type."`
					WHERE
						ID = ".$this->conn->qstr(intval($id))."";
			$rs = $this->conn->Execute($query);
			print __FILE__.":".__LINE__."<BR>\n";
			print_r($query);
			print_r($rs);
			if($rs){
				$this->info = $rs->fields;
				if($type == 'event'){
					$split = explode(':', $this->info['start_time']);
					$this->info['start_time_hour'] = $split[0];
					$this->info['start_time_minute'] = $split[1];
						
				}
			}
		}		
	}
	
	function get_unapproved_entity_changes(){
		$id = intval($this->id);
		$type = $this->type;
		if(!in_array($type, $GLOBALS['entity_types'])){echo  __LINE__.$type . " isn't valid"; return false;}

		if(strlen($type) > 0 && strlen($id) > 0){
			$query = "SELECT
						* 
					FROM
						`".$type."`
					WHERE
						orig_id = '".intval($id)."'";
			$this->unapproved_entity_changes = $this->conn->GetArray($query);
		}	
	}
	
	
	
	function get_entity_articles(){
		if(!in_array($this->type, $GLOBALS['entity_types'])){echo  __LINE__.$this->type . " isn't valid"; return false;}
		
		$query = "SELECT
					*
				FROM
					articles
				WHERE
					entity_type = '".$this->type."' AND
					entity_ID = '".intval($this->id)."'  AND
						status != 'change'";
		$rs = $this->conn->Execute($query);
		if($rs){
			$this->articles  = $rs->GetRows();	
		}		
	}
	
	
	
	function crosslink_articles(){
		foreach($this->articles as $index=>$article){
			$text = $article['text'];	
			$text =  preg_replace_callback("/\[\[ ( ( (?>[^[\]]+) | (?R) )* ) ]]/x",array(&$this, "makelink"), $text);
			
			$this->articles[$index]['text'] = $text;
		}	
	}
	
	function makelink($matches){
		$full_match = $matches[0];
		$name = $matches[1];
		$inner_text = preg_replace_callback("/\[\[ ( ( (?>[^[\]]+) | (?R) )* ) ]]/x",array(&$this, "makelink"), $name);
		$name = str_replace('[[','',$name);
		$name = str_replace(']]','',$name);
		foreach($this->all_types as $type){
			$query = "SELECT
						ID 
					FROM 
						".$type." 
					WHERE
		                name LIKE \"".mysql_real_escape_string($name, $this->conn)."\"";
	
			$rs = $this->conn->execute($query);
			if($rs && strlen($rs->fields['ID']) > 0){
				$row = $rs->fields;
				if($row){
					return " <font size=+1><a href=\"entity.php?type=".$type."&id=".$row[ID]."\">".$inner_text."</a></font> ";
				}
			}
		}

		return $name;
		
	}

	
	
	function get_entity_files(){
		if(!in_array($this->type, $GLOBALS['entity_types'])){echo  __LINE__.$type . " isn't valid"; return false;}
		$query = "SELECT
					*
				FROM
					submitted_files
				WHERE
					entity_type = '".$this->type."' AND
					entity_ID = '".intval($this->id)."'  AND
						status = 'approved'";
		$rs = $this->conn->Execute($query);
		$this->files  = $rs->GetRows();		
	}
	
	
	function get_entity_joins(){
		$join_types = $this->join_types;
		foreach($join_types as $join_type){
			$this->get_joins_of_type($join_type);	
		}
	}

	function get_joins_of_type($join_type){
		$this->get_join_infos_of_type($join_type, "approved");
		$this->get_join_infos_of_type($join_type,  "new");
		$this->get_unapproved_join_changes($join_type);
		$this->get_join_num_articles($join_type);
		$this->get_join_num_files($join_type);	
	}
	
	
	function get_unapproved_join_changes($join_type){
		if(!in_array($this->type, $GLOBALS['entity_types'])){echo  __LINE__.$type . " isn't valid"; return false;}

		if(is_array($this->join_info[$join_type]['approved'])){
			foreach($this->join_info[$join_type]['approved'] as $index=>$join){
				$id = $join['ID'];
				$table_name = $this->get_table_name($this->type, $join_type);	
				$query = "SELECT
							*
						FROM
							$table_name	
						WHERE
							orig_id = '".$id."'";
				$results = $this->conn->GetArray($query);	
				if(is_array($results) && count($results) > 0){
					$this->join_info[$join_type]['approved'][$index]['changes'] = $results;
				}			
			}
		}		
		
	}
	
	function get_join_infos_of_type($join_type, $status = "approved"){
		if(!in_array($this->type, $GLOBALS['entity_types'])){echo  __LINE__.$type . " isn't valid"; return false;}

		$table_name = $this->get_table_name($this->type, $join_type);	

//		$this->conn->debug = true;
		
		if(!$table_name){
			$this->join_info[$join_type][$status] = array();
			return false;
		}
		$addtl_where = "";
		
		if($join_type == "event"){
			$order_by = "e.start_date ";
			$addtl_select = ",v.name as venue_name,
							  v.ID as venue_ID";
			$addtl_join = "JOIN
							event_venue ev
						ON
							e.ID = ev.event_ID
						JOIN
							venue v
						ON
							ev.venue_ID = v.ID";
				
		}else{
			$order_by = "e.name";
			$addtl_select = "";
			$addtl_join = "";
		}
		
		if($join_type== "member"){
			$addtl_where = " AND e.public_visible = 'y' ";
		}

		
		if($this->type == 'musician' && $join_type == 'event'){
			$query = "SELECT
						e.ID as x,
						e.ID as ID,
						e.ID as event_ID,
						e.*,
						b.name as band_name,
						b.ID as band_ID,
						m.name as musician_name,
						m.ID as musician_ID,
						count(b.ID) as num_bands
						$addtl_select
					FROM
						musician m
						JOIN
							band_musician bm
						ON 
							m.ID = bm.musician_ID
						JOIN
							band  b 
						ON
							bm.band_ID = b.ID
						JOIN
							band_event be
						ON
							be.band_ID = b.ID
						JOIN
							event e
						ON
							be.event_ID = e.ID
						$addtl_join
					WHERE
						bm.".$this->type."_ID = '".intval($this->id)."'  AND
						e.status = '$status'
						$addtl_where
					GROUP BY 
						e.ID
					ORDER BY
						$order_by";
		}else{
		
			$query = "SELECT
						e.ID as x,
						j.ID as ID,
						e.*,
						j.*
						$addtl_select
					FROM
						$table_name j
					JOIN
						$join_type e
					ON
						j.".$join_type."_ID =  e.ID 
					$addtl_join
					WHERE
						j.".$this->type."_ID = '".intval($this->id)."'  AND
						j.status = '$status'
						$addtl_where
					ORDER BY
						$order_by";
		}
		
		$this->join_info[$join_type][$status] = $this->conn->GetAssoc($query);
		
		
		if($this->type == 'musician' && $join_type == 'event'){
			foreach($this->join_info['event'][$status] as $index=>$info){
				if($info['num_bands'] > 1){
					
					
					$query = "SELECT
								b.name as band_name,
								b.ID as band_ID
							FROM
								musician m
								JOIN
									band_musician bm
								ON 
									m.ID = bm.musician_ID
								JOIN
									band  b 
								ON
									bm.band_ID = b.ID
								JOIN
									band_event be
								ON
									be.band_ID = b.ID
								JOIN
									event e
								ON
									be.event_ID = e.ID
							WHERE
								bm.".$this->type."_ID = '".intval($this->id)."'  AND
								e.ID = '".$info['event_ID']."' AND
								e.status = '$status'
								$addtl_where
							GROUP BY 
								b.ID
							ORDER BY
								$order_by";
						$this->join_info[$join_type][$status][$index]['musician_bands'] = $this->conn->GetArray($query);					
				}	
			}	
		}
		


		return true;
	}

	
	function get_event_all_bands(){
		if(is_array($this->join_info['event'])){
			foreach($this->join_info['event'] as $status=>$events){
				foreach($events as $index=>$info){
					$query = "SELECT
								b.name as band_name,
								b.ID as band_ID
							FROM
								band  b 
								JOIN
									band_event be
								ON
									be.band_ID = b.ID
								JOIN
									event e
								ON
									be.event_ID = e.ID
							WHERE
								e.ID = '".$info['event_ID']."'
							GROUP BY 
								b.ID
							ORDER BY
								b.name";
					$this->join_info['event'][$status][$index]['all_bands'] = $this->conn->GetArray($query);										
				}	
			}	
		}	
	}
	
	function get_watchlist_events(){
		
		$band_events = $this->user->get_member_band_events('', '', 'public');
		$musician_band_events = $this->user->get_member_musician_band_events('', '', 'public');
		$venue_events = $this->user->get_member_venue_events('','','public');
		
		
		
		if(is_array($band_events)){
			foreach($band_events as $id=>$event){
				$this->join_info['event']['approved'][$id] = (is_array($this->join_info['event']['approved'][$id]) ? array_merge($this->join_info['event']['approved'][$id], $event) : $event);	
			}
		}
		if(is_array($musician_band_events)){
			foreach($musician_band_events as $id=>$event){
				$this->join_info['event']['approved'][$id] = (is_array($this->join_info['event']['approved'][$id]) ? array_merge($this->join_info['event']['approved'][$id], $event) : $event);	
			}
		}	
		if(is_array($venue_events)){
			foreach($venue_events as $id=>$event){
				$this->join_info['event']['approved'][$id] = (is_array($this->join_info['event']['approved'][$id]) ? array_merge($this->join_info['event']['approved'][$id], $event) : $event);	
			}
		}	
		
		
	}
	
	function get_join_num_articles($join_type){
		if(!in_array($this->type, $GLOBALS['entity_types'])){echo __LINE__.$this->type . " isn't valid"; return false;}

		$table_name = $this->get_table_name($this->type, $join_type);	
		if(!$table_name){
			$this->join_num_articles[$join_type] = array();
			return false;	
		}
		
//		$this->conn->debug = true;
		$query = "SELECT
					m.".$join_type."_ID as ID,
					count(*) as num
				FROM
					$table_name m
				JOIN
					articles a
				ON
					a.entity_type = '".$join_type."'  AND
					a.entity_ID = m.".$join_type."_ID 
				WHERE
					m.".$this->type."_ID = '$this->id' 

				GROUP BY
					m.".$join_type."_ID  ";
		
		$this->join_num_articles[$join_type] = $this->conn->GetAssoc($query);
	}

	
	function get_join_num_files($join_type){
		if(!in_array($this->type, $GLOBALS['entity_types'])){echo  __LINE__.$type . " isn't valid"; return false;}

		$table_name = $this->get_table_name($this->type, $join_type);	
		if(!$table_name){
			$this->join_num_files[$join_type] = array();
			return false;	
		}
		$query = "SELECT
					m.".$join_type."_ID as ID,
					count(*) as num
				FROM
					$table_name m
				JOIN
					submitted_files a
				ON
					a.entity_type = '".$join_type."'  AND
					a.entity_ID = m.".$join_type."_ID 
				WHERE
					m.".$this->type."_ID = '$this->id'
				GROUP BY
					m.".$join_type."_ID";
		$this->join_num_files[$join_type] = $this->conn->GetAssoc($query);

	}

	
	
	function check_files(){
		 
		foreach($this->files as $index=>$file){
			$path = "submitted_files/".$this->type."/".$this->id."/".$file['filename'];
			if(!file_exists($path)){
				unset($this->files[$index]);	
			}else{
				$this->files[$index]['filesize'] = filesize($path);
			}
			
		}
		
	}
	
	
	function pick_thumbnail_images(){
		$possible_thumbnails = array();
		foreach($this->files as $index=>$file){
			if(preg_match('/\.(jpg|gif|png)$/i', $file['filename'])){
				$bytes = $file['filesize'];
				if($bytes <= 100000){
					$possible_thumbnails[$index] = $file;
					
				}
			}
		}
		if(count($possible_thumbnails) > 0){
			if(count($possible_thumbnails) < $this->num_thumbnails){
				$this->num_thumbnails = count($possible_thumbnails);
			}
			$keys = array_rand($possible_thumbnails, min(count($possible_thumbnails),$this->num_thumbnails));	
			if(is_array($keys)){	
				foreach($keys as $key){
					$this->thumbnailed_images[] = $possible_thumbnails[$key];
					unset($this->files[$key]);
				}
			}
		}
	}
	


}


