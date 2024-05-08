<!-- signup,php -->
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <div class="container">
    <h2>Signup</h2>
    <form method="post" action="register.php" >
        Email: <input type="text" class="form-control"required name="email"><br></br>
        Password: <input type="password" class="form-control"required name="password"><br></br>
        Repeat Password: <input type="password" class="form-control"required name="confirmpassword"><br></br>
        <input type="submit"class="btn btn-primary" value="Submit" name="submit"><br></br>
    </form>
    <a href="login.php"class="btn btn-primary">login</a>
</div>
</body>
</html>


<?php
// Check if form is submitted
if (isset($_POST["submit"])) {
    // Validate email and password
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // if (empty($email) || empty($password) || empty($confirmpassword)) {
    //     echo "Please fill in all fields";
    //     exit();
    // }
    if ($password!= $confirmpassword) {
echo "<script>
        alert('password mismatch');
      </script>";

        exit();
    }


    // Connect to MySQL
    $servername = "localhost";
    $username = "root";
    $dbpassword = "*k7JBmskrs6";
    $dbname = "bscs_record_system";



    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        echo   "<h3>Error connecting</h3>";
        die("Connection failed: " . $conn->connect_error);
    }
    else{
       // echo "<h3>Connected to MySQL</h3>";
    }


    $sql_select = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
            echo "<script>alert('Email already exists. Please choose a different email.');</script>";
        exit();
    } else {


        // Perform the INSERT query to register the new user
        $sql_insert = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "<script>
                    var email = '$email'; 
                    var url = 'login.php?email=' + encodeURIComponent(email);
                    alert('Signup Successful');
                    window.location = url;
                </script>";
           // header("Location: login.php");
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
