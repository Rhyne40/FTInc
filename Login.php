<?php
	session_start();
	// include('conn.php');
 
	if (isset($_SESSION['eMail'])){
		header('location:Dashboard.php');
	}
?>
<html lang="en">
<head>
    <!-- to prevent goback forward.. -->
    <script>
        window.history.forward();
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTI LogIn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!-- <link rel="stylesheet" href="Style/Navigation.css"> -->
    <link rel="stylesheet" href="./Style/LogIn.css">
    <link rel="stylesheet" href="./Style/Container.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
      
  <!-- <script defer src="./JS/LogInHeader.js"></script> -->
</head>
<body>
    <!-- <div id="header"></div> -->
        <div class="container">
            <div class="screen">
                <div class="screen__content">
                    <div class="logo">
                            ferbencom<span> Technologies Inc.</span>
                    </div>
                    <form class="login" id="loginForm">
                        <div class="login__field">
                            <i class="login__icon fas fa-user"></i>
                            <input type="text" class="login__input" name="email" placeholder="eMail" autocomplete="off">
                        </div>
                        <div class="login__field">
                            <i class="login__icon fas fa-lock"></i>
                            <input type="password" class="login__input" name="password" placeholder="Password" autocomplete="off">
                        </div>
                        <button class="button login__submit" name="submit">
                            <span class="button__text">Log In Now</span>
                            <i class="button__icon fas fa-chevron-right"></i>
                        </button>	
                    </form>
                    <div class="social-login">
                        <h3>log in via</h3>
                        <div class="social-icons">
                            <a href="#" class="social-login__icon fab fa-instagram"></a>
                            <a href="#" class="social-login__icon fab fa-facebook"></a>
                            <a href="#" class="social-login__icon fab fa-twitter"></a>
                        </div>
                    </div>
                </div>
                <div class="screen__background">
                    <span class="screen__background__shape screen__background__shape4"></span>
                    <span class="screen__background__shape screen__background__shape3"></span>		
                    <span class="screen__background__shape screen__background__shape2"></span>
                    <span class="screen__background__shape screen__background__shape1"></span>
                </div>		
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#loginForm").on('submit', function(e){
                e.preventDefault();
                
                //get values from the form
                let formdata = new FormData(this);
                formdata.append("action", "submit");

                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/CRUDOperation/functions/LogInProcess.php',
                    data: formdata,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success:function(response){
                        // console.log(data);
                        if(response == 'success'){
                            $.notify("Welcome", "Success LogIn");
                            setTimeout(()=>{
                                window.location.href = "http://localhost/CRUDOperation/Dashboard.php";
                            },2000);
                        }
                        else{
                            $.notify("Login Failed.", "ERROR LogIn");
                        }                        
                    }
                });
            });
        });
    </script>
</body>
</html>