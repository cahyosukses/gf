<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	function __construct() {
        parent::__construct();
		
		$this->Field = array( 'user_id', 'user_email', 'user_pass', 'user_display', 'user_power', 'user_troop' );
    }
	
	function Update($Param) {
		$Result = array();
		
		if (empty($Param['user_id'])) {
			$InsertQuery  = GenerateInsertQuery($this->Field, $Param, USER);
			$InsertResult = mysql_query($InsertQuery) or die(mysql_error());
			
			$Result['user_id'] = mysql_insert_id();
			$Result['QueryStatus'] = '1';
			$Result['Message'] = 'Data successfully stored.';
		} else {
			$UpdateQuery  = GenerateUpdateQuery($this->Field, $Param, USER);
			$UpdateResult = mysql_query($UpdateQuery) or die(mysql_error());
			
			$Result['user_id'] = $Param['user_id'];
			$Result['QueryStatus'] = '1';
			$Result['Message'] = 'Data successfully updated.';
		}
		
		return $Result;
	}
	
	function GetByID($Param) {
		$Array = array();
		
		if (isset($Param['user_id'])) {
			$SelectQuery  = "SELECT * FROM ".USER." WHERE user_id = '".$Param['user_id']."' LIMIT 1";
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
        $StringSorting = (isset($Param['sort'])) ? GetStringSorting($Param['sort']) : 'user_id ASC';
		
		$SelectQuery = "
			SELECT User.*
			FROM ".USER." User
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
	
	function GetCount($Param = array()) {
		$TotalRecord = 0;
		
		$StringSearch = (isset($Param['NameLike'])) ? "AND city LIKE '%" . $Param['NameLike'] . "%'"  : '';
		$StringFilter = GetStringFilter($Param);
		
		$SelectQuery = "
			SELECT COUNT(*) AS TotalRecord
			FROM ".USER." User
			WHERE 1 $StringSearch $StringFilter
		";
		$SelectResult = mysql_query($SelectQuery) or die(mysql_error());
		while (false !== $Row = mysql_fetch_assoc($SelectResult)) {
			$TotalRecord = $Row['TotalRecord'];
		}
		
		return $TotalRecord;
	}
	
	function get_power_sum() {
		$total = 0;
		
		$SelectQuery = "
			SELECT SUM(user_power) AS total
			FROM ".USER." user
		";
		
		$SelectResult = mysql_query($SelectQuery) or die(mysql_error());
		while (false !== $Row = mysql_fetch_assoc($SelectResult)) {
			$total = $Row['total'];
		}
		
		return $total;
	}
	
	function GetTime($ModifyTime) {
		$ModifyTime = (empty($ModifyTime)) ? '0M' : $ModifyTime;
		
		$ArrayTime = array("F", "W", "D", "H", "M");
		$ArrayReplace = array("month", "week", "day", "hour", "minute");
		$ModifyTimeReplace = str_replace($ArrayTime, $ArrayReplace, $ModifyTime);
		
		
		$Result = date("Y-m-d H:i:s", strtotime($ModifyTimeReplace));
		return $Result;
	}
	
	function Delete($Param) {
        if (isset($Param['list_user_id'])) {
			$DeleteQuery  = "DELETE FROM ".USER." WHERE user_id IN (".$Param['list_user_id'].")";
			$DeleteResult = mysql_query($DeleteQuery) or die(mysql_error());
		} else if (isset($Param['user_id'])) {
			$DeleteQuery  = "DELETE FROM ".USER." WHERE user_id = '".$Param['user_id']."' LIMIT 1";
			$DeleteResult = mysql_query($DeleteQuery) or die(mysql_error());
        }
		
        $Result['QueryStatus'] = '1';
        $Result['Message'] = 'Data has been deleted.';
		
		return $Result;
	}
	
	function Truncate() {
		$TruncateQuery  = "TRUNCATE TABLE `".USER."`";
		$TruncateResult = mysql_query($TruncateQuery) or die(mysql_error());
	}
}