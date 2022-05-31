<?php

session_start();
include_once "./config.php";


$department = mysqli_real_escape_string($conn,$_POST['department']);





if(!empty($department)){

    $sql = mysqli_query($conn,"SELECT department FROM department WHERE department = '{$department}'");
    if(mysqli_num_rows($sql) > 0){
    
           //if email alredy exitdef
    
           echo "This Department alredy exist!";
    }


else{


          //onece user signedup then his status willbe active now
          $random_id = rand(time(),100000000);//creation random id for user


          //insert all user data insid e table
          $sql2 = mysqli_query($conn, "INSERT INTO department (unique_id,department)
          VALUES({$random_id}, '{$department}')");
         
         
         
         echo "Department Added Completed";
         


}

 



}






else{

    echo "All inputs are required!";

}


?>                       