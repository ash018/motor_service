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
            <span class="text-muted">Ratio</span>
            <span class="badge badge-secondary badge-pill">1</span>
          </h4>		  
		  
          <!--<form class="card p-2">-->
            <div class="input-group" id="hidemeafterload">
			  <input type="date" class="form-control" id="dateinput">	
              <input type="text" class="form-control" id="ttyinput" disabled>
              <div class="input-group-append">
                <button type="submit" id="btngo"  class="btn btn-secondary">GO</button>
              </div>
            </div>
          <!--</form>-->
		  <img src="assets/img/giphy.gif" id="img" style="display:none"/ >
		  <div id="display_customer_detail">
		    	
		  </div>
		  
		</div>
	  </div>
	  <script type="text/javascript">
		function myTerritoryCode(val) {				
		  document.getElementById("ttyinput").value = val;
		}	
	  </script>
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
				dateinput = $("#dateinput").val();
				$('#img').show();
				$("#display_customer_detail").hide();
				///alert(ttyinput);				
				$.ajax
				({					
					type: "POST",
					url: "getServiceRatio.php",					
					data: {ttyinput: ttyinput, dateinput:dateinput},
					cache: false,
					
					success: function (html)
					{			
						$('#img').hide();
						$("#display_customer_detail").html(html);
						$("#display_customer_detail").show();
						
					}
				});
			});
		});
	</script>
  </body>
 </html>