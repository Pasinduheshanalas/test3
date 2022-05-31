<?php

session_start();
include_once "./config.php";


$leavetype = mysqli_real_escape_string($conn,$_POST['leave_type']);

$days = mysqli_real_escape_string($conn,$_POST['leave_days']);




if(!empty($leavetype) && !empty($days)){



    $sql = mysqli_query($conn,"SELECT leavet FROM leaving WHERE leavet = '{$leavetype}'");
if(mysqli_num_rows($sql) > 0){

       //if email alredy exitdef

       echo "This Leave Type alredy exist!";
}
else{



       //onece user signedup then his status willbe active now
       $random_id = rand(time(),100000000);//creation random id for user


 //insert all user data insid e table
 $sql2 = mysqli_query($conn, "INSERT INTO leaving (unique_id, leavet,lday)
 VALUES({$random_id}, '{$leavetype}',  '{$days}')");



echo "Leave Type Added Completed";



    
}






}






else{

    echo "All inputs are required!";

}


?>                       