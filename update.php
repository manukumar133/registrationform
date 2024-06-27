<?php
    include("connection.php");
    error_reporting(0);
    $id=$_GET['id'];
    $Query="SELECT * FROM users where id='$id'";
    $data=mysqli_query($conn,$Query);

    $total=mysqli_num_rows($data);
    $result=mysqli_fetch_assoc($data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
        <div class="title">
        Update Details
        </div>
        <div class="form">
        <div class="input_field">
                <label>Picture</label>
                <input type="file" name="uploadfile" style="width: 100%;">
            </div>
            <div class="input_field">
                <label>First Name</label>
                <input type="text" value="<?php echo $result['fname']; ?>" class="input" name="fname" placeholder="Enter your first name" required>
            </div>
            <div class="input_field">
                <label>Last Name</label>
                <input type="text" value="<?php echo $result['lname']; ?>" class="input" name="lname" placeholder="Enter your last name" required>
            </div>
            <div class="input_field">
                <label>Password</label>
                <input type="password" value="<?php echo $result['pass']; ?>" class="input" name="pass" placeholder="Enter your password" required>
            </div>
            <div class="input_field">
                <label>Confirm Password</label>
                <input type="password" value="<?php echo $result['cpass']; ?>" class="input"  name="cpass" placeholder="Enter your confirm Password" required>
            </div>
            <div class="input_field">
                <label>Geder</label>
                <div class="custom_select">
                <select name="gender"  required>
                    <option value="">Select</option>
                    <option value="male"
                    <?php
                    if($result['gender']=='male'){
                        echo "selected";
                    }
                    ?>
                    >
                    Male</option>
                    <option value="female"
                    <?php
                    if($result['gender']=='female'){
                        echo "selected";
                    }
                    ?>
                    >Female

                    </option>
                    <option value="other"
                    <?php
                    if($result['gender']=='other'){
                        echo "selected";
                    }
                    ?>
                    >
                    Other's

                    </option>
                </select>
            </div>
            </div>
            <div class="input_field">
                <label>Email Address</label>
                <input type="text" value="<?php echo $result['email']; ?>"class="input" name="email" placeholder="Enter your confirm Address">
            </div>
            <div class="input_field">
                <label>Phone Number</label>
                <input type="text" value="<?php echo $result['phno']; ?>" class="input" name="phno" placeholder="Enter your confirm Contact Number" required>
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
                <textarea class="textarea" name="address" required><?php echo $result['address']; ?></textarea>
            </div>

            <div class="input_field terms">
                <label class="check">
                    <input type="checkbox" name="check" required>
                    <span class="checkmark"></span>
                </label>
                <p> Agree to terms and conditions</p>
            </div>
            <div class="input_field">
                <input type="submit" value="Update Details" name="Update" class="btn" required>
            </div>
        </div>
        </form>
    </div>
</body>
</html>


<?php

if(isset($_POST["Update"]))
    {
        $filename= $_FILES["uploadfile"]["name"];
        $tepmname=$_FILES["uploadfile"]["tmp_name"];
        $folder="images/".$filename;
        $in=move_uploaded_file($tepmname,$folder);
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


                // $insert= "UPDATE FROM users (fname,lname,pass,cpass,gender,email,phno,address) values('$fname', '$lname', '$pass', '$cpass', '$gender', '$email', '$phno', '$address')";
                // $data=mysqli_query($conn,$insert);

                $query="UPDATE users set img_source='$folder',fname='$fname' ,lname='$lname', pass='$pass',cpass='$cpass',
                gender='$gender',email='$email',phno='$phno',Caste='$Caste',language='$language1',address='$address' where id='$id'";
                $data=mysqli_query($conn,$query);
                if($data){
                    echo "<script>alert('Data Updated into database')</script>";
                    ?>
                    <meta http-equiv = "refresh" content = "0; url=http://localhost/CRUD4/display.php" />
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