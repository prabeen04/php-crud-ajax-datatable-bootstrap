$(document).ready(function () {
	//alert('this is index 1');
	console.log('this is index 1');
	$('#operation').val("Add");
	// toggle show hide of the form
	$('#show-hide').click(function () {
		$('.add-form').toggle(500, 'swing');
	})

	$('#add_button').click(function () {
		//alert('this is index 1/add button clicked');
		console.log('this is index 1/add button clicked');
		$('#way_bill_form')[0].reset();
		$('.modal-title').text("Add User");
		$('#action').val("Insert");
		$('#operation').val("Add");
		$('#way_bill_div').show();
		$('#user_uploaded_image').html('');
	});

	var dataTable = $('#user_data').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax": {
			url: "fetch1.php",
			type: "POST"
		},
		"columnDefs": [
			{
				"targets": [0, 1, 2, 3, 4, ],
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
				console.log(data.via_detail);

				$('#way_bill_no').val(data.way_bill_no);
				// $('#way_bill_no').attr(disabled, "disabled");
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

  
});