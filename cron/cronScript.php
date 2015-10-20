<?php include '../secure/talk2db.php';



global $couchUrl;
$systems = new couchClient($couchUrl, "systems");
foreach($inst_id as $schoolID) {
	try{
		$doc = $systems->getDoc($schoolID);	
		$data = end($doc->internet_source);
		//echo $data->systemtime;
		//echo $data->status;
		$getSQLdata =  mysql_query("SELECT MAX(REC_DATE) as recordDate FROM `log_internet_source` where INST_ID = '".$schoolID."' ") or die(mysql_error());
		$rowData = mysql_fetch_row($getSQLdata);
		if(strtotime($data->systemtime) > strtotime($rowData['0'])){
			 mysql_query("INSERT INTO `log_internet_source` (`COL_NUM`, `INST_ID`, `STATUS`, `REC_DATE`) VALUES (NULL, '".$schoolID."', '".$data->status."', '".$data->systemtime."' )") or die(mysql_error());
			 
			
		}else{
			
		}
	}catch(Exception $errs){
		
	}
	
	//////  internet_status ///
	try{
		$doc = $systems->getDoc($schoolID);	
		$data = end($doc->internet_status);
		//echo $data->systemtime;
		//echo $data->status;
		$getSQLdata =  mysql_query("SELECT MAX(REC_DATE) as recordDate FROM `log_internet` where INST_ID = '".$schoolID."' ") or die(mysql_error());
		$rowData = mysql_fetch_row($getSQLdata);
		if(strtotime($data->systemtime) > strtotime($rowData['0'])){
			 mysql_query("INSERT INTO `log_internet` (`COL_NUM`, `INST_ID`, `STATUS`, `REC_DATE`) VALUES (NULL, '".$schoolID."', '".$data->status."', '".$data->systemtime."' )") or die(mysql_error());
		}else{
			
		}
	}catch(Exception $errs){
		
	}
	
	//////  ups_battery_level ///
	try{
		$doc = $systems->getDoc($schoolID);	
		$data = end($doc->ups_battery_level);
		//echo $data->systemtime;
		//echo $data->status;
		$getSQLdata =  mysql_query("SELECT MAX(REC_DATE) as recordDate FROM `log_battery` where INST_ID = '".$schoolID."' ") or die(mysql_error());
		$rowData = mysql_fetch_row($getSQLdata);
		if( strtotime($data->systemtime) > strtotime($rowData['0'])){
			 mysql_query("INSERT INTO `log_battery` (`COL_NUM`, `INST_ID`, `STATUS`, `REC_DATE`) VALUES (NULL, '".$schoolID."', '".$data->status."', '".$data->systemtime."' )") or die(mysql_error());
		}else{
			
		}
	}catch(Exception $errs){
		
	}
	
	//////  ups_battery_level ///
	try{
		$doc = $systems->getDoc($schoolID);	
		$data = end($doc->ups_power_status);
		//echo $data->systemtime;
		//echo $data->status;
		$getSQLdata =  mysql_query("SELECT MAX(REC_DATE) as recordDate FROM `log_power` where INST_ID = '".$schoolID."' ") or die(mysql_error());
		$rowData = mysql_fetch_row($getSQLdata);
		if(strtotime($data->systemtime) > strtotime($rowData['0'])){
			 mysql_query("INSERT INTO `log_power` (`COL_NUM`, `INST_ID`, `STATUS`, `REC_DATE`) VALUES (NULL, '".$schoolID."', '".$data->status."', '".$data->systemtime."' )") or die(mysql_error());
		}else{
			
		}
	}catch(Exception $errs){
		
	}
	
}
 echo 'Updated Systems on '.date('Y/m/d h:m:s');

?>