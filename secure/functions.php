<?php

function saveActionLog($user,$action){
	mysql_query("INSERT INTO`platform_log` (`COL_NUM`, `USER_ID`, `ACTION`, `REC_DATE`) VALUES (NULL, '".$_GET['system_user']."', '".$action."', CURRENT_TIMESTAMP)") or die(mysql_error());	
}

function battery_Bar($percentage){
	if($percentage <= 10){
		return '" style="background-color:#000;';	
	}
	if($percentage <= 25){
		return "progress-bar-danger";
		
	}else if($percentage <= 55){
		return "progress-bar-warning";
		
	}else if($percentage <= 70){
		return "progress-bar-info";
	}
	else if($percentage <= 100){
		return "progress-bar-success";
	}else{
		return '" style="background-color:#000;';	
	}
}

function red_alert_types($alert_type){
	if($alert_type==""){
		/// Internet Problem
		return "fa-signal";
	}else if($alert_type==""){
		/// System Error
		return "fa-exclamation-triangle";
	}else if($alert_type=="Battery_low"){
		///// Battery Low
		return "fa-database";
	}else if($alert_type==""){
		// Network Problem
		return "fa-rss";
	}else if($alert_type==""){
		/// Network
		return "fa-sitemap";
	}else if($alert_type==""){
		/// Power OFF Short Time
		return "fa-power-off";
	}else if($alert_type==""){
		/// Power Down For Long
		return "fa-linux";
	}else if($alert_type==""){
		//// Wifi Up
		return "fa-wifi";
	}else if($alert_type==""){
		//// SSH Working
		return "fa-sellsy";
	}else if($alert_type==""){
		///// SSH Not Working
		return "fa-stumbleupon";
	}else
	{
		return "fa-cog fa-spin";
	}
}

function getDateFromNow($oldDate){
	$date1 = new DateTime();
	$date2 = new DateTime($oldDate);
	$interval = $date1->diff($date2);
	$dif="";
	if($interval->m >0 && $interval->m < 12){
		$dif = $dif. $interval->m." mnt ";
	}
	if($interval->d >0){
		$dif = $dif.$interval->d." days ";
	}
	if($interval->h >0 && $interval->h < 12){
		$dif = $dif.$interval->h." hrs ";
	}
	if($interval->i >0 && $interval->i < 60){
		$dif = $dif.$interval->i." min ";
	}
	if($interval->s >0 && $interval->s < 60){
		$dif = $dif.$interval->s." sec ";
	}
	return $dif.' ago';
	///echo getDateFromNow("2015-09-24 04:12:01");
	//echo date('Y-m-d h:i:s');
}

function getBatteryLevels($inst_id){
	$cnt1 = 0;
	foreach($inst_id as $schoolID) {
		$getSQLdata =  mysql_query("SELECT CAST(STATUS AS UNSIGNED) as STATUS FROM `log_battery` where INST_ID = '$schoolID' and REC_DATE = (Select MAX(REC_DATE) FROM log_battery where INST_ID = '$schoolID')") or die(mysql_error());
		while($rowData = mysql_fetch_array($getSQLdata)){
			echo '<li>
		<a href="#INST_ID='.$schoolID.'">
			<div>
				<p>
					<strong>'.$inst_name[$cnt1].'</strong>
					<span class="pull-right text-muted">'.$rowData["STATUS"].' % Full</span>
				</p>
				<div class="progress progress-striped active">
					<div class="progress-bar '.battery_Bar(intval($rowData["STATUS"])).'" role="progressbar" aria-valuenow="'.$rowData["STATUS"].'" aria-valuemin="0" aria-valuemax="100" style="width:'.$rowData["STATUS"].'%">
						<span class="sr-only">Battery Life '.$rowData["STATUS"].'%</span>
					</div>
				</div>
			</div>
		</a>
	</li> <li class="divider"></li>';
		}
						}
}

function getRedAlerts(){
	$getSQLdata =  mysql_query("SELECT * FROM `red_alert` where CURRENT_STATUS ='new' OR CURRENT_STATUS='resolving' order by DATE_OF_ALERT") or die(mysql_error());
	  while($rowData = mysql_fetch_array($getSQLdata)){
		  echo '<li>
	  <a href="#">
		  <div>
	   <i class="fa '.red_alert_types($rowData['ALERT_TYPE']).' fa-fw"></i> '.$rowData['COMMENT'].'  <span class="pull-right text-muted small">'.getDateFromNow($rowData['DATE_OF_ALERT']).'</span>
		  </div>
	  </a>
	</li>
	</li> <li class="divider"></li>';
	  
			}
}


function table_powerSource($institutionID){
	$htmlTable = '<br />
<br /><div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="power_'.$institutionID.'_dataTables">
                              <thead>
                                <tr>
                                  <th>Source</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th> </th>
                                </tr>
                              </thead>
                              <tbody>';
					$getSQLdata =  mysql_query("SELECT * FROM `log_power` WHERE INST_ID = '".$institutionID."' order by REC_DATE") or die(mysql_error());
							while($rowData = mysql_fetch_array($getSQLdata)){
								$date = new DateTime($rowData['REC_DATE']);							  
							  	$dt = $date->format('Y-m-d H:i:s');
								
								if($rowData['STATUS']=="OL" || $rowData['STATUS']=="ON OL"){
									$pwSource = "DC Power";
									$peDisp = '<button type="button" class="btn btn-success btn-circle"></i></button>';
								}else if($rowData['STATUS']=="OB"){
									$pwSource = "AC Power - UPS Battery";
									$peDisp = '<button type="button" class="btn btn-danger btn-circle"></i></button>';
								}else{
									$pwSource = "Unkown Power Status - UPS Check Signal";
									$peDisp = '<button type="button" class="btn btn-danger btn-circle disabled"></i></button>';
								}
								$htmlTable = $htmlTable.'<tr class="odd data1'.$institutionID.'">                                 
								<td>'.$pwSource.'</td>
                                  <td>'.$date->format('Y-m-d').'</td>
                                  <td>'.$date->format('H:i:s').'</td>
								  <td>'.$peDisp.'</th>
								  </tr>
                               ';
							}
                              
                           $htmlTable = $htmlTable.'</tbody>
                            </table>
                          </div>';
						  
			return $htmlTable;
}


function table_network($institutionID){
	$htmlTable = '<br />
<br /><div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="network_'.$institutionID.'_dataTables">
                              <thead>
                                <tr>
                                  <th>Level</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th> </th>
                                </tr>
                              </thead>
                              <tbody>';
					$getSQLdata =  mysql_query("SELECT * FROM `log_internet` WHERE INST_ID = '".$institutionID."' order by REC_DATE") or die(mysql_error());
							while($rowData = mysql_fetch_array($getSQLdata)){
								$date = new DateTime($rowData['REC_DATE']);							  
							  	$dt = $date->format('Y-m-d H:i:s');
								
								if($rowData['STATUS'] =="Available"){
									
									$peDisp = '<button type="button" class="btn btn-success btn-circle disabled"></i></button>';
									
								}else{
									$peDisp = '<button type="button" class="btn btn-red btn-circle disabled"></i></button>';
									
								}
								
								$htmlTable = $htmlTable.'<tr class="odd data2'.$institutionID.'">                                 
								<td>'.strtoupper($rowData['STATUS']).' </td>
                                  <td>'.$date->format('Y-m-d').'</td>
                                  <td>'.$date->format('H:i:s').'</td>
								  <td>'.$peDisp.'</th>
								  </tr>
                               ';
							}
                              
                           $htmlTable = $htmlTable.'</tbody>
                            </table>
                          </div>';
						  
			return $htmlTable;
}


function table_batteryLevel($institutionID){
	$htmlTable = '<br />
<br /><div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="battery_'.$institutionID.'_dataTables">
                              <thead>
                                <tr>
                                  <th>Level</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th> </th>
                                </tr>
                              </thead>
                              <tbody>';
					$getSQLdata =  mysql_query("SELECT * FROM `log_battery` WHERE INST_ID = '".$institutionID."' order by REC_DATE") or die(mysql_error());
							while($rowData = mysql_fetch_array($getSQLdata)){
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
								
								$htmlTable = $htmlTable.'<tr class="odd data2'.$institutionID.'">                                 
								<td>'.$rowData['STATUS'].'% </td>
                                  <td>'.$date->format('Y-m-d').'</td>
                                  <td>'.$date->format('H:i:s').'</td>
								  <td>'.$peDisp.'</th>
								  </tr>
                               ';
							}
                              
                           $htmlTable = $htmlTable.'</tbody>
                            </table>
                          </div>';
						  
			return $htmlTable;
}

function table_internetSource($institutionID){	
	$htmlTable = '<br />
<br /><div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="int_'.$institutionID.'_dataTables">
                              <thead>
                                <tr>
                                  <th>ISP</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                </tr>
                              </thead>
                              <tbody>';
					$getSQLdata =  mysql_query("SELECT * FROM `log_internet_source` WHERE INST_ID = '".$institutionID."' order by REC_DATE ") or die(mysql_error());
							while($rowData = mysql_fetch_array($getSQLdata)){
								$date = new DateTime($rowData['REC_DATE']);							  
							  	$dt = $date->format('Y-m-d H:i:s');
								///echo "Here";
								$htmlTable = $htmlTable.'<tr class="odd data4'.$institutionID.'">                                 
								<td>'.$rowData['STATUS'].'</td>
                                  <td>'.$date->format('Y-m-d').'</td>
                                  <td>'.$date->format('H:i:s').'</td>
								  </tr>
                               ';
							}
                              
                           $htmlTable = $htmlTable.'</tbody>
                            </table>
                          </div>';
						  
			return $htmlTable;

	
}


function table_RedAlerts($institutionID){	
	$htmlTable = '<br />
<br /><div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="redAlert_'.$institutionID.'_dataTables">
                              <thead>
                                <tr>
                                  <th>Type</th>
                                  <th>Info.</th>
                                  <th>Status</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                </tr>
                              </thead>
                              <tbody>';
					$getSQLdata =  mysql_query("SELECT * FROM `red_alert` WHERE INST_ID = '".$institutionID."' order by DATE_OF_ALERT ") or die(mysql_error());
							while($rowData = mysql_fetch_array($getSQLdata)){
								$date = new DateTime($rowData['DATE_OF_ALERT']);							  
							  	$dt = $date->format('Y-m-d H:i:s');
								///echo "Here";
								$htmlTable = $htmlTable.'<tr class="odd data5'.$institutionID.'"> 
								<td>'.$rowData['ALERT_TYPE'].'</td>
								<td>'.$rowData['COMMENT'].'</td>                                
								<td>'.$rowData['CURRENT_STATUS'].'</td>
                                  <td>'.$date->format('Y-m-d').'</td>
                                  <td>'.$date->format('H:i:s').'</td>
								  </tr>
                               ';
							}
                              
                           $htmlTable = $htmlTable.'</tbody>
                            </table>
                          </div>';
						  
			return $htmlTable;

	
}



function table_InstitutionInfo($institutionID){	
	$htmlTable = '<br />
<br /><div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="instInfo'.$institutionID.'_dataTables">
                              <thead>
                                <tr>
                                  <th>Type</th>
                                  <th>Info.</th>
                                </tr>
                              </thead>
                              <tbody>';
					$getSQLdata =  mysql_query("SELECT * FROM `institution_info` WHERE INST_ID = '".$institutionID."' ") or die(mysql_error());	
					
							while($rowData = mysql_fetch_array($getSQLdata)){
								$date = new DateTime($rowData['DATE_OF_ALERT']);							  
							  	$dt = $date->format('Y-m-d H:i:s');
								///echo "Here";
								$htmlTable = $htmlTable.'
								<tr>
									<td>1. Name</td>
									<td>'.$rowData['INST_NAME'].'</td>
								</tr>
								<tr>
									<td>2. Region</td>
									<td>'.$rowData['INST_REGION'].'</td>
								</tr>
								<tr>
									<td>3. District</td>
									<td>'.$rowData['INST_DISTRICT'].'</td>
								</tr>
								<tr>
									<td>4. District</td>
									<td>'.$rowData['INST_PHYS_ADDRESS'].'</td>
								</tr>
								<tr>
									<td>5. Address</td>
									<td>'.$rowData['INST_POST_ADDRESS'].'</td>
									
								</tr>
								<tr>
									<td>7. Date Of Ext.</td>
									<td>'.$rowData['INST_DATE_EXTABLISHED'].'</td>
									
								</tr>
								<tr>
									<td>6. Phone</td>
									<td>'.$rowData['INST_PHONE_NO'].'</td>
									
								</tr>
								<tr>
									<td>8. Port</td>
									<td>'.$rowData['INST_TUNNEL'].'</td>
									
								</tr>
								<tr>
									<td>9. Last Update</td>
									<td>'.$rowData['LAST_UPDATE'].'</td>
									
								</tr>
                               ';
							}
                              
                           $htmlTable = $htmlTable.'</tbody>
                            </table>
                          </div>';
						  
			return $htmlTable;

	
}

?>