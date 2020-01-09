<table class="table table-sm table-bordered">
	<thead>
		<tr>
			<th style="text-align: center">TechnicianName</th>
			<th style="text-align: center">CustomerName</th>
			<th style="text-align: center">Mobile</th>
			<th style="text-align: center">TerritoryName</th>
			<th style="text-align: center">HoursProvided</th>
			<th style="text-align: center">ServiceDemandDate</th>
			<th style="text-align: center">ServiceStartDate</th>
			<th style="text-align: center">CategoryDetails</th>
			<th style="text-align: center">Yes/No</th>
		</tr>
	</thead>
	<tbody>
		<?php
		
			//error_reporting(0);
		
			include("db.php");
			echo 'xxx';
			//$sdate = date('Y-m-d');
			//$edate = date('Y-m-01');
			$engid = $_POST['engid'];
			$query = "SELECT c.TechnicianName, a.CustomerName, a.Mobile, d.TerritoryName, a.ServiceDemandDate, a.ServiceStartDate, a.ServiceEndDate, e.CategoryDetails, 
						CAST(CASE WHEN a.IsVerify=1 THEN 'Verified' ELSE 'Not Verified' END AS varchar) as YesNO
						FROM [ServiceTrack].[dbo].[GN_ServiceDetails] a, auth_user b, MotorTechnician c, Territory d, GN_ServiceCategory e
						WHERE a.SupervisorCode = b.id AND a.SupervisorCode=c.SupervisorCode AND c.TerritoryCode = d.TerritoryId AND e.CategoryId = a.CategoryId
						AND b.username = '$engid'";										
			
			$result = odbc_exec($connection,$query);		
			
			while($row = odbc_fetch_array($result)){?>
		<tr>
			<td style="text-align: center"><?php echo $row['TechnicianName']; ?></td>
			<?php 
				$encodedCName = utf8_encode ($row['CustomerName']);
				$customerName = utf8_decode ($encodedCName);
			?>
			<td style="text-align: center"><?php echo $row['CustomerName']; ?></td> 

			<td style="text-align: center"><?php echo $row['Mobile']; ?></td>
			<td style="text-align: center"><?php echo $row['TerritoryName']; ?></td>
			<td style="text-align: center"><?php echo $row['ServiceDemandDate']; ?></td>
			<td style="text-align: center"><?php echo $row['ServiceStartDate']; ?></td>
			<td style="text-align: center"><?php echo $row['ServiceEndDate']; ?></td>
			<td style="text-align: center"><?php echo $row['CategoryDetails']; ?></td>
			<td style="text-align: center"><?php echo $row['YesNO']; ?></td>
		</tr>
			<?php } ?>
	</tbody>
</table>