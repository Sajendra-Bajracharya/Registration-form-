<?php
    include 'deconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        if(isset($_POST)){
            $user_name=(isset($_POST['username']) && $_POST['username'] ? $_POST['username'] :"" );
            $pass = (isset($_POST['password']) && $_POST['password'] ? $_POST['password'] :"" );
            $cpass=(isset($_POST['cpassword']) && $_POST['cpassword'] ? $_POST['cpassword'] :"" );
                if($pass == $cpass){
                   $check="SELECT * FROM `register` WHERE `User name` ='$user_name'";
                   $cresult=mysqli_query($conn,$check);
                   $num = mysqli_num_rows($cresult);
                        if($num==0){
                            $sql="INSERT INTO `register` (`User name`, `Password`, `Date`) VALUES ('$user_name', '$pass', current_timestamp())";   
                            $result = mysqli_query($conn , $sql);  
                                if($result)
                                {
                                    echo "<script>alert('Insert sucessful');</script>";
                                }else{
                                    echo "<script>alert('sorry cannot insert the record');</script>";
                                }
                        }else{
                            echo"<script>alert('User name already exist');</script>";
                        }
                }else{
                    echo "<script>alert('password do not match');</script>";
                }
        }

    ?>
    <meta charset="UTF-8">
    <title>sign_up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container label {
            display: block;
            margin-bottom: 5px;
        }
        .container input[type="text"],
        .container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .container button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up </h2>
        <form action="" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" >
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <label for="password">Confirm Password</label>
            <input type="password" id="cpassword" name="cpassword">
            
            <button type="submit">Sign up</button>
            <br>    
            <b>already have an account ???....<a href="login.php" target="_blank">CLICK_HERE</a> to login </b>
            
        </form>
    </div>
</body>
</html>