<?php
session_start ();
include './Connect.php';

if(isset($_POST['data']))
{
    // $InTime = date('H:i:s');
    $IdNo = $_POST['data'];
    // $InTime = '22:00:00';
    // $sqlSelect = "SELECT Date, CONCAT(max(Time_In), '-', max(Time_Out)) as LogTimeIN_OUT FROM `timein` WHERE timein.User_Id = '$IdNo' GROUP BY Date";
    $sqlSelect = "SELECT Date, 
                   max(Time_In) as Time_In, 
                    max(Time_Out) as Time_Out, 
                    timediff(max(Time_Out),  max(Time_In)) as timerendered,
                    CASE 
                        WHEN max(Time_In) > '00:00:00' THEN TIMEDIFF('00:00:00', max(Time_In))
                        ELSE '0:00:00'
                    END AS latetime,
                    CASE 
                        WHEN max(Time_Out) < '2:00:00' THEN TIMEDIFF('2:00:00', max(Time_Out))
                        ELSE '0:00:00'
                    END AS EarlyOut,
                    CASE 
                        WHEN max(Time_Out) > '2:00:00' THEN TIMEDIFF('2:00:00', max(Time_Out))
                        ELSE '0:00:00'
                    END AS OverTime
                FROM `timein` WHERE timein.User_Id = '$IdNo' and Date(Time_In) = Date(Time_Out) GROUP BY Date";
    $Result = mysqli_query($con, $sqlSelect);
    $row = mysqli_fetch_all($Result, MYSQLI_ASSOC);
    
    echo json_encode($row);

    die(mysqli_error($con));
}
?>