<?php 
  include './Connect.php';
  
    $id = $_POST['IdNo'];  
    $filename = $_POST['filename'];  

    $sql = "DELETE FROM userinformation WHERE IdNo = $id";
    $result = mysqli_query($con,$sql);

    $sqlim = "DELETE FROM userimage WHERE UserInfo_Id = $id";
    $resultim = mysqli_query($con,$sqlim);
        
    $targetFilePath = "UploadedFile/". $filename;              
    if(file_exists($targetFilePath)){
        unlink($targetFilePath);
    }
            
    die(mysqli_error($con));
    
?>
