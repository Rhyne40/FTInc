<?php 
include './Connect.php';
// session_start();

$sqlSelect = "SELECT * FROM userinformation"; 

$ResultQue = mysqli_query($con, $sqlSelect);
// $rowSelect = mysqli_fetch_assoc($ResultQue);
$data = array();
while($rowSelect = mysqli_fetch_assoc($ResultQue)){
    $data[] = $rowSelect;
}
header('Content-Type: application/json');
echo json_encode($data);
?>