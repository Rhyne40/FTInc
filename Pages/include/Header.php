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
    <!-- <link rel="stylesheet" href="./Plugins/Style/Navigation.css"> -->
    <link rel="stylesheet" href="./dist/css/preload.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/earlyaccess/hanna.css">
    <!-- <link rel="stylesheet" href="./Style/DashboardStyle.css"> -->
    <!-- <link rel="stylesheet" href="./Style/Container.css"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script> 
    <script src="./dist/js/preload.js"></script>
</head>
<body>
<div class="wrapper">  
    <div id="loader-wrapper">  
      <div id="loader"><img src="./dist/img/Logologo.png">
        <p>LOADING</p>
        <div class="circ-one"></div>
        <div class="circ-two"></div>
      </div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
</div>
<div id="content">
  <!-- <h1>welcome!</h1> -->
  <div class="wrapper preload">
    <div class="nav-header" id="myHeader">
      <div class="top-nav">
          <div class="profilePic">
                <div class="imahe">
                  <?php echo '<img src="./Dist/Uploadimage/'.$filename.'">';?>                 
                </div>
            </div>
          <div class="left-side">
            <div class="logo"><img src="./dist/img/FTIconLogo.ico">
              ferbencom<span> Technologies Inc.</span> 
            </div>
          </div>
          <div class="Menu-bar">   
            <ul>
              <li>                          
                <a href="#"><?php echo $Name;?></a>                     
                    <div class="UserName">
                      <ul>
                        <li id="logout"><a href="#">LogOut</a></li>                              
                      </ul>
                    </div>                                         
              </li>                   
            </ul>
            
          </div>
      </div>
    </div>
  </div>
  
  <!-- <header class="nav-header" id="myHeader">
    
    <div class="top-nav">
      <div class="left-side">
        <div class="logo">                     
            ferbencom<span> Technologies Inc.</span>                     
        </div>
      </div>
      <div class="right-side">
        <ul>
            <li><a href="Index.php">Dashboard</a></li>
             
        </ul>  
      </div>   
                   
      <div class="Menu-bar">   
        <ul>
          <li>
                      
             <a href="#"><?php echo $Name;?></a>                     
                <div class="Services">
                  <ul>
                    <li id="logout"><a href="#">LogOut</a></li>
                           
                  </ul>
                </div>                                         
          </li>                   
        </ul>
      </div>
    </div>                  
                            
  </header> -->
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