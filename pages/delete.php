<?php session_start(); include "../secure/talk2db.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
<?php
if(isset($_GET['resid']))
{
	global $couchUrl;
	global $facilityId;
	$resources = new couchClient($couchUrl, "ttel_resources");
	$doc = $resources->getDoc($_GET['resid']);
	$resources->deleteDoc($doc);
	echo '<script type="text/javascript">alert("Successfully Deleted");</script>';
                        
}
?>
</head>

<body>
</body>
</html>