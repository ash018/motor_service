<table class="table table-sm table-bordered">
	<thead>
		<tr>
			<th style="text-align: center">StaffId</th>
			<th style="text-align: center">TechnicianName</th>
			<th style="text-align: center">WarrantyServiceTarget</th>
			<th style="text-align: center">WARRANTY Ach</th>
			<th style="text-align: center">%</th>
			<th style="text-align: center">PostWarrantyServiceTarget</th>
			<th style="text-align: center">POSTWARRANTY Ach</th>
			<th style="text-align: center">%</th>
		</tr>
	</thead>
	<tbody>
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
			
			$query = "Exec usp_EngWiseAllTsaPerformance '$ttyinput', '$period'";										
			//echo $query;
			$result = odbc_exec($connection,$query);		
			
			
			while($row = odbc_fetch_array($result)){
				/*
				if($row['IsVerify'] == 1) {
					echo '<tr>';
						echo '<td style="text-align: center">'. $row['StaffId'].'</td>';
						echo '<td style="text-align: center">'. $row['TechnicianName'].'</td>';
						echo '<td style="text-align: center">'. $row['WarrantyServiceTarget'].'</td>';
						echo '<td style="text-align: center">'. $row['WARRANTY'].'</td>';
						echo '<td style="text-align: center">'. number_format(($row['WARRANTY']/$row['WarrantyServiceTarget'])*100,2).'</td>';
						echo '<td style="text-align: center">'. $row['PostWarrantyServiceTarget'].'</td>';
						echo '<td style="text-align: center">'. $row['POSTWARRANTY'].'</td>';
						echo '<td style="text-align: center">'. number_format(($row['POSTWARRANTY']/$row['PostWarrantyServiceTarget'])*100,2).'</td>';
					echo '</tr>';
				}
				*/
				
				//if($row['IsVerify'] == -1){
					echo '<tr>';
						echo '<td style="text-align: center">'. $row['StaffId'].'</td>';
						echo '<td style="text-align: center">'. $row['TechnicianName'].'</td>';
						echo '<td style="text-align: center">'. $row['WarrantyServiceTarget'].'</td>';
						echo '<td style="text-align: center">'. $row['WARRANTY'].'</td>';
						echo '<td style="text-align: center">'. number_format(($row['WARRANTY']/$row['WarrantyServiceTarget'])*100,2).'</td>';
						echo '<td style="text-align: center">'. $row['PostWarrantyServiceTarget'].'</td>';
						echo '<td style="text-align: center">'. $row['POSTWARRANTY'].'</td>';
						echo '<td style="text-align: center">'. number_format(($row['POSTWARRANTY']/$row['PostWarrantyServiceTarget'])*100,2).'</td>';
					echo '</tr>';
				//}
					
			}
		?>
	</tbody>
</table>