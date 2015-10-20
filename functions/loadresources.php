<?php
include "../secure/talk2db.php";
if(isset($_GET['db'])){
	global $couchUrl;
	global $facilityId;
	try{
		$resources = new couchClient($couchUrl, "ttel_resources");
		$viewResults = $resources->include_docs(TRUE)->getView('api', 'allResources');
		for($rcnt=0;$rcnt<sizeof($viewResults->rows);$rcnt++){
			$doc = $viewResults->rows[$rcnt]->doc;
			echo "<tr class='odd gradeB'>
							<td style='width: 30%;'>".$doc->title."</td>
							<td>".$doc->description."</td>
							<td>".$doc->author."</td>
							<td>";
		  if(isset($doc->views)){
			  print($doc->views);
		  }else{
			  print('0');
		  }
		  echo "</td>";
		  if($doc->legacy->type=='mp3'){
			   print("<td><a href='viewResource.php?database=ttel_resources&resid=".$doc->_id."' target='_blank' class='btn btn-lg btn-success glyphicon glyphicon-music'></a></td>");
		   }
		   else if($doc->legacy->type=='mp4'||$doc->legacy->type=='avi'||$doc->legacy->type=='flv'){
			print("<td><a href='viewResource.php?database=ttel_resources&resid=".$doc->_id."' target='_blank'  class='btn btn-lg btn-info glyphicon glyphicon-facetime-video'></a></td>");
		   }
		   else{
			   print("<td><a href='viewResource.php?database=ttel_resources&resid=".$doc->_id."' target='_blank'  class='btn btn-lg btn-warning glyphicon glyphicon-book'></a></td>");
		   }
		  echo "</tr>
	   '";
			
		}
	}catch(Exception $err){
		
	}
		
}
if(isset($_GET['lang'])){
	//$language = $_GET['lang'];
	//$level = $_GET['level'];
	$language = "en";
	$level = "P4";
	global $couchUrl;
	global $facilityId;
	$resources = new couchClient($couchUrl, "resources");
	$viewResults = $resources->include_docs(TRUE)->getView('api', 'allResources');
	
		for($rcnt=0;$rcnt<sizeof($viewResults->rows);$rcnt++){
					$doc = $viewResults->rows[$rcnt]->doc;
					///if($doc->language==$language && in_array($level,$doc->levels)){
						echo "<tr class='odd gradeB'>
							<td style='width: 30%;'>".$doc->title."</td>
							<td>".$doc->description."</td>
							<td>".$doc->author."</td>
							<td>";
							if(isset($doc->views)){
								print($doc->views);
							}else{
								print('0');
							}
							echo "</td>";
							if($doc->legacy->type=='mp3'){
								 print("<td><a href='viewResource.php?database=resources&resid=".$doc->_id."' target='_blank' class='btn btn-lg btn-success glyphicon glyphicon-music'></a></td>");
							 }
							 else if($doc->legacy->type=='mp4'||$doc->legacy->type=='avi'||$doc->legacy->type=='flv'){
 							  print("<td><a href='viewResource.php?database=resources&resid=".$doc->_id."' target='_blank'  class='btn btn-lg btn-info glyphicon glyphicon-facetime-video'></a></td>");
							 }
							 else{
								 print("<td><a href='viewResource.php?database=resources&resid=".$doc->_id."' target='_blank'  class='btn btn-lg btn-warning glyphicon glyphicon-book'></a></td>");
							 }
							echo "</tr>
						 '";
					///}
		}
	
}
?>