<?php
  include './Connect.php';

if($_POST['action'] == 'get'){
  
    // $sqlSelect = "SELECT * FROM userinformation";
    // $ResulQue = mysqli_query($con, $sqlSelect);
    // $row = mysqli_fetch_all($ResulQue, MYSQLI_ASSOC);
   
    // echo json_encode($row);

    // //get images from the database and display
    // $query = "SELECT * FROM userimage ORDER BY IdNo DESC";
    // $result = mysqli_query($con, $query);
    // if($result -> num_rows > 0){
    //     while($row = $result->fetch_assoc()){
    //         $imageURL = 'UploadedFile/'.$row["filename"];
    //     }
    //     echo json_encode($imageURL);
    // }

    $sqlSelect = "Select userinformation.*,userimage.filename  from userinformation LEFT JOIN userimage ON userimage.UserInfo_Id = userinformation.IdNo";
    $ResultQue = mysqli_query($con, $sqlSelect);
    $row = mysqli_fetch_all($ResultQue, MYSQLI_ASSOC);
    
    echo json_encode($row);


    die(mysqli_error($con));
}
?>
