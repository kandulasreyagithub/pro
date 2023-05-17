<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.m" integrity="sha384-Zenh87qX5JnK23l0vwa8Ck2rdkQ28zep5IDxbcnCeuOxjzrj2rPF/et3URy9BvIWTRi" crossorigin="anonymous"/>
    <link rel="stylesheet" href="registration.css">
</head>

<body>
   <!-- <div id="nav-bar">
   
           
        <a class="nav-item" href="./index.html" >Home</a>
  
        <a class="nav-item" href="#" >Services</a>
        <a class="nav-item" href="./login.html" >Login</a>
        <a class="nav-item" href="./feedback.html" >Feedback</a>
        <a class="nav-item" href="./contact.html" >Contact us</a>
    </div>-->
    
    <div class="container">
        <?php
        if(isset($_POST["Submit"])){
            $FirstName =$_POST['FirstName'];
            $LastName =$_POST['LastName'];
            $Email =$_POST['Email'];
            $Password =$_POST['Password'];
            $ConfirmPassword =$_POST['ConfirmPassword'];  
            $PasswordHash=password_hash($Password,PASSWORD_DEFAULT);
            $errors = array();
            if(empty($FirstName) OR empty($LastName) OR empty($Email) OR empty($Password) OR empty($ConfirmPassword)){
                array_push($errors,"all fields are required");
            }
            if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
                array_push($errors,"email is not valid");
            }
            if(strlen($Password)<8){
                array_push($errors,"paasword must be atleast 8 characters long");
             }
             if($Password!==$ConfirmPassword){
                array_push($errors,"password doesnot match");
             }
             
             if(count($errors)>0){
                foreach($errors as $error){
                    echo "<div class='alert alert-danger'>$error</div>";
                }
             }else{
                require_once "connect.php";
                $sql="INSERT INTO registration(FirstName,LastName,Email,Password) VALUES (?,?,?,?)";
                $stmt=mysqli_stmt_init($conn);
                $prepareStmt=mysqli_stmt_prepare($stmt,$sql);
                if($prepareStmt){
                    mysqli_stmt_bind_param($stmt,"ssss",$FirstName,$LastName,$Email,$Password);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>Registered Successfully...</div>";
                }else{
                    die("something went wrong");
               }
             }
        }
        ?>   
        <h2>Register Here</h2>
        <form action="registration.php" method="post">
           <div class="form.group">
            <input type="text" class="form-control" name="FirstName" placeholder="enter your first name:">
           </div>
           <div class="form.group">
            <input type="text" class="form-control"  name="LastName" placeholder="enter your last name:">
        </div>
        <div class="form.group">
            <input type="email" class="form-control"  name="Email" placeholder="enter your email id:">
        </div>
        <div class="form.group">
            <input type="password"  class="form-control" name="Password" placeholder="enter password">
        </div>
        <div class="form.group">
            <input type="password" class="form-control"  name="ConfirmPassword" placeholder="repeat password">
        </div>
        <div class="form.group">
            <input type="submit" class="btn btn-primary" value="Register" name="Submit">
        </div>
        </form>

    </div>
    
</body>
</html>