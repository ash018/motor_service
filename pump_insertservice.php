<?php 
	///error_reporting(E_ALL);	
	include("db1.php");	
	$ServiceData = file_get_contents('php://input');
	//$obj = json_decode($json,true);
	
	$EntryDate = date('Y-m-d');
	$EditDate = date('Y-m-d');
	
	$ServiceData = json_decode($_POST['ServiceData']);
	
	
	
	foreach($ServiceData as $item) {		
		//echo "<pre />"; print_r($item); exit();
		$sql = "Insert INTO ServiceMaster Values ('".$item->customername."','".$item->address."','".$item->mobileno."','".$item->portfolio."','".$item->model."','2019-01-01','2019-01-01','".$item->complaindate."','".$item->attendate."','1','1','1','0','1','1','1','".$item->servicecharge."','".$item->mrno."','0','2019-12-05','2019-12-05')";		
		odbc_exec($connection, $sql);
	}
	//database connection close
    odbc_close($connection);
	
	

?>