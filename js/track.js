
$(document).ready(function () {
    
    // Updating Way Bill Script
        $(document).on('click', '#track', function () {
           // var way_bill_no = $(this).attr("id");
            var way_bill_no = $('#way_bill_no').val();
            console.log(way_bill_no);
            $.ajax({
                //async: false,
                url: "track.php",
                method: "POST",
                data: { way_bill_no: way_bill_no },
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    $('#image').html('<img src="upload/'+ data.attachments + '" alt="image">');
                    $('#way_bill').html(data.way_bill_no);
                    $('#client_name').html(data.client_name);
                    $('#despatch_date').html(data.despatch_date);
                    $('#origin_detail').html(data.origin_detail);
                    $('#via_detail').html(data.via_detail);
                    $('#destination_detail').html(data.destination_detail);
                    $('#address').html(data.address);
                    $('#status').html(data.status);
                    $('#delivery_date').html(data.delivery_date);
                    $('#remarks').html(data.remarks);
                    // $('.modal-title').text("Edit User");
                    // $('#user_id').val(user_id);
                    // $('#user_uploaded_image').html(data.user_image);
                    // $('#action').val("Update Data");
                    // $('#operation').val("Edit");
                    // $('.add-form').show();
                    // $('#userModal').modal('show');
                    // $("html, body").animate({ scrollTop: 0 }, "slow");
                    // return false;
                }
            })
        });
    
    });