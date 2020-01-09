<table class="table table-sm table-bordered">
	<thead>
		<tr>
			<th style="text-align: center; font-size: small;">Depo</th>
			<th style="text-align: center; font-size: small;">Order Line</th>
			<th style="text-align: center; font-size: small;">Supply Line</th>
			<th style="text-align: center; font-size: small;">Supply Ratio</th>
			<th style="text-align: center; font-size: small;">Back Order</th>	
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
			
			$query = "Exec usp_supply_ratio '$period'";										
			$result = odbc_exec($connection,$query);		
			
			$sl = 1;
			while($row = odbc_fetch_array($result)){	

				
		?>
		<tr>
			<td style="text-align: center"><?php echo $row['DepoName']; ?></td>
			<td style="text-align: center"><?php echo $row['OrderLine']; ?></td>
			<td style="text-align: center"><?php echo $row['SupplyLine']; ?></td>
			<td style="text-align: center"><?php echo $row['SupplyRatio']; ?></td>
			<td style="text-align: center"><?php echo $row['BackOrder'];?></td>
		</tr>
			<?php } ?>
	</tbody>
</table>