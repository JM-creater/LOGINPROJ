<?php

    include 'config.php';

    if(isset($_POST["submit"]))
    {
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email' OR name = '$name'");
        $same = mysqli_query($conn, "SELECT * FROM tb_user WHERE name = '$name'");
        if(mysqli_num_rows($duplicate) > 0)
        {
            echo "<script> alert('Username or Email Has Already Taken'); </script>";
        } 
        if (mysqli_num_rows($same) > 0)
        {
            echo "<script> alert('Name Has Already Taken'); </script>";
        }
        else
        {
            if($password == $confirmpassword)
            {
                $query = "INSERT INTO tb_user VALUES('', '$name', '$username', '$email', '$password')";
                mysqli_query($conn,$query);
                echo "<script> alert('Registration Successful'); </script>";
            }
            else
            {
                echo "<script> alert('Password does not match'); </script>";
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER FORM</title>
</head>
<body>
    
    <h1>Register Your Account</h1>

    <form class="" action="" method="post" autocomplete="off">

        <label for="name">Name</label>
        <input type="text" name="name" id="name" required> <br> <br>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required> <br> <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required> <br> <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required> <br> <br>
        <label for="confirmpassword">Confirm Password</label>
        <input type="password" name="confirmpassword" id="confirmpassword" required> <br> <br>
        <button type="submit" name="submit">Register</button>

    </form>
    <br>
    <a href="login.ph">Login</a>

</body>
</html>