$(document).ready(function () {
	$('#operation').val("Add");
	// toggle show hide of the form
	$('#show-hide').click(function () {
		$('.add-form').toggle(500, 'swing');
	})

	$('#add_button').click(function () {
		$('#way_bill_form')[0].reset();
		// $('.modal-title').text("Add User");
		$('#action').val("Save");
		$('#operation').val("Add");
		$('#way_bill_div').show();
		$('#user_uploaded_image').html('');
	});

	var dataTable = $('#user_data').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax": {
			url: "fetch.php",
			type: "POST"
		},
		"columnDefs": [
			{
				"targets": [0, 1, 2, 3, 4, 5],
				"orderable": true,
			},
		],

	});
// Adding way bill script
	$(document).on('submit', '#way_bill_form', function (event) {
		event.preventDefault();
		var way_bill_no = $('#way_bill_no').val();
		var client_name = $('#client_name').val();
		var despatch_date = $('#despatch_date').val();
		var origin_detail = $('#origin_detail').val();
		var via_detail = $('#via_detail').val();
		var destination_detail = $('#destination_detail').val();
		var address = $('#address').val();
		var status = $('#status').val();
		var delivery_date = $('#delivery_date').val();
		var remarks = $('#remarks').val();
		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if (extension != '') {
			if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
				alert("Invalid Image File");
				$('#user_image').val('');
				return false;
			}
		}
		//console.log(new FormData(this));		
		if (true) {
			$.ajax({
				url: "insert.php",
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function (data) {
					alert(data);
					$('#way_bill_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else {
			alert("Both Fields are Required");
		}
	});
// Updating Way Bill Script
	$(document).on('click', '.update', function () {
		var user_id = $(this).attr("id");
		console.log(user_id);
		$.ajax({
			//async: false,
			url: "fetch_single.php",
			method: "POST",
			data: { user_id: user_id },
			dataType: "json",
			success: function (data) {
				console.log('data');

				$('#way_bill_no').val(data.way_bill_no);
				$('#client_name').val(data.client_name);
				$('#despatch_date').val(data.despatch_date);
				$('#origin_detail').val(data.origin_detail);
				$('#via_detail').val(data.via_detail);
				$('#destination_detail').val(data.destination_detail);
				$('#address').val(data.address);
				$('#status').val(data.status);
				$('#delivery_date').val(data.delivery_date);
				$('#remarks').val(data.remarks);
				$('.modal-title').text("Edit User");
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Update Data");
				$('#operation').val("Edit");
				$('.add-form').show();
				$('#userModal').modal('show');
				$("html, body").animate({ scrollTop: 0 }, "slow");
				return false;
			}
		})
	});
//Deleting way bill script
	$(document).on('click', '.delete', function () {
		var user_id = $(this).attr("id");
		if (confirm("Are you sure you want to delete this?")) {
			$.ajax({
				url: "delete.php",
				method: "POST",
				data: { user_id: user_id },
				success: function (data) {
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else {
			return false;
		}
	});

//Adding City and State script
  //Add Network button
  $('#add_network').click(function(){
	$('#network_div').show();
	$('#network_operation').val("add_city");	
  });
$(document).on('submit', '#network_form', function (event) {
	event.preventDefault();
	var state_name = $('#state').val();
	var city_name = $('#city').val();
	console.log(city_name);
	//$('#operation').val("add_city");
	console.log(new FormData(this));
	if (true) {
		$.ajax({
			url: "insert.php",
			method: 'POST',
			data: new FormData(this),
			contentType: false,
			processData: false,
			success: function (data) {
				alert(data);
				$('#network_form')[0].reset();
				//$('#userModal').modal('hide');
				//dataTable.ajax.reload();
			}
		});
	}
	else {
		alert("Both Fields are Required");
	}
});

//Adding users  script
  //Add Network button
  $('#add_users').click(function(){
	$('#users_div').show();
	$('#users_operation').val("add_users");	
  });
  $(document).on('submit', '#users_form', function (event) {
	event.preventDefault();
	var branch_name = $('#branch_name').val();
	var user_city = $('#user_city').val();
	var user_name = $('#user_name').val();
	var username = $('#username').val();
	var password = $('#password').val();
	//$('#operation').val("add_city");
	console.log(new FormData(this));
	if (true) {
		$.ajax({
			url: "insert.php",
			method: 'POST',
			data: new FormData(this),
			contentType: false,
			processData: false,
			success: function (data) {
				alert(data);
				$('#users_form')[0].reset();
				//$('#userModal').modal('hide');
				//dataTable.ajax.reload();
			}
		});
	}
	else {
		alert("Both Fields are Required");
	}
});
  
});
