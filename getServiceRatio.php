<table class="table table-sm table-bordered">
	<thead>
		<tr>
			<th style="text-align: center; font-size: small;">Warranty Budget</th>
			<th style="text-align: center; font-size: small;">Warranty ACH</th>
			<th style="text-align: center; font-size: small;">%</th>
			<th style="text-align: center; font-size: small;">Post Warrant Budget</th>
			<th style="text-align: center; font-size: small;">Post Warrant ACH</th>
			<th style="text-align: center; font-size: small;">%</th>
			
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
			
			$query = "Exec usp_budgetVsAch '$ttyinput', '$period'";										
			$result = odbc_exec($connection,$query);		
			
			$sl = 1;
			while($row = odbc_fetch_array($result)){	

				
		?>
		<tr>
			<td style="text-align: center"><?php echo $row['WarrantyServiceTarget']; ?></td>
			<td style="text-align: center"><?php echo $row['WARRANTY']; ?></td>
			<td style="text-align: center"><?php echo number_format(($row['WARRANTY']/$row['WarrantyServiceTarget']) * 100); ?></td>
			<td style="text-align: center"><?php echo $row['PostWarrantyServiceTarget']; ?></td>
			<td style="text-align: center"><?php echo $row['POSTWARRANTY']; ?></td>
			<td style="text-align: center"><?php echo number_format(($row['POSTWARRANTY']/$row['PostWarrantyServiceTarget']) * 100); ?></td>
		</tr>
			<?php } ?>
	</tbody>
</table>