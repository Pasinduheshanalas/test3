<?php

session_start();
include_once "./config.php";


$fname = mysqli_real_escape_string($conn,$_POST['fname']);
$lname = mysqli_real_escape_string($conn,$_POST['lname']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$nicno = mysqli_real_escape_string($conn,$_POST['nicno']);
$password = mysqli_real_escape_string($conn,$_POST['password']);


if(!empty($fname) && !empty($lname) && !empty($email) && !empty($nicno) && !empty($password)){

    //check email is valid or in valid

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){//valid



//check email is alredy exit
$sql = mysqli_query($conn,"SELECT email FROM newchat WHERE email = '{$email}'");
if(mysqli_num_rows($sql) > 0){

       //if email alredy exitdef

       echo "This email alredy exist!";
}

      else{

   

            $status = "Active now"; //onece user signedup then his status willbe active now
            $random_id = rand(time(),100000000);//creation random id for user

            //insert all user data insid e table
            $sql2 = mysqli_query($conn, "INSERT INTO newchat (unique_id, fname, lname, email,nicno, password, status)
                                VALUES({$random_id}, '{$fname}',  '{$lname}',  '{$email}', '{$nicno}', '{$password}','{$status}')");
            
            if($sql2){//if these data inserted
                $sql3 = mysqli_query($conn, "SELECT * FROM newchat WHERE email = '{$email}'");


                if(mysqli_num_rows($sql3) > 0){

                    $row = mysqli_fetch_assoc($sql3);
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "b";
                   

                }



            }


        }
    }

}
else{

    echo "all inputs Feilds are requird";
}

?>                       