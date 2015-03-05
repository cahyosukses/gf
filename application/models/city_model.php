<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City_model extends CI_Model {
	function __construct() {
        parent::__construct();
		
		$this->Field = array('city_id', 'user_id', 'city', 'city_time', 'city_desc');
    }
	
	function Update($Param) {
		$Result = array();
		
		if (empty($Param['city_id'])) {
			$InsertQuery  = GenerateInsertQuery($this->Field, $Param, CITY);
			$InsertResult = mysql_query($InsertQuery) or die(mysql_error());
			
			$Result['city_id'] = mysql_insert_id();
			$Result['QueryStatus'] = '1';
			$Result['Message'] = 'Data successfully stored.';
		} else {
			$UpdateQuery  = GenerateUpdateQuery($this->Field, $Param, CITY);
			$UpdateResult = mysql_query($UpdateQuery) or die(mysql_error());
			
			$Result['city_id'] = $Param['city_id'];
			$Result['QueryStatus'] = '1';
			$Result['Message'] = 'Data successfully updated.';
		}
		
		return $Result;
	}
	
	function GetByID($Param) {
		$Array = array();
		
		if (isset($Param['city_id'])) {
			$SelectQuery  = "SELECT * FROM ".CITY." WHERE city_id = '".$Param['city_id']."' LIMIT 1";
		}
		
		$SelectResult = mysql_query($SelectQuery) or die(mysql_error());
		if (false !== $Row = mysql_fetch_assoc($SelectResult)) {
			$Array = StripArray($Row);
		}
		
		return $Array;
	}
	
	function GetArray($Param = array()) {
		$Array = array();
		$StringSearch = (isset($Param['NameLike'])) ? "AND city LIKE '%" . $Param['NameLike'] . "%'"  : '';
		$StringFilter = GetStringFilter($Param);
		
		$PageOffset = (isset($Param['start']) && !empty($Param['start'])) ? $Param['start'] : 0;
		$PageLimit = (isset($Param['limit']) && !empty($Param['limit'])) ? $Param['limit'] : 50;
        $StringSorting = (isset($Param['sort'])) ? GetStringSorting($Param['sort']) : 'user_power ASC, user_id ASC, city_id ASC, city ASC';
		
		$SelectQuery = "
			SELECT City.*, User.user_email, User.user_pass, User.user_display, User.user_troop
			FROM ".CITY." City
			LEFT JOIN ".USER." User ON User.user_id = City.user_id
			WHERE 1 $StringSearch $StringFilter
			ORDER BY $StringSorting
			LIMIT $PageOffset, $PageLimit
		";
		$SelectResult = mysql_query($SelectQuery) or die(mysql_error());
		while (false !== $Row = mysql_fetch_assoc($SelectResult)) {
			$Row = StripArray($Row);
			$Array[] = $Row;
		}
		
		return $Array;
	}
	
	function get_array_index($param = array()) {
		$first_id = $second_id = 0;
		$array_result = $array_second_user = array();
		$array = $this->GetArray($param);
		foreach ($array as $key => $row) {
			// update user id
			if (empty($key)) {
				$first_id = $row['user_id'];
			}
			
			// insert row
			if ($first_id != $row['user_id'] && ($second_id == 0 || $second_id == $row['user_id'])) {
				$second_id = $row['user_id'];
				$array_second_user[] = $row;
			} else {
				$array_result[] = $row;
			}
		}
		
		$result = array_merge($array_result, $array_second_user);
		return $result;
	}
	
	function GetCount($Param = array()) {
		$TotalRecord = 0;
		
		$StringSearch = (isset($Param['NameLike'])) ? "AND city LIKE '%" . $Param['NameLike'] . "%'"  : '';
		$StringFilter = GetStringFilter($Param);
		
		$SelectQuery = "
			SELECT COUNT(*) AS TotalRecord
			FROM ".CITY." City
			WHERE 1 $StringSearch $StringFilter
		";
		$SelectResult = mysql_query($SelectQuery) or die(mysql_error());
		while (false !== $Row = mysql_fetch_assoc($SelectResult)) {
			$TotalRecord = $Row['TotalRecord'];
		}
		
		return $TotalRecord;
	}
	
	function GetTime($ModifyTime) {
		$ModifyTime = (empty($ModifyTime)) ? '0M' : strtoupper($ModifyTime);
		
		$ArrayTime = array("F", "W", "D", "H", "M");
		$ArrayReplace = array("month", "week", "day", "hour", "minute");
		$ModifyTimeReplace = str_replace($ArrayTime, $ArrayReplace, $ModifyTime);
		
		
		$Result = date("Y-m-d H:i:s", strtotime($ModifyTimeReplace));
		return $Result;
	}
	
	function Delete($Param) {
        if (isset($Param['list_city_id'])) {
			$DeleteQuery  = "DELETE FROM ".CITY." WHERE city_id IN (".$Param['list_city_id'].")";
			$DeleteResult = mysql_query($DeleteQuery) or die(mysql_error());
		} else if (isset($Param['city_id'])) {
			$DeleteQuery  = "DELETE FROM ".CITY." WHERE city_id = '".$Param['city_id']."' LIMIT 1";
			$DeleteResult = mysql_query($DeleteQuery) or die(mysql_error());
        }
		
        $Result['QueryStatus'] = '1';
        $Result['Message'] = 'Data has been deleted.';
		
		return $Result;
	}
	
	function Truncate() {
		$TruncateQuery  = "TRUNCATE TABLE `".CITY."`";
		$TruncateResult = mysql_query($TruncateQuery) or die(mysql_error());
	}
}