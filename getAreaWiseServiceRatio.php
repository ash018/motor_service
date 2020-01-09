<table class="table table-sm table-bordered">
	<thead>
		<tr>
			<th style="text-align: center">Area</th>
			<th style="text-align: center">Total Budget</th>
			<th style="text-align: center">Total Ach</th>
			<th style="text-align: center">%</th>
		</tr>
	</thead>
	<tbody>
		<?php
		
			error_reporting(0);
		
			include("db.php");
			
			if($_POST['dateinput']!= ""){
				$period = $_POST['dateinput'];
			}else{
				$period = date('Y-m-01');
			}
			
			$query = "Exec area_wise_service_ratio_report '$period'";										
			//echo $query;
			$result = odbc_exec($connection,$query);		
			
			$totalTarget = 0;
			$totalAch = 0;
			
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
						echo '<td style="text-align: center">'. $row['AreaName'].'</td>';
						echo '<td style="text-align: center">'. $row['TotalTarget'].'</td>';
						echo '<td style="text-align: center">'. $row['TotalAch'].'</td>';
						echo '<td style="text-align: center">'. $row['PrCnt'].'</td>';
					echo '</tr>';
				//}
				$totalTarget += $row['TotalTarget'];
				$totalAch += $row['TotalAch'];
					
			}
			
			echo '<tr>';
				echo '<td style="text-align: center"><b>Total</b></td>';
				echo '<td style="text-align: center">'.$totalTarget.'</td>';
				echo '<td style="text-align: center">'.$totalAch.'</td>';
				echo '<td style="text-align: center">'.number_format(($totalAch/$totalTarget)*100,2).'</td>';
			echo '</tr>';
		?>
	</tbody>
</table>