<? include './Connect.php';

session_start();

if($_POST['action'] == 'submit'){
    $email = $_POST['email'];
    $password = $_POST['password'];

//    get User information and Image

    $sqlSelect = "SELECT userinformation.*,userimage.filename FROM userinformation LEFT JOIN userimage 
    ON userinformation.IdNo = userimage.UserInfo_Id 
    WHERE userinformation.eMail = $email and userinformation.password = $password";
   
    $ResultQue = mysqli_query($con, $sqlUserSelect);
    $rowSelect = mysqli_fetch_assoc($ResultQue);

    echo json_encode($rowSelect);

    // if($ResulQue){
    //     while($row = mysqli_fetch_assoc($ResultQue)){
    //        echo json_encode($rowSelect);
    //     }
    // }
    die(mysqli_error($con));
       
}
?>