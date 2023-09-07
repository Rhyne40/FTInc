<?php
  include './Connect.php';

if($_POST['action'] == 'get'){
    $id =$_POST['id'];

    $sqlSelect = "SELECT userinformation.*,userimage.filename  FROM userinformation LEFT JOIN userimage 
                  ON userinformation.IdNo = userimage.UserInfo_Id 
                  WHERE userinformation.IdNo = $id";
    $ResulQue = mysqli_query($con, $sqlSelect);
    $row = mysqli_fetch_assoc($ResulQue);
   
    echo json_encode($row);

    //$sqlSelect = "SELECT * FROM userinformation WHERE IdNo = $id";
    //$ResulQue = mysqli_query($con,$sqlSelect);
    //$row = mysqli_fetch_assoc($ResulQue);
    //$name = $row['Name'];
    //$email = $row['eMail'];
    //$mobile = $row['Mobile'];
    //$password = $row['Password'];

    if($ResulQue){
        while($row = mysqli_fetch_assoc($ResulQue)){
           echo json_encode($row);
        }
    }

    die(mysqli_error($con));
}


?>
