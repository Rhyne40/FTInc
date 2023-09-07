<?php 
// session_start ();
if(!isset($_SESSION["eMail"]))
	header("location:LogIn.php");

$email = $_SESSION["eMail"];  

if(isset($_SESSION['Name'])){
  $Name = $_SESSION['Name'];}

if(isset($_SESSION['filename'])){
  $filename = $_SESSION['filename']; 
}

if(isset($_SESSION['IdNo'])){
  $IdNo = $_SESSION['IdNo'];
}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="/Plugins/Style/Navigation.css">
    <!-- <link rel="stylesheet" href="./Style/DashboardStyle.css"> -->
    <!-- <link rel="stylesheet" href="./Style/Container.css"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script> 

</head>
<body>
<header class="nav-header" id="myHeader">
        <div class="top-nav">
                <div class="left-side">
                    <div class="logo">                     
                          ferbencom<span> Technologies Inc.</span>                     
                    </div>
                </div>
                <div class="right-side">
                    <ul>
                        <li><a href="Index.php">Dashboard</a></li>
                        <!-- <li><a href="./functions/LogOut.php">LogOut</a></li>                     -->
                    </ul>  
              </div>   
            </div>  
            
            <div class="Menu-bar">   
             <ul>
                <li>
                    <!--<input type="checkbox" id="net" />-->
                    <a href="#"><?php echo $Name;?></a>                     
                    <div class="Services">
                        <ul>
                            <li id="logout"><a href="#">LogOut</a></li>
                            <!-- <li><a href="CommercialNet.php">Commercial Internet</a></li> -->
                        </ul>
                    </div>                                         
                </li>                   
              </ul>
            </div>
          </div>                                      
</header>
<div class="profilePic">
                <div class="imahe">
                  <?php echo '<img src="/CRUDOperation/UploadedFile/'.$filename.'">';?>
                  <!-- <img src="./UploadedFile/'.{$filename}.'"> -->
                </div>
</div>

<script>
  $(document).ready(function(){
    $("#logout").on('click', function(e){
      e.preventDefault();

      let _eMail = '<?php echo $email; ?>';
      let User_Id = '<?php echo $IdNo; ?>';
      // object holding data to send in php
      // alert(User_Id);
     
      let dataToSend = {
                        UserId: User_Id
                      };     
      $.post(`http://localhost/FTInc/Plugins/PHPfunctions/LogOut.php`,
              dataToSend,
              function(response){
                if(response == 'success'){
                          $.notify("Thank you!!!", "Success LogOut");  
                          setTimeout(()=>{
                                window.location.href = "http://localhost/FTInc/Login.php";
                          },2000); 
                        }else{
                          $.notify("LogOut Failed.", "ERROR Logout");
                        }    
              });                     
    });
  });
</script>
</body>
</html>