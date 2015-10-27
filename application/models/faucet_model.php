<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class faucet_model extends CI_Model {
	function __construct() {
        parent::__construct();
		
		$this->field = array('id', 'link', 'satoshi_min', 'satoshi_avg', 'delay_time', 'active_time', 'is_active');
    }
	
	function update($param) {
		$Result = array();
		
		if (empty($param['id'])) {
			$InsertQuery  = GenerateInsertQuery($this->field, $param, FAUCET);
			$InsertResult = mysql_query($InsertQuery) or die(mysql_error());
			
			$Result['id'] = mysql_insert_id();
			$Result['QueryStatus'] = '1';
			$Result['Message'] = 'Data successfully stored.';
		} else {
			$UpdateQuery  = GenerateUpdateQuery($this->field, $param, FAUCET);
			$UpdateResult = mysql_query($UpdateQuery) or die(mysql_error());
			
			$Result['id'] = $param['id'];
			$Result['QueryStatus'] = '1';
			$Result['Message'] = 'Data successfully updated.';
		}
		
		return $Result;
	}
	
	function get_by_id($param) {
		$array = array();
		
		if (isset($param['id'])) {
			$select_query  = "SELECT * FROM ".FAUCET." WHERE id = '".$param['id']."' LIMIT 1";
		}
		
		$select_result = mysql_query($select_query) or die(mysql_error());
		if (false !== $row = mysql_fetch_assoc($select_result)) {
			$array = StripArray($row);
		}
		
		return $array;
	}
	
	function get_array($param = array()) {
		$array = array();
		$string_filter = GetStringFilter($param);
		
		$string_active = (isset($param['active_only'])) ? "AND active_time <= '".$this->config->item('date_time_format')."' AND is_active = '1'" : '';
		$string_delay_time_min = (isset($param['delay_time_min'])) ? "AND delay_time >= '".$param['delay_time_min']."'" : '';
		$string_delay_time_max = (isset($param['delay_time_max'])) ? "AND delay_time <= '".$param['delay_time_max']."'" : '';
		
		$page_offset = (isset($param['start']) && !empty($param['start'])) ? $param['start'] : 0;
		$page_limit = (isset($param['limit']) && !empty($param['limit'])) ? $param['limit'] : 50;
        $string_sorting = (isset($param['sort'])) ? GetStringSorting($param['sort']) : 'satoshi_avg DESC, active_time ASC';
		
		$select_query = "
			SELECT SQL_CALC_FOUND_ROWS faucet.*
			FROM ".FAUCET." faucet
			WHERE 1 $string_filter $string_active $string_delay_time_min $string_delay_time_max
			ORDER BY $string_sorting
			LIMIT $page_offset, $page_limit
		";
		$select_result = mysql_query($select_query) or die(mysql_error());
		while (false !== $row = mysql_fetch_assoc($select_result)) {
			$array[] = $this->sync($row);
		}
		
		return $array;
	}
	
	function get_count($param = array()) {
		$total = 0;
		
		$select_query = "SELECT FOUND_ROWS() total";
		$select_result = mysql_query($select_query) or die(mysql_error());
		while (false !== $row = mysql_fetch_assoc($select_result)) {
			$total = $row['total'];
		}
		
		return $total;
	}
	
	function delete($param) {
        $delete_query  = "DELETE FROM ".FAUCET." WHERE id = '".$param['id']."' LIMIT 1";
		$delete_result = mysql_query($delete_query) or die(mysql_error());
        
        $Result['QueryStatus'] = '1';
        $Result['Message'] = 'Data has been deleted.';
		
		return $Result;
	}
	
	function sync($row) {
		$result = StripArray($row);
		
		// domain
		$domain = parse_url($row['link']);
		$result['domain'] = $domain['host'];
		
		return $result;
	}
}