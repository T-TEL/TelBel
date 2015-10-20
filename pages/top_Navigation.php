<?
echo '                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">;';
                    
						$cnt1 = 0;
						foreach($inst_id as $schoolID) {
							$getSQLdata =  mysql_query("SELECT * FROM `log_battery` where INST_ID = '$schoolID' and REC_DATE = (Select MAX(REC_DATE) FROM log_battery where INST_ID = '$schoolID')") or die(mysql_error());
							while($rowData = mysql_fetch_array($getSQLdata)){
								echo '<li>
                            <a href="#INST_ID='.$schoolID.'">
                                <div>
                                    <p>
                                        <strong>'.$inst_name[$cnt1].'</strong>
                                        <span class="pull-right text-muted">'.$rowData["STATUS"].'% Full</span>
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
                   echo' <li>
                            <a class="text-center" href="#">
                                <strong>See All Battery Levels</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">';
                     
							$getSQLdata =  mysql_query("SELECT * FROM `red_alert` where CURRENT_STATUS ='new' OR CURRENT_STATUS='resolving' order by DATE_OF_ALERT") or die(mysql_error());
							while($rowData = mysql_fetch_array($getSQLdata)){
								echo '<li>
                            <a href="#">
                                <div>
                             <i class="fa '.red_alert_types($rowData['ALERT_TYPE']).' fa-fw"></i> '.$rowData['COMMENT'].'                                    <span class="pull-right text-muted small">'.getDateFromNow($rowData['DATE_OF_ALERT']).'</span>
                                </div>
                            </a>
                        </li>
                        </li> <li class="divider"></li>';
							
						}
                        echo '<li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>';
            ?>