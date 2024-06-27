<?php
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="#" method="post" enctype="multipart/form-data">
        <div class="title">
        Registration Form
        </div>
        <div class="form">
        <div class="input_field">
                <label>Picture</label>
                <input type="file" name="uploadfile" style="width: 100%;">
            </div>
            <div class="input_field">
                <label>First Name</label>
                <input type="text" class="input" name="fname" placeholder="Enter your first name" required>
            </div>
            <div class="input_field">
                <label>Last Name</label>
                <input type="text" class="input" name="lname" placeholder="Enter your last name" required>
            </div>
            <div class="input_field">
                <label>Password</label>
                <input type="password" class="input" name="pass" placeholder="Enter your password" required>
            </div>
            <div class="input_field">
                <label>Confirm Password</label>
                <input type="password" class="input"  name="cpass" placeholder="Enter your confirm Password" required>
            </div>
            <div class="input_field">
                <label>Geder</label>
                <div class="custom_select">
                <select name="gender" required>
                    <option value="Not selected">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other's</option>
                </select>
            </div>
            </div>
            <div class="input_field">
                <label>Email Address</label>
                <input type="text" class="input" name="email" placeholder="Enter your confirm Address">
            </div>
            <div class="input_field">
                <label>Phone Number</label>
                <input type="text" class="input" name="phno" placeholder="Enter your confirm Contact Number" required>
            </div>
            <div class="input_field">
                <label style="margin-right:110px";>Caste</label>
                <input type="radio" name='Caste' value="General" required><label style="margin-left:5px";>General</label>
                <input type="radio" name='Caste' value="OBC" required><label style="margin-left:5px";>OBC</label>
                <input type="radio" name='Caste' value="SC" required><label style="margin-left:5px";>SC</label>
                <input type="radio" name='Caste' value="ST" required><label style="margin-left:5px";>ST</label>
            </div>

            <div class="input_field">
                <label style="margin-right:75px";>Language</label>
                <input type="checkbox" name='language[]' value="Hindi"><label style="margin-left:5px";>Hindi</label>
                <input type="checkbox" name='language[]' value="English"><label style="margin-left:5px";>English</label>
                <input type="checkbox" name='language[]' value="Bhojpuri"><label style="margin-left:5px";>Bhojpuri</label>
            </div>
            <div class="input_field">
                <label>Address</label>
                <textarea class="textarea" name="address" required></textarea>
            </div>

            <div class="input_field terms">
                <label class="check">
                    <input type="checkbox" name="check" required>
                    <span class="checkmark"></span>
                </label>
                <p> Agree to terms and conditions</p>
            </div>
            <div class="input_field">
                <input type="submit" value="Register" name="Register" class="btn" required>
            </div>
        </div>
        </form>
    </div>
</body>
</html>


<?php

if(isset($_POST["Register"]))
    {
        $filename= $_FILES["uploadfile"]["name"];
        $tepmname=$_FILES["uploadfile"]["tmp_name"];
        $folder="images/".$filename;
        move_uploaded_file($tepmname,$folder);
        $fname  =$_POST['fname'];
        $lname  =$_POST['lname'];
        $pass   =$_POST['pass'];
        $cpass  =$_POST['cpass'];
        $gender =$_POST['gender'];
        $email  =$_POST['email'];
        $phno   =$_POST['phno'];
        $Caste   =$_POST['Caste'];
        $language=$_POST['language'];
        $language1=implode(",",$language);
        $address =$_POST['address'];


        // if($fname!="" &&  $lname!="" && $pass!="" && $cpass!="" && $gender!="" && $email!="" && $phno!="" && $ass!=""){


                $insert= "INSERT INTO users (img_source,fname,lname,pass,cpass,gender,email,phno,Caste,language,address) values('$folder','$fname', '$lname', '$pass', '$cpass','$gender','$email','$phno','$Caste','$language1','$address')";
                $data=mysqli_query($conn,$insert);

                if($data){
                    echo "<script>alert('Data Inserted into database')</script>";
                    ?>
                    <meta http-equiv = "refresh" content = "0; url=http://localhost/CRUD4/" />
                    <?php
                }
                else
                {
                    echo "Failed";
                }
            }

            // else
            // {
            //     echo '<script> alert("Please full Field all field") </script>';
            // }
    //}

?>