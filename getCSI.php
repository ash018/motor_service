<?php		
error_reporting(0);
include("db.php");
if($_POST['ttyinput']!= ""){
$ttyinput = $_POST['ttyinput'];
}else{
	$ttyinput = "%";
}
if($_POST['dateinput']!= ""){
	$period = $_POST['dateinput'];
}else{
	$period = date('Y-m-01');
}


$query = "Exec usp_techCSI '$ttyinput', '$period'";										
$result = odbc_exec($connection,$query);		

$sl = 1;
$csiResult = '';
while($row = odbc_fetch_array($result)){
	$csiResult = $row['CSI_Percentage'];
}
echo $csiResult;			
?>
		



	

