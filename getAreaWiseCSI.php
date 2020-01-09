<table class="table table-sm table-bordered">
	<thead>
		<tr>
			<th style="text-align: center">Area</th>
			<th style="text-align: center">Staff ID</th>
			<th style="text-align: center">Technician Name</th>
			<th style="text-align: center">Total Marks</th>
			<th style="text-align: center">Out Of</th>
			<th style="text-align: center">CSI %</th>
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
			
			$query = "Exec area_wise_csi_report '$period'";										
			//echo $query;
			$result = odbc_exec($connection,$query);		
			
			$totalTarget = 0;
			$totalCNT = 0;
			$tE= '';
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
						if($tE != $row['AreaName']){
							echo '<td style="text-align: center">'. $row['AreaName'].'</td>';
						}
						else{
							echo '<td></td>';
						}
						
						echo '<td style="text-align: center">'. $row['UserName'].'</td>';
						echo '<td style="text-align: center">'. $row['TechnicianName'].'</td>';
						echo '<td style="text-align: center">'. $row['TotalMarks'].'</td>';
						echo '<td style="text-align: center">'. $row['OutOf'].'</td>';
						echo '<td style="text-align: center">'. $row['CSI_Percentage'].'</td>';
					echo '</tr>';
				//}
				$tE = $row['AreaName'];
				$totalCNT += 1;
				$totalTarget += $row['TotalTarget'];
				$CSI_Percentage += $row['CSI_Percentage'];
					
			}
			
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td style="text-align: center"><b>Total</b></td>';
				echo '<td style="text-align: center"><b>'.number_format(($CSI_Percentage/$totalCNT),2).'</b></td>';
			echo '</tr>';
		?>
	</tbody>
</table>