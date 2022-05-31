<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="registration.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<body>



<div class="wrapper">

<div class="topic-bar">


<p class="topic-text">Leave Manegement System</p>


</div>

<div class="head-bar">

<table class="table">

<tr>

<td>
<img src="background/home.png" alt="">
    <a class="nav-link" href="index.php">Home</a>
    </td>

    <td>
    <img src="background/register.png" alt="">
    <a class="nav-link" href="registration.php">Register</a>
    </td>

    <td>
    <img src="background/user.png" alt="">
    <a class="nav-link" href="userdetails.php">User Details</a>
    </td>

    

    <td>
    <img src="background/department.png" alt="">
    <a class="nav-link" href="department.php">Department</a>
    </td>   



    <td>
    <img src="background/request.png" alt="">
    <a class="nav-link" href="recived_request.php">Requests</a>
    </td>
</tr>
</table>

</div>

<table class="table">

<tr>

<td>

<section class="form register">



    <form action="#" enctype="multipart/form-data">
   


        

        <div class ="error-text"></div>



        <div class="name-details">

            <div class="feilds input">
                <label>First name</label>
                <input type="text" name = "fname" placeholder="First Name" required>

            </div>

            <div class="feilds input">
                <label>Last name</label>
                <input type="text" name = "lname" placeholder="Last Name" required>
               

            </div>
        </div>



            <div class="feilds input">
                <label>Email Adress</label>
                <input type="text" name = "email" placeholder="Enter Your Email " required>

            </div>

            
           

            <div class="feilds input">
                <label>NIC No</label>
                <input type="text" name = "nicno" placeholder="Enter Your NIC No " required>

            </div>


            <div class="feilds input">

                <label>Position</label>
                
                <select name="position"  class="item-select">
                    <option value="volvo">Senior Lecture</option>
                    <option value="saab">dimostrator</option>
                    <option value="mercedes">Clark</option>
                    <option value="audi">Other</option>
                  </select>
                  

            </div>

            <div class="feilds input">

                <label>Department</label>
                
                <select name="department"  class="item-select">
                    
                <?php

$conntection= mysqli_connect("localhost","root","","chat");
$sql = "SELECT * FROM department ";
$result = mysqli_query($conntection,$sql);
while($row=mysqli_fetch_array($result)){


echo"<option value='".$row['department']."'>".$row['department']."</option>";

}
?>

                  </select>
                  

            </div>

            <div class="feilds Image">
                <label>Select Image</label>
                <input type="file" name = "image" >

            </div>




            
            <div class="feilds button ">
                
                <input type="submit" value="Register">

            </div>




           


    </form>

    

</section>




</td>


<td>

<img src="background/register-page-img.png" alt="">

</td>


</tr>


</table>


</div>










  
    <script src="javascript/registration.js"></script>


</body>
</html>