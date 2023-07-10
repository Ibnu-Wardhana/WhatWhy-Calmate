<?php
session_start();
require_once 'connect.php';

function addFood($data)
{
    global $conn;

    $foodName = $data['foodName'];
    $calories = $data['calories'];

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT foodName FROM foods WHERE foodName = '$foodName'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Food already exists in database')</script>";
        return false;
    }

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO foods (foodName, calories) VALUES ('$foodName', '$calories')");

    return mysqli_affected_rows($conn);
}

if (isset($_POST["addFood"])) {
    if (addFood($_POST) > 0) {
        echo "<script>alert('New Food added!')</script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin - Add Food Page</title>
    <link rel="stylesheet" type="text/css" href="style.css?d=<?php echo time(); ?>" />
</head>

<body class="login">
    <nav>
        <div class="navbar">
            <div class="logo"><a href='adminPage.php'>CalMate</a></div>
            <div class="menu">
                <ul>
                    <li><a href="adminAddFood.php">Add Food to Database</a></li>
                    <li><a href="adminDatabase.php">Food Database</a></li>
                    <li><a href="adminPage.php">Main Menu</a></li>
                    <li><a href="logout.php" class="blueButton">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <form method="POST" action="">
        <div class="container">
            <div class="box form-box">
                <h2 class="loginh2">Add Food to Database</h2>
                <div class="field input">
                    <label>Food Name</label>
                    <input type="text" name="foodName" required>
                </div>
                <div class="field input">
                    <label>Calories</label>
                    <input type="text" name="calories" required>
                </div>
                <div class="field">
                    <input type="submit" class="button" name="addFood" value="Add Food">
                </div>
            </div>
        </div>


    </form>

</body>

</html>