<?php
session_start ();

    include './Connect.php';
   
    if(isset($_POST['UserId']))
    // if($_POST['action'] == 'click')
    {
        // $email = $_POST['eMail'];
        $idNo = $_POST['UserId'];

        date_default_timezone_set('Asia/Hong_Kong');
      
        $date = date('F j, Y');
        $time = date('H:i:s');

            // $sql = "UPDATE logtime SET Time_Out = '$time'
            //             WHERE User_Id = '".$idNo."'";
            // $result = mysqli_query($con, $sql);
            $sqlInsert =  "INSERT INTO timein(User_Id, Time_In, Time_Out, Date)
                            VALUES('".$idNo."','','$time','$date')";
            $result = mysqli_query($con, $sqlInsert);
            
        echo  'success';
        session_unset();
        session_destroy();
        exit();
    }        
?>