<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Logistic Service</title>

	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
	<link rel="stylesheet" href="css/style.css" />
	<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"> -->
</head>

<body>
<div id="wrapper">
	<?php require_once "navbar.php";?>
	<!-- Static navbar -->
	<div class="container ">
		<div class="well shadow">
			<h2 class="text-center">Track Your Order</h2>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<input type="text" name="way_bill_no" id="way_bill_no" class="form-control" required/>
				</div>
				<div class="col-md-2">
					<button class="btn btn-success btn-lg" id="track">Track</button>
				</div>
			</div>
		</div>	
		<div id="no-record" class="col-md-12 text-center" style="display: none;">
			<div class="well">
				<span style=" color: red; font-size: 30px;">No Record Found</span>
			</div>
		</div>
			<div id="result-div" class="row" style="padding: 20px;display: none;">
				<div class="shadow" id="result-wrapper">
				
				<div class="col-md-3 ">
						<label class="control-label">Way Bill No</label> &nbsp;<span class="result-text" id="way_bill"></span>
				</div>
				<div class="col-md-3">
						<label class="control-label">Client Name </label> &nbsp;<span class="result-text" id="client_name"></span>
				</div>
				<div class="col-md-3">
						<label class="control-label">Despatch Date </label> &nbsp;<span class="result-text" id="despatch_date"></span>
				</div>
				<div class="col-md-3">
						<label class="control-label">Origin </label> &nbsp;<span class="result-text" id="origin_detail"></span>
				</div>
				<div class="col-md-3">
						<label class="control-label">Via </label> &nbsp;<span class="result-text" id="via_detail"></span>
				</div>
				<div class="col-md-3">
						<label class="control-label">Destination </label> &nbsp;<span class="result-text" id="destination_detail"></span>
				</div>
				<div class="col-md-3">
						<label class="control-label">Address </label> &nbsp;<span class="result-text" id="address"></span>
				</div>
				<div class="col-md-3">
						<label class="control-label">Status </label> &nbsp;<span class="result-text" id="status"></span>
				</div>
				<div class="col-md-3">
						<label class="control-label">Delivery Date </label> &nbsp;<span class="result-text" id="delivery_date"></span>
				</div>
				<div class="col-md-3">
						<label class="control-label">Remarks </label> &nbsp;<span class="result-text" id="remarks"></span>
				</div>

				<div id="image">
				</div>
			</div>
		</div>
	</div>
	</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/track.js"></script>
	<script>
		$("body").on("contextmenu", "img", function (e) {
			return false;
		});
	$(document).ready(function(){
		$('#result-div').hide();
		// if ($('#way_bill').is(':empty')){
		// //do something
		// 	$('#result-div').show();
		// }
		// else{
		// 	$('#result-div').show();
		// }
		// if($('#way_bill').html().length > 0){
		// //console.log($('#way_bill').text());	
		// //alert('empty div');
		// 	$('#result-div').show();
		// }
		// else if($('#way_bill').text().length != 0){
		// 	$('#result-div').show();
		// }
	});	
	
	</script>

</body>

</html>