<?php

include_once(dirname(__FILE__)."/class.entity.php");

class user extends entity{
	
	var $subscribed_bands;
	var $subscribed_musicians;
	
	
	
	// STATIC function
	public static function get_valid_user($conn, $user_name, $user_pass){
	//	$conn = gbft::static_get_conn();
		$conn->debug = false;
		$query = "SELECT
					ID as x,
					member.*
				FROM
					member
				WHERE
					name = '".$conn->qstr($user_name)."' AND
					pass = '".$conn->qstr($user_pass)."'";
		$rs = $conn->Execute($query);
		// check if the user exists and has a name
		if(!$rs){
			return false;	
		}
		$user = new user("member", $rs->fields['ID']);
		return $user;
		
	}

	
	
	
	function get_subscribed_bands($level){
		$query = "SELECT
					e.ID
					e.*
				FROM
					member m
					JOIN
						band_member bm
					ON
						m.ID = bm.member_ID
					JOIN
						band e
					ON
						bm.band_ID = e.ID
				WHERE
					m.ID = '".$this->id."'
					AND
					bm.subscription_level = '$level'";
		$this->subscribed_bands = $this->conn->GetAssoc($query);
		
	}
	
	function get_subscribed_musicians($level){
		$query = "SELECT
					e.ID
					e.*
				FROM
					member_musician mm
					JOIN
						musician e
					ON
						mm.musician_ID = e.ID
				WHERE
					mm.ID = '".$this->id."
					AND
					mm.subscription_level = '$level'";
		$this->subscribed_musicians = $this->conn->GetAssoc($query);
	}
	
	function get_subscribed_bands_2_hops($level){

		$query = "SELECT
					b.ID as x,
					b.*
					m.name as musician_name,
					m.ID as musician_ID
				FROM
					member_musician mm
					JOIN
						musician m
					ON
						mm.musician_ID = m.ID
					JOIN
						band_musician bm
					ON
						m.ID = bm.musician_ID
					JOIN
						band b
					ON
						bm.band_ID = b.ID
				WHERE
					mm.subscription_level = '$level' AND
					mm.member_ID = '".$this->conn->qstr($this->id)."'
					";
		return $this->conn->GetAssoc($query);		
	}
	
	function get_member_band_events($date_start_ts, $date_end_ts, $level){

		if(strlen($date_start_ts) > 0){
			$start_where = 	"AND e.start_date >= '".date("Y-m-d H:i:s", $date_start_ts)."'";
		}else{
			$start_where = '';
		}
		
		if(strlen($date_end_ts) > 0){
			$end_where = 	"AND e.start_date <= '".date("Y-m-d H:i:s", $date_end_ts)."'";
		}else{
			$end_where = '';
		}
		
		$query = "SELECT
					e.ID as x,
					e.ID as ID,
					e.ID as event_ID,
					e.*,
					b.name as band_name,
					b.ID as band_ID,
					v.ID as venue_ID,
					v.name as venue_name
				FROM
					band_member bm
					JOIN
						band b
					ON
						bm.band_ID = b.ID
					JOIN
						band_event be
					ON
						b.ID = be.band_ID
					JOIN
						event e
					ON
						be.event_ID = e.ID
					JOIN
						event_venue ev
					ON
						e.ID = ev.event_ID
					JOIN
						venue v
					ON
						ev.venue_ID = v.ID
				WHERE
					subscription_level = '$level' AND
					bm.member_ID  = '".$this->conn->qstr($this->id)."' 
					$start_where
					$end_where
				GROUP BY 
					e.ID

		";
		return $this->conn->GetAssoc($query);		
				
				
	}

	function get_member_musician_band_events($date_start_ts, $date_end_ts, $level){
		if(strlen($date_start_ts) > 0){
			$start_where = 	"AND e.start_date >= '".date("Y-m-d H:i:s", $date_start_ts)."'";
		}else{
			$start_where = '';
		}
		
		if(strlen($date_end_ts) > 0){
			$end_where = 	"AND e.start_date <= '".date("Y-m-d H:i:s", $date_end_ts)."'";
		}else{
			$end_where = '';
		}
		
		$query = "SELECT
					e.ID as x,
					e.ID as ID,
					e.ID as event_ID,
					e.*,
					b.name as band_name,
					m.name as musician_name,
					b.ID as band_ID,
					m.ID as musician_ID,
					v.ID as venue_ID,
					v.name as venue_name
				FROM
					member_musician mm
					JOIN
						musician m
					ON
						mm.musician_ID = m.ID
					JOIN						
						band_musician bm
					ON
						mm.musician_ID = bm.musician_ID
					JOIN
						band b
					ON
						bm.band_ID = b.ID
					JOIN
						band_event be
					ON
						b.ID = be.band_ID
					JOIN
						event e
					ON
						be.event_ID = e.ID
					JOIN
						event_venue ev
					ON
						e.ID = ev.event_ID
					JOIN
						venue v
					ON
						ev.venue_ID = v.ID
				WHERE
					subscription_level = '$level' AND
					mm.member_ID = '".$this->conn->qstr($this->id)."' 
					$start_where
					$end_where
				GROUP BY 
					e.ID
		";
		return $this->conn->GetAssoc($query);		
		
	}
	
	function get_member_venue_events($date_start_ts, $date_end_ts, $level){
		if(strlen($date_start_ts) > 0){
			$start_where = 	"AND e.start_date >= '".date("Y-m-d H:i:s", $date_start_ts)."'";
		}else{
			$start_where = '';
		}
		
		if(strlen($date_end_ts) > 0){
			$end_where = 	"AND e.start_date <= '".date("Y-m-d H:i:s", $date_end_ts)."'";
		}else{
			$end_where = '';
		}		
		
		
		$query = "SELECT
					e.ID as x,
					e.ID as ID,
					e.ID as event_ID,
					e.*,
					v.ID as venue_ID,
					v.name as venue_name
				FROM
					member_venue mv
					JOIN
						venue v
					ON
						mv.venue_ID = v.ID
					JOIN
						event_venue ev
					ON
						v.ID = ev.venue_ID
					JOIN
						event e
					ON
						ev.event_ID = e.ID
				WHERE
					subscription_level = '$level' AND
					mv.member_ID  = '".$this->conn->qstr($this->id)."' 
					$start_where
					$end_where
				GROUP BY 
					e.ID";
		
		return $this->conn->GetAssoc($query);
		
	}
}
