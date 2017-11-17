<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
//scripts for adding way bill.......	
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO way_bill (way_bill_no, client_name, despatch_date, origin_detail,
			via_detail, destination_detail, address, status, delivery_date, remarks, attachments) 
			VALUES (:way_bill_no, :client_name, :despatch_date, :origin_detail,
			 :via_detail, :destination_detail, :address, :status, :delivery_date, :remarks, :attachments)
		");
		$result = $statement->execute(
			array(
				':way_bill_no'	=>	$_POST["way_bill_no"],
				':client_name'	=>	$_POST["client_name"],
				':despatch_date'=>	$_POST["despatch_date"],
				':origin_detail'=>	$_POST["origin_detail"],
				':via_detail'=>	$_POST["via_detail"],
				':destination_detail'=>	$_POST["destination_detail"],
				':address'=>	$_POST["address"],
				':status'=>	$_POST["status"],
				':delivery_date'=>	$_POST["delivery_date"],
				':remarks'=>	$_POST["remarks"],
				':attachments'=>	$image
				//':despatch_date'=>	$_POST["despatch_date"],
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
//script for updating way bill detail......	
	if($_POST["operation"] == "Edit")
	{
		// $image = '';
		// if($_FILES["user_image"]["name"] != '')
		// {
		// 	$image = upload_image();
		// }
		// else
		// {
		// 	$image = $_POST["hidden_user_image"];
		// }
		$statement = $connection->prepare(
			"UPDATE way_bill 
			SET way_bill_no = :way_bill_no, client_name = :client_name, despatch_date = :despatch_date,
			origin_detail = :origin_detail, via_detail = :via_detail, destination_detail = :destination_detail,
			address = :address, status = :status,  delivery_date = :delivery_date, remarks = :remarks   
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':way_bill_no'	=>	$_POST["way_bill_no"],
				':client_name'	=>	$_POST["client_name"],
				':despatch_date'=>	$_POST["despatch_date"],
				':origin_detail'=>	$_POST["origin_detail"],
				':via_detail'   =>	$_POST["via_detail"],
				':destination_detail'=>	$_POST["destination_detail"],
				':address'      =>	$_POST["address"],
				':status'		=>	$_POST["status"],
				':delivery_date'=>	$_POST["delivery_date"],
				':remarks'	=>	$_POST["remarks"],
				//':image'		=>	$image,
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
// if(true){
// 	echo "<script>alert('adding city');</script>";	
// }	
//script for adding state and city.........	
if($_POST["operation"] == "add_city")
{
	$statement = $connection->prepare(
		"INSERT INTO network (state_name, city_name) 
			VALUES (:state_name, :city_name)
		"
	);
	$result = $statement->execute(
		array(
			':state_name'	=>	$_POST["state_name"],
			':city_name'	=>	$_POST["city_name"],
		)
	);
	if(!empty($result))
	{
		echo 'State and City added';
	}
}


//script for adding users........	
if($_POST["operation"] == "add_users")
{
	//echo "sdsdsadsa";
	$statement = $connection->prepare(
		"INSERT INTO users (branch_name, user_city, user_name, username, password, admin) 
			VALUES (:branch_name, :user_city, :user_name, :username, :password, :admin)
		"
	);
	$result = $statement->execute(
		array(
			':branch_name'	=>	$_POST["branch_name"],
			':user_city'	=>	$_POST["user_city"],
			':user_name'	=>	$_POST["user_name"],
			':username'		=>	$_POST["username"],
			':password'		=>	$_POST["password"],
			':admin'		=>  0
		)
	);
	if(!empty($result))
	{
		echo 'user created';
	}
}

}

?>