<html lang="en">
<head>
    <title>Form validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<?php
    $name="";
    $mail="";
    $Ename=$Email="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST["Name"])){
            $Ename = "name is compulsory to be input";
        }
        else{
            $name = test($_POST["Name"]);
            // ensures that only the following is consisted.
                if(!preg_match("/^[a-zA-Z-' ]*$/",$name))
                {
                    echo "only characters are valid";
                }
        }

        if(empty($_POST["email"])){
            $Email= "email is compulsory";
        }
        else{
            $mail = test($_POST["email"]);
            if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
                $Email = "Not  valid email";
            }
        }
    //   $x = filter_var($mail,FILTER_VALIDATE_EMAIL); //filter_var(email,FILTER_VALIDATE_EMAIL)returns boolean values.
     //   var_dump($x);
    }
    function test($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data =htmlspecialchars($data);
        return $data;
    }
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Name">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    <span style="color:red">*<?php echo $Ename ?></span>
</div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input name= "email" type="email" class="form-control" id="exampleInputPassword1">
    <span style="color:red">*<?php echo $Email ?></span>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>