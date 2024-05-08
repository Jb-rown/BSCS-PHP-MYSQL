<!-- loing page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
     <div class="container">
        <h2>Login</h2>
<form method="post" action="login.php" >
        Email: <input type="text" class="form-control" required name="email"><br>
        Password: <input type="password" class="form-control" required name="password"><br>
        <input type="submit"class="btn btn-primary" value="Submit" name="submit"><br></br>
        <a href="register.php"class="btn btn-primary">signup</a>
    </form>
</div>
</body>
</html>

<?php
 if(isset($_POST['submit']))
 {

    // Create mysql connection
    $conn = mysqli_connect("localhost", "root", "*k7JBmskrs6", "bscs_record_system");
    // Check connection
    if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }

    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="select * from users where email='$email' and password='$password'";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
       
echo "<script>
        var email = '$email'; 
        var url = 'add_records.php?email=' + encodeURIComponent(email);
        alert('Login Successful');
        window.location = url;
      </script>";


    }
    else
    {
        echo "<script>alert('Login Failed');window.location='login.php';</script>";
    }
 }

?>