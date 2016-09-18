<?php include_once('../secure/talk2db.php');include_once('../secure/functions.php');?>
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

	 <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../css/bootstrap-switch.css" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style type="text/css">
	body {
    padding-top: 50px;
}
.dropdown.dropdown-lg .dropdown-menu {
    margin-top: -1px;
    padding: 6px 20px;
}
.input-group-btn .btn-group {
    display: flex !important;
}
.btn-group .btn {
    border-radius: 0;
    margin-left: -1px;
}
.btn-group .btn:last-child {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}
.btn-group .form-horizontal .btn[type="submit"] {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.form-horizontal .form-group {
    margin-left: 0;
    margin-right: 0;
}
.form-group .form-control:last-child {
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}

@media screen and (min-width: 768px) {
    #adv-search {
        width: 500px;
        margin: 0 auto;
    }
    .dropdown.dropdown-lg {
        position: static !important;
    }
    .dropdown.dropdown-lg .dropdown-menu {
        min-width: 500px;
    }
}
</style>
</head>

<body>

  <div id="wrapper">
  
     <div class="container"  style="background-color:#FFF;">
       <div class="row"  style="background-color:rgb(239, 62, 60);"><img src="../images/Ttel_banner.jpg" width="360" height="108" alt="T-Tel"></div>
               <div class="row">
               <div class="col-lg-12" style="margin-top:50px; margin-bottom:20px;">
                <!--<div class="col-sm-6"><h3><input type="checkbox" name="my-checkbox" id="my-checkbox" onChange="ttel_resources()" > Include OLE Ghana Resources </h3></div> -->
                <!--<div class="col-sm-6"><h3><input type="checkbox" name="my-checkbox2" checked> Include T-Tel Resources </h3></div>-->
                
                
               <!--<div class="col-sm-6 col-lg-4">
            
            <div class="row">
              <div class="col-sm-6">
                <input type="checkbox" name="my-checkbox" checked>
                
              </div>
            </div>
          </div>-->
                    <!--<div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Search for resource" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="filter">Filter by</label>
                                    <select class="form-control" id="resGroup" name="resGroup">
                                        <option value="0" selected>All Resources</option>
                                        <option value="1">T-Tel Resources</option>
                                        <option value="2">OLE Ghana Resources</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="resourceType">Resource Type</label>
                                    <select class="form-control" id="resType" >
                                        <option value="0" selected>All Types</option>
                                        <option value="1">PDF / Docs</option>
                                        <option value="2">PUBS </option>
                                        <option value="3">Multimedia </option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Contains the words</label>
                                    <input class="form-control" type="text"  id="resWords" />
                                  </div>
                                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </form>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>-->
            
                 </div>
	   </div>	
                <div class="row">
                    <div class="col-lg-12">
                      <div class="col-lg-12">
                        <div class="panel panel-default">
                          <div class="panel-heading"> </div>
                          <!-- /.panel-heading -->
                          <div class="panel-body">
                          <!--<div id="results">-->
                            <div class="dataTable_wrapper">
                              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                  <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Author</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody id="tbody">
                                  <?php
							  
								/*echo ' 
								<tr class="odd gradeA">
                                  <td>'.$row['INST_NAME'].'</td>
                                  <td>'.strtoupper($rowData['STATUS']).'</td>
                                  <td>'.$date->format('Y-m-d').'</td>
                                  <td>'.$date->format('H:i:s').'</td>
								  <td>'.$peDisp.'</td>
								  <td></td>
								  </tr>
                               ';
							*/
							
                              ?>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.table-responsive -->
                         <!-- </div>-->
                          </div>
                          <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                      </div>
                    </div>
</div>
     </div>
</div>
        <!-- Navigation -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

   
    <script src="../js/bootstrap-switch.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
     <script>
    $(document).ready(function() {
		ttel_resources();
		window.alert = function() {};
        //$('#dataTables-example').DataTable({
         //       responsive: true
        //});
		$("[name='my-checkbox']").bootstrapSwitch({
		onText: "YES",
        offText:"NO"
		});
		
    });
	
	function ttel_resources(){
		if($("[name='my-checkbox']").is(':checked')){
			
			$("#tbody").load("../functions/loadresources.php?lang=en&sLevel=&sSubject=",function(){
				 $('#dataTables-example').DataTable({
					responsive: true
			 },function(){
				 
			 });
			});
			
		}else{
			
			$("#tbody").load("../functions/loadresources.php?adminDB=ttel",function(){
				 $('#dataTables-example').DataTable({
					responsive: true
			 },function(){
				 
			 });
			});
			
		}
	}
	
    </script>

</body>

</html>
