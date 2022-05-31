<?php

session_start();
include_once "./config.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


if(!empty($email) && !empty($password)){

    //check username and password

    $sql = mysqli_query($conn, "SELECT * FROM register WHERE email = '{$email}' AND unique_id = '{$password}'");
    if(mysqli_num_rows($sql) > 0){


        $row = mysqli_fetch_assoc($sql);
        $_SESSION['unique_id'] = $row['unique_id'];
        $_SESSION['nicno'] = $row['nicno'];
        echo "a";

       
        

      


    }
    else{

        echo "Email or Password is incorrect!";
    }
    



}

else{

    echo "All input feilds are required!";
}


?>