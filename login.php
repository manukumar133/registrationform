
<?php
session_start();
include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_style.css">
    <title>Login Page</title>
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form action="#"  method="POST" autocomplete="off">
        <div class="form">
            <input type="text" name="user" class="textfiled" placeholder="Username">
            <input type="password" name="pass" class="textfiled" placeholder="Password">
            <input type="submit" name="login" value="Login" class="btn">

            <div class="forgetpass"><a href="#" class="link" onclick="message()">Forget Password</a></div>
            
                
                <div class="signup">New Member ?<a href="#" class="link">SignUp Here</a></div>
                
        </div>
    </div>
    </form>

    <script>
        function message(){
            return alert("Abe Vsdk Password Yad Rkha Kr")
        }
    </script>
</script>
</body>
</html>


<?php
    if(isset($_POST['login'])){
        $username=  $_POST['user'];
        $password=  $_POST['pass'];

        $query="SELECT * FROM users WHERE email='$username' && pass='$password' ";
        $data= mysqli_query($conn,$query);

        $total=mysqli_num_rows($data);
        if($total==1){
            $_SESSION['user']=$username;
            header('location:display.php');
        }
        else
        {
            echo "<script> alert('Username and password is invalid')</script>";
        }
    }
?>