<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSCS</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>BSCS Record Management System</h1>
    <a href="login.php" class="btn btn-primary">Login</a>
    <a href="register.php" class="btn btn-primary">Signup</a>
    <a href="delete.php" class="btn btn-warning">Delete</a>
    <a href="logout.php" class="btn btn-warning">Logout</a>

    <h2>Students Table</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Class</th>
            <th>Gender</th>
            <th>Dob</th>
            <th>Email</th>
            
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "*k7JBmskrs6", "bscs_record_system");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT name, class, gender, dob, email FROM students";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["class"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["dob"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }

        mysqli_close($conn);
        ?>
    </table>
</body>
</html>