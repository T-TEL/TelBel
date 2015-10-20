<?php include('../secure/talk2db.php');include_once('../secure/functions.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>T-Tel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">T-Tel System</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                    <?php
						print(getBatteryLevels($inst_id))
                    ?>
                          <li>
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
                    <ul class="dropdown-menu dropdown-alerts">
                     <?php
						print(getRedAlerts());
                    ?>
                        <li class="divider"></li>
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
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
			<?php include('navigation.php');?>
            
            <!-- /.navbar-static-side -->
        </nav>

      <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-database fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    <?php
							  $date = new DateTime();
							  $date->modify("-60 minutes");
							  $dt = $date->format('Y-m-d H:i:s');
							  ///$tm = $date->format('H:i:s');
							  ///print_r($dt);
							  //// 
							  $numbr =0;
							  $getSQLdata =  mysql_query("SELECT * FROM `log_battery` where REC_DATE >='".$dt."' AND STATUS >'90' GROUP BY INST_ID") or die(mysql_error());
							  while($rowData = mysql_fetch_array($getSQLdata)){
								   $numbr++;
							  }
							 print($numbr);
                                    ?>
                                    </div>
                                    <div>Fully Charged Batteries !</div>
                                </div>
                            </div>
                        </div>
                        <a href="batteryLevels.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-signal fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">   <?php
							  $date = new DateTime();
							  $date->modify("-60 minutes");
							  $dt = $date->format('Y-m-d H:i:s');
							  ///$tm = $date->format('H:i:s');
							  ///print_r($dt);
							  ///REC_DATE >='".$dt."' AND
							  $numbr =0;
							  $getSQLdata =  mysql_query("SELECT * FROM `log_internet` where STATUS not like '%Not Connected%' 
							  group by INST_ID") or die(mysql_error());
							    while($rowData = mysql_fetch_array($getSQLdata)){
								   $numbr++;
							  }
							 print($numbr);
							 
							  
                                    ?></div>
                                    <div>Internet Connected !</div>
                                </div>
                            </div>
                        </div>
                        <a href="internetSource.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bell fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                            <?php
							$numbr =0;
							$getSQLdata =  mysql_query("SELECT * FROM `red_alert` where CURRENT_STATUS ='new' OR CURRENT_STATUS='resolving' order by DATE_OF_ALERT") or die(mysql_error());
							 while($rowData = mysql_fetch_array($getSQLdata)){
								   $numbr++;
							  }
							 print($numbr);
							 
                    ?></div>
                                    <div>Alerts Tickets!</div>
                                </div>
                            </div>
                        </div>
                        <a href="liveMonitor.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Battery Levels
                        </div>
                       			<div class="panel-body">
                                    <div id="morris-area-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                  </div>
                            <!-- /.row -->
              </div>
                   
          <div class="col-lg-4">
                    <!-- /.panel -->
            <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Alert Tickets Summary
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                            <a href="#" class="btn btn-default btn-block">View Details</a>
                        </div>
                        <!-- /.panel-body -->
            </div>
            <!-- /.panel .chat-panel -->
                </div>
                   
                   
                   
                   
                   
                   
                   
        </div>
                  <!-- /.panel --><!-- /.panel -->
      </div>
                <!-- /.col-lg-8 -->
                
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <?php 
	print('<script type="text/javascript"> 
	$(function() {');
	echo '  Morris.Donut({
        element: \'morris-donut-chart\',
        data: [';
	$getSQLdata =  mysql_query("SELECT Count(ALERT_TYPE) as NoOfAlerts ,CURRENT_STATUS FROM `red_alert` group by CURRENT_STATUS") or die(mysql_error());
	while($rowData = mysql_fetch_array($getSQLdata)){
	  echo '{
            label: "'.$rowData['CURRENT_STATUS'].'",
            value: '.$rowData['NoOfAlerts'].'
        },';
	}
	echo '],
        resize: true
    });';
	
	
	echo '
	
	Morris.Bar({
        element: \'morris-area-chart\',
        data: [{';
	$cnt1 = 0;
	$facilityNames = array();
	$facilityIDs = array();
	foreach($inst_id as $schoolID) {
	$getSQLdata =  mysql_query("SELECT * FROM `log_battery` where INST_ID = '$schoolID' and REC_DATE = (Select MAX(REC_DATE) FROM log_battery where INST_ID = '$schoolID') ") or die(mysql_error());
		  while($rowData = mysql_fetch_array($getSQLdata)){
			  $dt = new DateTime($rowData['REC_DATE']);
			  $date = $dt->format('Y/m/d');
			  $formObject = "
			  period: '".$date."' ,";
			  $formObject = $formObject.'
			  _'.$schoolID.':'.$rowData['STATUS'].',';
			  
			  $getSQLInstInfodata =  mysql_query("SELECT INST_NAME FROM `institution_info` where INST_ID ='".$schoolID."'") or die(mysql_error());
			  $row = mysql_fetch_assoc($getSQLInstInfodata);
			  array_push($facilityNames,$row['INST_NAME']);
			  array_push($facilityIDs,'_'.$schoolID);

	  	}
	  }
	
	 print($formObject.'}');
	
	/*
	TODO GRAPH NOT SHOWING
	  echo '{
            period:\'2011 Q2\',
            iphone: 5670,
            ipad: 4293,
            itouch: 1881
        },';
	*/
	
	print ("],
        xkey: 'period',
        ykeys:[");
		/// ['iphone', 'ipad', 'itouch'],
        foreach($facilityIDs as $facid){
			print("'".$facid."',");
		}
		print ("],");
		print ("labels:[");
		///['iPhone', 'iPad', 'iPod Touch'],
		foreach($facilityNames as $faci){
			print("'".$faci."',");
		}
		print ("],");
        print("pointSize: 2, hideHover: 'auto',resize: true 
		
		});");
	
	echo '})
	</script>';
	?>

</body>

</html>
