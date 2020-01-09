<?php 
		
	include("db.php");	
	if($_POST['UserId']!= ""){
		$UserId = $_POST['UserId'];
	}else{
		$UserId = "%";
	}
	$period = date('Y-m-01');
	$query = "Exec usp_budgetVsAch '$UserId', '$period'";										
	$result = odbc_exec($connection,$query);
	
	$stores = array();
	while($row = odbc_fetch_array($result)) {
		$temp = array();
		$temp['Service'] = $row['Service'];
		$temp['Target'] = $row['Target'];
		$temp['Ach'] = $row['Ach'];	
		$stores[] = $temp;
	}
	
	echo json_encode($stores);

?>