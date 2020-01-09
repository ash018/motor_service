
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
			
			
			$query = "Exec usp_service_ratio_only_eng '$ttyinput', '$period'";										
			$result = odbc_exec($connection,$query);		
			
			$sl = 1;
			$TotalAch = '';
			while($row = odbc_fetch_array($result)){
				$TotalAch = $row['ServiceRatio'];
			}
			//var_dump($TotalAch);
			echo $TotalAch;
		?>
		