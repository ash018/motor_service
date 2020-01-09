<table class="table table-sm table-bordered">
	<thead>
		<tr>
			<th style="text-align: center">Area</th>
			<th style="text-align: center">Technician Name</th>
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
			
			$query = "Exec area_wise_sixhour_report '$period'";										
			//echo $query;
			$result = odbc_exec($connection,$query);		
			
			$SixHourPrcnt = 0;
			$totalAch = 0;
			$tE= '';
			while($row = odbc_fetch_array($result)){
				
				
				
				echo '<tr>';
					if($tE != $row['AreaName']){
						echo '<td style="text-align: center">'. $row['AreaName'].'</td>';
					}
					else{
						echo '<td></td>';
					}
					echo '<td style="text-align: center">'. $row['TechnicianName'].'</td>';
					echo '<td style="text-align: center">'. $row['SixHourPrcnt'].'</td>';
				echo '</tr>';
				$tE = $row['AreaName'];
				$SixHourPrcnt += $row['SixHourPrcnt'];
				$totalAch += 1;
					
			}
			
			echo '<tr>';
				echo '<td></td>';
				echo '<td style="text-align: center"><b>Total</b></td>';
				echo '<td style="text-align: center">'.number_format(($SixHourPrcnt/$totalAch),2).'</td>';
			echo '</tr>';
		?>
	</tbody>
</table>