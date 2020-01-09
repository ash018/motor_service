<table class="table table-sm table-bordered">
	<thead>
		<tr>
			<th style="text-align: center">UserName</th>
			<th style="text-align: center">CustomerName</th>
			<th style="text-align: center">Mobile</th>
			<th style="text-align: center">ServiceIncome</th>
			<th style="text-align: center">HoursProvided</th>
			<th style="text-align: center">CategoryDetails</th>
			<th style="text-align: center">CallTypeDetails</th>
			<th style="text-align: center">ProductName</th>
		</tr>
	</thead>
	<tbody>
		<?php
		
			//error_reporting(0);
		
			include("db.php");
			
			$sdate = date('Y-m-d');
			$edate = date('Y-m-01');
			$query = "Select GNU.UserName, SD.CustomerName, SD.Mobile,
				SD.ServiceIncome, SD.HoursProvided,
				SC.CategoryDetails, GNSC.CallTypeDetails, GP.ProductName
			From GN_ServiceDetails SD INNER JOIN auth_user AU
				ON AU.id = SD.SupervisorCode INNER JOIN GN_Product GP ON GP.ProductId = SD.ProductId
				INNER JOIN GN_ServiceCategory SC ON SD.CategoryId = SC.CategoryId
				INNER JOIN GN_ServiceCall GNSC ON GNSC.CallTypeId = SD.CallTypeId
				INNER JOIN GN_UserInfo GNU ON GNU.UserId = SD.UserId
			Where AU.username = '$username' and convert(varchar(10),SD.ServerInsertDateTime,120)
				between '$sdate' and '$edate'";										
			
			$result = odbc_exec($connection,$query);		
			
			
			while($row = odbc_fetch_array($result)){?>
		<tr>
			<td style="text-align: center"><?php echo $row['UserName']; ?></td>
			<td style="text-align: center"><?php echo $row['CustomerName']; ?></td>
			<td style="text-align: center"><?php echo $row['Mobile']; ?></td>
			<td style="text-align: center"><?php echo $row['ServiceIncome']; ?></td>
			<td style="text-align: center"><?php echo $row['HoursProvided']; ?></td>
			<td style="text-align: center"><?php echo $row['CategoryDetails']; ?></td>
			<td style="text-align: center"><?php echo $row['CallTypeDetails']; ?></td>
			<td style="text-align: center"><?php echo $row['ProductName']; ?></td>
		</tr>
			<?php } ?>
	</tbody>
</table>