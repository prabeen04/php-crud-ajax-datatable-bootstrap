<?php
require_once ('db.php');
//require_once ('function.php');
if(isset($_POST["user_id"]))
{
	//$abc = $_POST["user_id"];
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM way_bill 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{

		$output['way_bill_no'] = $row["way_bill_no"];
		$output['client_name'] = $row["client_name"];
		$output['despatch_date'] = $row["despatch_date"];
		$output['origin_detail'] = $row["origin_detail"];
		$output['via_detail'] = $row["via_detail"];
		$output['destination_detail'] = $row["destination_detail"];
		$output['address'] = $row["address"];
		$output['status'] = $row["status"];
		$output['delivery_date'] = $row["delivery_date"];
		$output['remarks'] = $row["remarks"];
		$output[] = $row["attachments"];

		//$output["first_name"] = $row["first_name"];
		//$output["last_name"] = $row["last_name"];
		// if($row["image"] != '')
		// {
		// 	$output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		// }
		// else
		// {
		// 	$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		// }
	}
	print_r(json_encode($output));
	//print_r($output);
	//echo 'data arived';
}
?>