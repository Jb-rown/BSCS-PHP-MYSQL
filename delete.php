<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delete</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <div class="container">
        <form action="delete.php" method="post">
            Email: <input type="text" class="form-control" name="email" required><br>
            password: <input type="password" class="form-control" name="password" required><br>
            <input type="submit" class="btn btn-primary" value="Delete Record">
        </form>
        <br>
        <a href="index.php" class="btn btn-primary">home</a>
    </div>
</body>
</html>

<?php
if (isset($_POST['email'])) {
    // Connect to MySQL
    $servername = "localhost";
    $username = "root";
    $dbpassword = "*k7JBmskrs6";
    $dbname = "bscs_record_system";
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        echo "<h3>Error connecting</h3>";
        die("Connection failed: " . $conn->connect_error);
    }
$password = $_POST['password'];
    $email = $_POST['email'];
    $sql="select * from users where email='$email' and password='$password'";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
       

    }
    else
    {
        echo "<script>alert('deleted Failed');</script>";
        exit();
    }



    // Prepare and execute the DELETE query
    $sql_delete = "DELETE FROM students WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql_delete);
    if (!$stmt) {
        echo "Error: " . mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                    alert('deleted');
                  </script>";

            //echo "Record deleted successfully";    
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>