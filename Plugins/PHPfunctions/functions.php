<?php
  include './Connect.php';

if($_POST['action'] == 'submit'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password =$_POST['password'];
    $id =$_POST['id'];
    // $attachFile =$_FILES['attachFile']['name'];

    if(!empty($_FILES['attachFile']['name'])) {
        $targetDir = $_SERVER['DOCUMENT_ROOT']."/CRUDOperation/UploadedFile/"; 
        $filename = basename($_FILES['attachFile']['name']);
        $targetFilePath = $targetDir ."". $filename; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 

        if(move_uploaded_file($_FILES['attachFile']['tmp_name'], $targetFilePath)){
            $sql = "UPDATE userinformation, userimage 
            SET userinformation.Name = '$name', eMail = '$email', Mobile = '$mobile', `Password` = '$password', userimage.Name = '$name', userimage.filename = '$filename', userimage.DateUpdate = NOW()
            WHERE userinformation.IdNo = userimage.UserInfo_Id and userinformation.IdNo = '$id'";
            //echo $sql;
            $result = mysqli_query($con, $sql);
        }       
    }   
   
  
        // if(move_uploaded_file($_FILES['attachFile']['tmp_name'], $targetFilePath)) {
        //   $slqFile = "INSERT INTO userimage (UserInfo_Id, filename, Name, DateReg) VALUES ('".$id."','".$filename."','$name', NOW())";
        //   $resultFile = mysqli_query($con, $slqFile);                
        // } 
    
    // if($result){
    //   //echo "Information Updated!";
    //   // header('location:Display.php');
    // }else{
    // }
    // echo $result;
    // echo 'test='.$name;
    die(mysqli_error($con));


}

?>