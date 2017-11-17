<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM way_bill ";
if(isset($_POST["way_bill_no"])){
    $query .= 'WHERE way_bill_no LIKE "%'.$_POST["way_bill_no"].'%" ';  
}
// if(isset($_POST["search"]["value"]))
// {
// 	$query .= 'WHERE way_bill_no LIKE "%'.$_POST["search"]["value"].'%" ';
// 	$query .= 'OR client_name LIKE "%'.$_POST["search"]["value"].'%" ';
// }
// if(isset($_POST["order"]))
// {
// 	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
// }
// else
// {
// 	$query .= 'ORDER BY id DESC ';
// }
// if($_POST["length"] != -1)
// {
// 	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
// }
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	// $image = '';
	// if($row["image"] != '')
	// {
	// 	$image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
	// }
	// else
	// {
	// 	$image = '';
	// }
	$sub_array = array();
	//$sub_array[] = $image;
	$sub_array["way_bill_no"] = $row["way_bill_no"];
	$sub_array["client_name"] = $row["client_name"];
	$sub_array["despatch_date"] = $row["despatch_date"];
	$sub_array["origin_detail"] = $row["origin_detail"];
	$sub_array["via_detail"] = $row["via_detail"];
	$sub_array["destination_detail"] = $row["destination_detail"];
	$sub_array["address"] = $row["address"];
	$sub_array["status"] = $row["status"];
	$sub_array["delivery_date"] = $row["delivery_date"];
	$sub_array["remarks"] = $row["remarks"];
	$sub_array["attachments"] = $row["attachments"];
	//$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
	//$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	// $data[] = $sub_array;
}
// $output = array(
// 	// "draw"				=>	intval($_POST["draw"]),
// 	// "recordsTotal"		=> 	$filtered_rows,
// 	// "recordsFiltered"	=>	get_total_all_records(),
// 	"data"				=>	$sub_array
// );
 echo json_encode($sub_array);
// echo "<pre>";
//print_r($output);
?>