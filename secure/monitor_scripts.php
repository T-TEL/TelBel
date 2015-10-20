<?php
include('talk2db.php');include_once('functions.php');
if(isset($_GET['powerSource'])){
	echo ' <div class="col-lg-12">
		<div class="panel panel-default">
		  <div class="panel-heading"> Power Source Log </div>
		  <!-- /.panel-heading -->
		  <div class="panel-body">
			<div class="dataTable_wrapper">
			  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
				  <tr>
					<th>Institution</th>
					<th>Power Source</th>
					<th>Record Date</th>
					<th>Record Time</th>
					<th> </th>
				  </tr>
				</thead>
				<tbody>';
	$date = new DateTime();
	$date->modify("-60 minutes");
	$dt = $date->format('Y-m-d H:i:s');
	foreach($inst_id as $schoolID) {
		$getSQLdata =  mysql_query("SELECT * FROM `log_power` where INST_ID = '$schoolID' AND REC_DATE = ( Select MAX(REC_DATE) FROM log_power where INST_ID = '$schoolID') AND STATUS LIKE '%'  ORDER  BY STATUS ") or die(mysql_error());
		  
		  while($rowData = mysql_fetch_array($getSQLdata)){
			  
				////if(new DateTime($rowData['REC_DATE']) > new DateTime($dt)){
				  
				  $InstInfoSQLdata =  mysql_query("SELECT * FROM `institution_info` where INST_ID= '".$rowData['INST_ID']."'") or die(mysql_error());
				  $row = mysql_fetch_assoc($InstInfoSQLdata);
				  $date = new DateTime($rowData['REC_DATE']);							  
				  $dt = $date->format('Y-m-d H:i:s');
				  
				  if($rowData['STATUS']=="OL" || $rowData['STATUS']=="ON OL" || $rowData['STATUS']=="{OL}" || $rowData['STATUS']=="{ON OL}"){
					 $pwSource = "DC Power";
					  $peDisp = '<button type="button" class="btn btn-success btn-circle"></i></button>';
				 }else if($rowData['STATUS']=="OB" || $rowData['STATUS']=="{OB}" || $rowData['STATUS']=="{ON OB}"){
					  $pwSource = "AC Power - UPS Battery";
					  $peDisp = '<button type="button" class="btn btn-danger btn-circle"></i></button>';
				  }else{
					  $pwSource = "Unkown Power Status - UPS Check Signal";
					  $peDisp = '<button type="button" class="btn btn-danger btn-circle disabled"></i></button>';
				  }
				  print( ' 
				  <tr class="odd gradeA">
					<td>'.$row['INST_NAME'].'</td>
					<td>'.$pwSource.'</td>
					<td>'.$date->format('Y-m-d').'</td>
					<td>'.$date->format('H:i:s').'</td>
					<td>'.$peDisp.'</th>
					</tr>
				 ');
			//}
	  }
	  
	}
	
	echo ' </tbody></table>';
	
} 
else if(isset($_GET['batteryLevel'])){
	echo ' <div class="col-lg-12">
		<div class="panel panel-default">
		  <div class="panel-heading"> Battery Levels </div>
		  <!-- /.panel-heading -->
		  <div class="panel-body">
			<div class="dataTable_wrapper">
			  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
				  <tr>
					<th>Institution</th>
					<th>Battery Level</th>
					<th>Record Date</th>
					<th>Record Time</th>
					<th> </th>
				  </tr>
				</thead>
				<tbody>';
	$date = new DateTime();
	$date->modify("-60 minutes");
	$dt = $date->format('Y-m-d H:i:s');
	foreach($inst_id as $schoolID) {
				  $getSQLdata =  mysql_query("SELECT * FROM `log_battery` where INST_ID = '$schoolID' AND REC_DATE = ( Select MAX(REC_DATE) FROM log_battery where INST_ID = '$schoolID') ORDER  BY REC_DATE ASC, STATUS  ") or die(mysql_error());
		  
		  while($rowData = mysql_fetch_array($getSQLdata)){
			  
				////if(new DateTime($rowData['REC_DATE']) > new DateTime($dt)){
				  
				  $InstInfoSQLdata =  mysql_query("SELECT * FROM `institution_info` where INST_ID= '".$rowData['INST_ID']."'") or die(mysql_error());
				  $row = mysql_fetch_assoc($InstInfoSQLdata);
				  $date = new DateTime($rowData['REC_DATE']);							  
				  $dt = $date->format('Y-m-d H:i:s');
				  if(intval($rowData['STATUS'])>0 && intval($rowData['STATUS'])<=10){
					$peDisp = '<button type="button" class="btn btn-default btn-circle disabled"></i></button>';						
				  }else if(intval($rowData['STATUS'])>10 && intval($rowData['STATUS'])<=25){
					  $peDisp = '<button type="button" class="btn btn-danger btn-circle disabled"></i></button>';
					  
				  }else if(intval($rowData['STATUS'])>25 && intval($rowData['STATUS'])<=55){
					  $peDisp = '<button type="button" class="btn btn-warning btn-circle disabled"></i></button>';
					  
				  }else if(intval($rowData['STATUS'])>55 && intval($rowData['STATUS'])<=70){
					  $peDisp = '<button type="button" class="btn btn-info btn-circle disabled"></i></button>';
					  
				  }else if(intval($rowData['STATUS'])>70 && intval($rowData['STATUS'])<=100){
					  $peDisp = '<button type="button" class="btn btn-success btn-circle disabled"></i></button>';
					  
				  }

				  echo ' 
				  <tr class="odd gradeA">
					<td>'.$row['INST_NAME'].'</td>
					<td>'.$rowData['STATUS'].'% </td>
					<td>'.$date->format('Y-m-d').'</td>
					<td>'.$date->format('H:i:s').'</td>
					<td>'.$peDisp.'</th>
					</tr>
				 ';
			//}
	  }
	  
	}
	
	echo ' </tbody></table>';
}
else if(isset($_GET['network'])){
	echo ' <div class="col-lg-12">
		<div class="panel panel-default">
		  <div class="panel-heading">  Connection To Server</div>
		  <!-- /.panel-heading -->
		  <div class="panel-body">
			<div class="dataTable_wrapper">
			  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
				  <tr>
					 <th>Institution</th>
					<th>Connection</th>
					<th>Record Date</th>
					<th>Record Time</th>
					<th> </th>
				  </tr>
				</thead>
				<tbody>';
	$date = new DateTime();
	$date->modify("-60 minutes");
	$dt = $date->format('Y-m-d H:i:s');
	foreach($inst_id as $schoolID) {
				  $getSQLdata =  mysql_query("SELECT * FROM `log_internet` where INST_ID = '$schoolID' AND REC_DATE = ( Select MAX(REC_DATE) FROM log_internet where INST_ID = '$schoolID') ORDER  BY REC_DATE ASC, STATUS  ") or die(mysql_error());
		  
		  while($rowData = mysql_fetch_array($getSQLdata)){
			  
				////if(new DateTime($rowData['REC_DATE']) > new DateTime($dt)){
				  
				  $InstInfoSQLdata =  mysql_query("SELECT * FROM `institution_info` where INST_ID= '".$rowData['INST_ID']."'") or die(mysql_error());
				  $row = mysql_fetch_assoc($InstInfoSQLdata);
				  $date = new DateTime($rowData['REC_DATE']);							  
				  $dt = $date->format('Y-m-d H:i:s');
				  
				  if($rowData['STATUS'] =="Available"){
					  
					  $peDisp = '<button type="button" class="btn btn-success btn-circle disabled"></i></button>';
					  
				  }else{
					  $peDisp = '<button type="button" class="btn btn-red btn-circle disabled"></i></button>';
					  
				  }

				  echo ' 
				  <tr class="odd gradeA">
					<td>'.$row['INST_NAME'].'</td>
					<td>'.$rowData['STATUS'].' </td>
					<td>'.$date->format('Y-m-d').'</td>
					<td>'.$date->format('H:i:s').'</td>
					<td>'.$peDisp.'</th>
					</tr>
				 ';
			//}
	  }
	  
	}
	
	echo ' </tbody></table>';
}
else if(isset($_GET['internet'])){
	echo ' <div class="col-lg-12">
		<div class="panel panel-default">
		  <div class="panel-heading">  Internt Service Provider</div>
		  <!-- /.panel-heading -->
		  <div class="panel-body">
			<div class="dataTable_wrapper">
			  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
				  <tr>
					<th>Institution</th>
					<th>ISP</th>
					<th>Record Date</th>
					<th>Record Time</th>
					<th> </th>
				  </tr>
				</thead>
				<tbody>';
	$date = new DateTime();
	$date->modify("-60 minutes");
	$dt = $date->format('Y-m-d H:i:s');
	foreach($inst_id as $schoolID) {
				  $getSQLdata =  mysql_query("SELECT * FROM `log_internet_source` where INST_ID = '$schoolID' AND REC_DATE = ( Select MAX(REC_DATE) FROM log_internet_source where INST_ID = '$schoolID') ORDER  BY REC_DATE ASC, STATUS  ") or die(mysql_error());
		  
		  while($rowData = mysql_fetch_array($getSQLdata)){
			  
				////if(new DateTime($rowData['REC_DATE']) > new DateTime($dt)){
				  
				  $InstInfoSQLdata =  mysql_query("SELECT * FROM `institution_info` where INST_ID= '".$rowData['INST_ID']."'") or die(mysql_error());
				  $row = mysql_fetch_assoc($InstInfoSQLdata);
				  $date = new DateTime($rowData['REC_DATE']);							  
				  $dt = $date->format('Y-m-d H:i:s');
				  
				  if($rowData['STATUS'] =="ISP NOT AVAILABLE"){
					  
					  $peDisp = '<button type="button" class="btn btn-red btn-circle disabled"></i></button>';
					  
				  }else{
					  
					  $peDisp = '<button type="button" class="btn btn-success btn-circle disabled"></i></button>';
				  }

				  echo ' 
					  <tr class="odd gradeA">
						<td>'.$row['INST_NAME'].'</td>
						<td>'.strtoupper($rowData['STATUS']).'</td>
						<td>'.$date->format('Y-m-d').'</td>
						<td>'.$date->format('H:i:s').'</td>
						<td>'.$peDisp.'</td>
						</tr>
					 ';
			//}
	  }
	  
	}
	
	echo ' </tbody></table>';
}
else if(isset($_GET['alerts'])){
	echo ' <div class="col-lg-12">
		<div class="panel panel-default">
		  <div class="panel-heading">  Red Alerts</div>
		  <!-- /.panel-heading -->
		  <div class="panel-body">
			<div class="dataTable_wrapper">
			  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
				  <tr>
					<th>Institution</th>
					<th>Type</th>
					<th>Comment</th>
					<th>Status</th>
					<th>Record Date</th>
					<th>Record Time</th>
					<th>Action</th>
					
					</tr>
				</thead>
				<tbody>';
	$date = new DateTime();
	$date->modify("-60 minutes");
	$dt = $date->format('Y-m-d H:i:s');
	foreach($inst_id as $schoolID) {
				  $getSQLdata =  mysql_query("SELECT * FROM `red_alert` where INST_ID = '$schoolID' AND DATE_OF_ALERT = ( Select MAX(DATE_OF_ALERT) FROM red_alert where INST_ID = '$schoolID') ORDER  BY DATE_OF_ALERT ASC, CURRENT_STATUS  ") or die(mysql_error());
		  
		  while($rowData = mysql_fetch_array($getSQLdata)){
			  
				////if(new DateTime($rowData['REC_DATE']) > new DateTime($dt)){
				  
				  $InstInfoSQLdata =  mysql_query("SELECT * FROM `institution_info` where INST_ID= '".$rowData['INST_ID']."'") or die(mysql_error());
				  $row = mysql_fetch_assoc($InstInfoSQLdata);
				  $date = new DateTime($rowData['LAST_UPDATED']);							  
				  $dt = $date->format('Y-m-d H:i:s');
				  

				  echo ' 
					  <tr class="odd gradeA">
					  <td>'.$row['INST_NAME'].'</td>
					<td>'.$rowData['ALERT_TYPE'].'</td>
					<td>'.$rowData['COMMENT'].'</td>
					<td>'.$rowData['CURRENT_STATUS'].'</td>
					<td>'.$date->format('Y-m-d').'</td>
					<td>'.$date->format('H:i:s').'</td>
					<td><button type="button" class="btn btn-danger" data-toggle="modal" onclick="callPopup(\''.$schoolID.'\',\''.$rowData['COL_NUM'].'\')">Update</button></td>
					</tr>
					 ';
			//}
	  }
	  
	}
	
	echo ' </tbody></table>';
}

?>