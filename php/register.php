<?php

session_start();
include_once "./config.php";


$fname = mysqli_real_escape_string($conn,$_POST['fname']);
$lname = mysqli_real_escape_string($conn,$_POST['lname']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$nicno = mysqli_real_escape_string($conn,$_POST['nicno']);
$position = mysqli_real_escape_string($conn,$_POST['position']);
$department = mysqli_real_escape_string($conn,$_POST['department']);



if(!empty($fname) && !empty($lname) && !empty($email) && !empty($nicno) && !empty($position) && !empty($department)){

    //check email is valid or in valid

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){//valid



//check email is alredy exit
$sql = mysqli_query($conn,"SELECT email FROM register WHERE email = '{$email}'");
if(mysqli_num_rows($sql) > 0){

    //if email alredy exit

    echo "This email alredy exist!";
}

else{
    



    //check user upload file or not
    if(isset($_FILES['image'])){

        //if file uploaded
        $img_name = $_FILES['image']['name']; //getting usrer uploaded img name
        $tmp_name = $_FILES['image']['tmp_name'];// thois tempery name ude to save in folder
        
        //let' explode image and get the last extebsion like jpg png
        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode);

        $extensions = ['png','jpeg','jpg','JPG','JPEG','PNG'];//these are some valid image ext store array
        if(in_array($img_ext, $extensions) === true){

            $time = time();

            $new_img_name = $time.$img_name;

           if(move_uploaded_file($tmp_name,"images/".$new_img_name)){//if uploaded image move to image file successfully

           //onece user signedup then his status willbe active now
            $random_id = rand(time(),100000000);//creation random id for user

            //insert all user data insid e table
            $sql2 = mysqli_query($conn, "INSERT INTO register (unique_id, fname, lname, email, nicno, position, department, img)
                                VALUES({$random_id}, '{$fname}',  '{$lname}',  '{$email}', '{$nicno}', '{$position}', '{$department}' , '{$new_img_name}')");
            
            if($sql2){//if these data inserted
                $sql3 = mysqli_query($conn, "SELECT * FROM register WHERE email = '{$email}'");


                if(mysqli_num_rows($sql3) > 0){

                    $row = mysqli_fetch_assoc($sql3);
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "Register Completed";

                
                }



            }

            else{

                echo "Somthing went wrong";


            }

        }
    }

        else{

            echo "Please select an image file - jpg, png!";

        }

    }

    else{

        echo "Please select an image file";
    }
}


    }
    else{

        echo "$email-This is not a valid email!";
    }



}
else{

    echo "All inputs are required";
}

?>                       