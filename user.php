<?php  
 //login_success.php  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
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
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
</head>

<body>
<?php require_once "navbar.php";?>


	<div class="container ">
		<div class="add-btn" align="center">
			<button class="btn btn-lg btn-warning" id="show-hide">Show/Hide</button>
			<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-success btn-lg">Add New Way Bill</button>
			
		</div>
		<form method="post" id="way_bill_form" enctype="multipart/form-data">
			<!--add way bill form  -->
			<div class="add-form" id="way_bill_div">
				<div class="row">
					<label class="control-label col-md-2">Way Bill No</label>
					<div class="col-md-2">
						<input type="text" name="way_bill_no" id="way_bill_no" class="form-control" />

					</div>
					<label class="control-label  col-md-2">Client's Name</label>
					<div class="col-md-2">
						<input type="text" name="client_name" id="client_name" class="form-control" />
					</div>
					<label class="control-label col-md-2">Despatch Date</label>
					<div class="col-md-2">
						<input type="date" name="despatch_date" id="despatch_date" class="form-control" />
					</div>
					<label class="control-label col-md-2">Origin</label>
					<div class="col-md-2">
						<select name="origin_detail" id="origin_detail" class="form-control">
								<option value="bbsr">bbsr</option>
								<option value="cuttack">cuttack</option>
								<option value="berhampur">berhampur</option>
								<option value="chhatrapur">chhatrapur</option>
								<option value="khordha">khordha</option>
							</select>
					</div>

					<label class="control-label col-md-2">Via</label>
					<div class="col-md-2">
						<select name="via_detail" id="via_detail" class="form-control">
								<option value="bbsr">bbsr</option>
								<option value="cuttack">cuttack</option>
								<option value="berhampur">berhampur</option>
								<option value="chhatrapur">chhatrapur</option>
								<option value="khordha">khordha</option>
							</select>
					</div>

					<label class="control-label col-md-2">Destination</label>
					<div class="col-md-2">
						<select name="destination_detail" id="destination_detail" class="form-control">
								<option value="bbsr">bbsr</option>
								<option value="cuttack">cuttack</option>
								<option value="berhampur">berhampur</option>
								<option value="chhatrapur">chhatrapur</option>
								<option value="khordha">khordha</option>
							</select>
					</div>

					<label class="control-label col-md-2">Address
															</label>
					<div class="col-md-2">
						<textarea name="address" id="address" cols="30" rows="10" class="form-control"></textarea>
					</div>
					<label class="control-label col-md-2">status</label>
					<div class="col-md-2">
						<select name="status" id="status" class="form-control">
								<option value="good">good</option>
								<option value="bad">bad</option>
								<option value="average">average</option>
							</select>
					</div>
                    
                    <label class="control-label col-md-2">Delivery Date</label>
					<div class="col-md-2">
						<input type="date" name="delivery_date" id="delivery_date" class="form-control" />
					</div>

					<label class="control-label col-md-2">Remarks</label>
					<div class="col-md-2">
						<input type="text" name="remarks" id="remarks" class="form-control">
					</div><br>
					<div style="display: none">
						<label class="control-label col-md-2">Select a File</label>
						<input type="file" name="user_image" id="user_image" />
						<span id="user_uploaded_image"></span>
					</div>


					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
				</div>
				<div class="row">
					<div class="text-center">
						<input type="submit" name="action" id="action" class="btn btn-success" value="Save" />
						<input type="button" name="cancel" id="cancel" class="btn btn-danger" value="Cancel" />
					</div>
				</div>
			</div>
		</form>
		<!-- add way bill end -->

	
		<!-- Way Bill Table starts-->
		<div class="table-responsive way-bill-table">
			<table id="user_data" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="20%">Way Bill</th>
						<th width="20%">Name</th>
						<th width="20%">From</th>
						<th width="20%">To</th>
						<th width="10%">Edit</th>
					</tr>
				</thead>
			</table>

		</div>
		<!-- Way bill table end -->
	</div>


	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/script1.js"></script>


</body>

</html>

<?php	  
 }  
 else  
 {  
      header("location:login.php");  
 }  
 ?> 
