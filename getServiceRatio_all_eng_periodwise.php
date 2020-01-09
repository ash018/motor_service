<table class="table table-sm table-bordered">
	<thead>
		<tr>
			<th style="text-align: center">Service Engineer</th>
			<th style="text-align: center">StaffId</th>
			<th style="text-align: center">TechnicianName</th>
			<th style="text-align: center">WarrantyServiceTarget</th>
			<th style="text-align: center">WARRANTY Ach</th>
			<th style="text-align: center">%</th>
			<th style="text-align: center">PostWarrantyServiceTarget</th>
			<th style="text-align: center">POSTWARRANTY Ach</th>
			<th style="text-align: center">%</th>
			<th style="text-align: center">Total Target</th>
			<th style="text-align: center">Total Ach</th>
			<th style="text-align: center">Total %</th>
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
			
			$query = "Exec usp_AllEngWiseAllTsaPerformance '$period'";	
			
			//echo $query;
			$result1 = odbc_exec($connection,$query);		
			
			
			$tempUser = '';
			$x = 0;
			$y = 0;
			$engineerArr = array();
			$countArr = array();
			while($row1 = odbc_fetch_array($result1)){
				array_push($engineerArr, $row1['username']);
			}
			
			$countArr = array_count_values($engineerArr);
			
			$result = odbc_exec($connection,$query);
			
			$tE= '';
			$sumTotalTarget = 0;
			$sumTotalAch = 0;
			while($row = odbc_fetch_array($result)){
				
				
					echo '<tr>';
						if($tE != $row['username']){
							echo '<td style="text-align: center">'. $row['username'].'</td>';
						}
						else{
							echo '<td></td>';
						}
						echo '<td style="text-align: center">'. $row['StaffId'].'</td>';
						echo '<td style="text-align: center">'. $row['TechnicianName'].'</td>';
						echo '<td style="text-align: center">'. $row['WarrantyServiceTarget'].'</td>';
						echo '<td style="text-align: center">'. $row['WARRANTY'].'</td>';
						echo '<td style="text-align: center">'. number_format(($row['WARRANTY']/$row['WarrantyServiceTarget'])*100,2).'</td>';
						echo '<td style="text-align: center">'. $row['PostWarrantyServiceTarget'].'</td>';
						echo '<td style="text-align: center">'. $row['POSTWARRANTY'].'</td>';
						echo '<td style="text-align: center">'. number_format(($row['POSTWARRANTY']/$row['PostWarrantyServiceTarget'])*100,2).'</td>';
						$totalTarget = (int)$row['WarrantyServiceTarget'] + (int) $row['PostWarrantyServiceTarget'];
						$totalAch  = (int)$row['WARRANTY'] + (int) $row['POSTWARRANTY'];
						echo '<td style="text-align: center">'. $totalTarget .'</td>';
						echo '<td style="text-align: center">'. $totalAch .'</td>';
						echo '<td style="text-align: center">'. number_format(($totalAch/$totalTarget)*100,2) .'</td>';
					echo '</tr>';
				
				
				$tE = $row['username'];
				$sumTotalTarget += $totalTarget;
				$sumTotalAch += $totalAch;	
			}
			echo '<tr>';
				echo '<td colspan="9" style="text-align: center"><b>Total</b></td>';
				echo '<td style="text-align: center"><b>'.$sumTotalTarget.'</b></td>';
				echo '<td style="text-align: center"><b>'.$sumTotalAch.'</b></td>';
				echo '<td style="text-align: center"><b>'.number_format(($sumTotalAch/$sumTotalTarget)*100,2).'</b></td>';
			echo '</tr>';
		?>
	</tbody>
</table>