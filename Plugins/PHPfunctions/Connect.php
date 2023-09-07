<?php
    $con = new mysqli('localhost','root','henry1983','crud_operation');
    if(!$con){       
        die(mysqli_error($con));
    }

    // $DateTime = date("F j, Y H:i:s");
?>