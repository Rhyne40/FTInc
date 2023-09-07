<?php 
  include './Connect.php';
  
  if($_POST['action'] == 'insert'){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password =$_POST['password'];
    // $attachFile = $_FILES['attachFile']['name'];


    $sql = "INSERT INTO userinformation (Name, eMail, Mobile, Password)
    values('$name','$email','$mobile','$password')";
    $result = mysqli_query($con, $sql);
    $id = mysqli_insert_id($con);

    if(!empty($_FILES["attachFile"]["name"])) {
      $targetDir = $_SERVER['DOCUMENT_ROOT'] ."/CRUDOperation/UploadedFile/"; 
      $filename = basename($_FILES["attachFile"]["name"]);
      $targetFilePath = $targetDir . $filename; 
      $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
     
      // show_source($filename);

      if(move_uploaded_file($_FILES['attachFile']['tmp_name'], $targetFilePath)) {
        $slqFile = "INSERT INTO userimage (filename, Name, DateReg, UserInfo_Id,DateUpdate) 
        VALUES ('".$filename."','$name',NOW(),'".$id."','')";
        $resultFile = mysqli_query($con, $slqFile);    
       // header('location:http://localhost/CRUDOperation/Display.php');    
      } 
    }   
    
     //header('location:Display.php');

    if(!$result){       
      die(mysqli_error($con));
    }
  } 
?>