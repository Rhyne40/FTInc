<?php 
  session_start();
  include './Connect.php';

if($_POST['action'] == 'submit'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    date_default_timezone_set('Asia/Hong_Kong');
    $date = date('F j, Y');
    $time = date('H:i:s');

    if(!empty($email) && !empty($password)){
        $sqlSelect = "SELECT *,userimage.filename FROM userinformation LEFT JOIN userimage ON userimage.UserInfo_Id = userinformation.IdNo
                      WHERE eMail = '".$email."' and password = '".$password."'";
        $result = mysqli_query($con, $sqlSelect);
        $row = mysqli_fetch_assoc($result);
        //get eMail Idno
        $idNo = $row['IdNo'];
      

        if($row){
            $_SESSION['eMail'] = $row['eMail'];  
            $_SESSION['Name'] = $row['Name'];  
            $_SESSION['filename'] = $row['filename'];
            $_SESSION['IdNo'] = $row['IdNo'];
            //  $_SESSION['password'] = $row['Password'];          
            echo "success";
            
            //insert to database #logtime table
            $sqlInsert =  "INSERT INTO timein(User_Id, Time_In, Time_Out, Date)
                            VALUES('".$idNo."','$time','','$date')";
            $result = mysqli_query($con, $sqlInsert);
            // echo json_encode($row);

            //get User information and Image
            // $sqlUserSelect = "Select userinformation.Name,userimage.filename  from userinformation LEFT JOIN userimage ON userimage.UserInfo_Id = userinformation.IdNo
            // WHERE eMail = '".$email."' and password = '".$password."'  ";
            // $ResultQue = mysqli_query($con, $sqlUserSelect);
            // $rowSelect = mysqli_fetch_assoc($ResultQue);
            // echo json_encode($rowSelect);
            
        }else{
            echo "invalid email and password";
            // die(mysqli_error($con));
        }   
    }else{
        echo "All fields are required";
    }
    
    // exit();
}
?>