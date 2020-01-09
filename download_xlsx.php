<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Motor Service</title>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container"><hr>	  
	  <div class="row">
	    <div class="col-md-12 order-md-2 mb-4">
		  <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted</span>
            <span class="badge badge-secondary badge-pill">
			<form id="excel" action="itemexcel.php" method="post" onsubmit='$("#datatodisplay").val( $("<div>").append( $("#display_customer_detail").eq(0).clone()).html() )'>
				<input type="hidden" id="datatodisplay" name="datatodisplay"/>
				<input class="bg" type="submit" value="Export To Excel"/>
			</form>
			</span>
          </h4>		  
			

          <!--<form class="card p-2">-->
            <!--<div class="input-group">
              <!--<input type="text" class="form-control" id="ttyinput" disabled>
				Start Date: <input type="date" name="startdate" id="startdate"/>
				End Date: <input type="date" name="enddate" id="enddate"/>
				<div class="input-group-append">
					<button type="submit" id="btngo"  class="btn btn-secondary">GO</button>
				</div>
            </div>-->
          <!--</form>-->
		  <input type="hidden" id="engid" value="<?php echo $_GET['engid']?>" />
		  <div id="display_customer_detail">
		    	
		  </div>
		  
		</div>
	  </div>
	 
	  <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019 ACI Ltd.</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
	</div>
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/vendor/holder.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$("#btngo").on('click', function () {		
				ttyinput = $("#ttyinput").val();
				var engid = $("#engid").val();
				///alert(ttyinput);				
				$.ajax
				({					
					type: "POST",
					url: "getDownloaddataMotorService.php",					
					data: {startdate: startdate, enddate: enddate, username: username},
					cache: false,
					
					success: function (html)
					{			
						$("#display_customer_detail").html(html);							
						
					}
				});
			});
			
			$(".bg").on('click', function () {		
				
				var engid = $("#engid").val();
				///alert(ttyinput);				
				$.ajax
				({					
					type: "POST",
					url: "getDownloaddataMotorService.php",					
					data: {engid: engid},
					cache: false,
					
					success: function (html)
					{			
						$("#display_customer_detail").html(html);							
						
					}
				});
			});
		});
	</script>
	 	<script>
		$(document).ready(function() {
			$("#startdate").datepicker();
			$("#enddate").datepicker();

		});
	</script>
  </body>
 </html>