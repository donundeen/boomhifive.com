<?

class calendar extends gbft {

	var $month;
	var $year;
	var $start_date_ts;
	var $end_date_ts;
	var $initial_date_ts;
	var $first_day_of_week;
	var $last_day_of_month;

	var $events;
	
	var $weeks = array();
	
	var $next_month ;
	var $next_year;
	
	var $user = false; // user object
	var $user_events_only = false;
	
	var $user_band_events = array();
	var $user_musician_band_events = array();
	
	function calendar(){
		$this->get_conn();	
	}
	
	function set_user($user){
		$this->user = $user;
	}
	function set_user_events_only($user_events_only){
		$this->user_events_only = $user_events_only;
	}
	
	function set_date($year = "", $month= "", $day = ""){
		if(strlen($year) == 0){
			$this->year = date("Y");
		}else{
			$this->year = $year;
		}
		if(strlen($month) == 0){
			$this->month = date("m");
		}else{
			$this->month = $month;
		}
		
		$this->start_date_ts = strtotime($this->year."/".$this->month."/01");
		$this->initial_date_ts = $this->start_date_ts;
		
		$this->next_month_ts = strtotime("+ 1 month", $this->initial_date_ts);
		$this->prev_month_ts = strtotime("+ -1 month", $this->initial_date_ts);

		$this->next_year = date("Y", $this->next_month_ts);
		$this->prev_year = date("Y", $this->prev_month_ts);
			
		$this->next_month = date("m", $this->next_month_ts);
		$this->prev_month = date("m", $this->prev_month_ts);
		
		$this->first_day_of_week = date("w", $this->start_date_ts);

		
		$this->start_date_ts = strtotime("+ -".$this->first_day_of_week." days", $this->start_date_ts);
				
		$this->last_day_of_month = date("t", $this->start_date_ts);
		$this->end_date_ts = strtotime($this->year."/".$this->month."/".$this->last_day_of_month);
		
		$dow = date("w", $this->end_date_ts);
		$adj = '+ '. (6 - $dow) .' days';
		$this->end_date_ts = strtotime($adj, $this->end_date_ts);

		
		if($this->user){
			$this->user_band_events = $this->user->get_member_band_events($this->start_date_ts, $this->end_date_ts,'public');		
			$this->user_musician_band_events = $this->user->get_member_musician_band_events($this->start_date_ts, $this->end_date_ts,'public');		
		}
		
		$this->get_events();
		
		
		if($this->user_events_only == 'true'){
			$user_event_ids = array_unique(array_merge(array_keys($this->user_band_events), array_keys($this->user_musician_band_events)));
			foreach($this->events as $index=>$event){
				$id = 	$event['ID'];
				if(!in_array($id, $user_event_ids)){
					unset($this->events[$index]);
				}
			}	
				
		}
		
		$this->build_day_events();	
		
		$this->build_calendar_frame();
		
		
	}
	
	function get_events(){
		$query = "SELECT
					e.ID as x,
					e.ID as ID,
					e.*,
					v.ID as venue_ID,
					v.name as venue_name
				FROM
					event e
					LEFT JOIN
						event_venue ev
					ON 
						e.ID = ev.event_ID
					LEFT JOIN
						venue v
					ON
						ev.venue_ID = v.ID
				WHERE
					e.start_date >= '".date("Y-m-d", $this->start_date_ts)."' AND
					e.start_date <= '".date("Y-m-d", $this->end_date_ts)."'
				ORDER BY
					e.start_date,
					e.start_time";

		$this->events = $this->conn->GetAssoc($query);	
		$this->get_event_bands();
	}
	
	function build_day_events(){
		$this->day_events = array();
		foreach($this->events as $id=>$row){
			$date = $row['start_date'];
			$this->day_events[$date][] = $row;
		}
		
		
	}
	
	function get_event_bands(){
		foreach($this->events as $index=>$event){
			$event_id = $event['ID'];	
			$query = "SELECT
						b.*
					FROM
						band_event be
						JOIN
							band b
						ON
							be.band_ID = b.ID
					WHERE
						be.event_ID = '".mysql_real_escape_string($event_id)."' 
					ORDER BY
						b.name";
			$this->events[$index]['bands'] = $this->conn->GetArray($query);
			
		}	
	}
	
	function build_calendar_frame(){
		$this->weeks = array();
		
		$date_ts = $this->start_date_ts;
		while($date_ts <= $this->end_date_ts){
			$dow = date("w", $date_ts);
			if($dow == 0){
				// new week	
				$week = array();
				
			}
			$day = array();	
			$events = $this->day_events[date("Y-m-d", $date_ts)];
			$day['events'] = $events;
			$day['date'] = date("Y-m-d", $date_ts);
			$day['date_ts'] = $date_ts;
			$week['days'][] = $day;
			if($dow == 6){
				$this->weeks[] = $week;
			}
			
			$date_ts = strtotime("+ 1 day", $date_ts);	
			
		}
		
		
	}
	
}

?>