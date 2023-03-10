<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "akom2006", "project_new");
$columns = array('employee_name', 'employee_phone','employee_email','employee_role','username','password');

$query = "SELECT * FROM employee ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE employee_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR employee_phone LIKE "%'.$_POST["search"]["value"].'%" 
 OR employee_email LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY employee_id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-employee_id="'.$row["employee_id"].'" data-column="employee_name">' . $row["employee_name"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-employee_id="'.$row["employee_id"].'" data-column="employee_phone">' . $row["employee_phone"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-employee_id="'.$row["employee_id"].'" data-column="employee_email">' . $row["employee_email"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-employee_id="'.$row["employee_id"].'" data-column="employee_role">' . $row["employee_role"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-employee_id="'.$row["employee_id"].'" data-column="username">' . $row["username"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-employee_id="'.$row["employee_id"].'" data-column="password">' . $row["password"] . '</div>';
 $sub_array[] = '<button type="button"  name="delete" class="delete btn btn-sm btn-danger" style="border:none;" employee_id="'.$row["employee_id"].'">ลบ</button>';
 $data[] = $sub_array; 
}

function get_all_data($connect)
{
 $query = "SELECT * FROM employee";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>