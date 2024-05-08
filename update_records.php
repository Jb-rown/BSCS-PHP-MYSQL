<!-- update.php -->
<?php
// Retrieve the value of email from the URL query parameters
$email = isset($_GET['email']) ? $_GET['email'] : '';

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve the value of email from the hidden input field
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Establish database connection
    $conn = mysqli_connect("localhost", "root", "*k7JBmskrs6", "bscs_record_system");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Extract data from the form
    $useremail = $email; // Assign $email directly, as it's already obtained from the URL
    $name = $_POST['name'];
    $class = $_POST['class'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
  

    // Prepare SQL query
    $sql = "UPDATE students SET name = '$name', dob = '$dob', gender = '$gender' WHERE email = '$useremail'";

    // Execute query
    if (mysqli_query($conn, $sql)) {
        $affected_rows = mysqli_affected_rows($conn);
       // echo "Record updated successfully. Affected rows: " . $affected_rows . ". User email: " . $useremail;
         echo "<script>
        var email = '$email'; 
        var url = 'index.php?email=' + encodeURIComponent(email);
        alert('Records updated successful');
        window.location = url;
        </script>";

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>update Record</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Update Record</h2>
    <h1 id="user"><?php echo  " Login in as" . $email; ?></h1>
    <form method="post" action="update_records.php">
    <input type="hidden"class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>">
        Name: <input type="text"class="form-control" name="name" required><br>
        Class: <input type="text"class="form-control" name="class" required><br>
        Gender: 
        <select name="gender" class="form-control" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        <br>
        Date of Birth: <input type="date" class="form-control" name="dob" required><br>
        <input type="submit"class="btn btn-primary" name="submit" value="Submit"></form></br>
    </form>
    <a href="index.php"class="btn btn-primary">home</a>
</div>


</body>
</html>