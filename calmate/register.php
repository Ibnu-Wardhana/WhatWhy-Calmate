<?php
session_start();
require_once 'connect.php';

function registrasi($data)
{
    global $conn;

    $username = $data['username'];
    $password = $data['password'];
    $cpassword = $data['cpassword'];

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username already exists')</script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $cpassword) {
        echo "<script>alert('Password does not match')</script>";
        return false;
    }

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");

    return mysqli_affected_rows($conn);
}

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>alert('New user registered successfully!')</script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create Account</title>
    <link rel="stylesheet" type="text/css" href="style.css?d=<?php echo time(); ?>" />
</head>

<body class="login">
    <nav>
        <div class="navbar">
            <div class="logo"><a href='index.php'>CalMate</a></div>
        </div>
    </nav>

    <form method="POST" action="">
        <div class="container">
            <div class="box form-box">
                <h2 class="loginh2">Create Account</h2>
                <div class="field input">
                    <label>Username:</label>
                    <input type="text" name="username" required>
                </div>
                <div class="field input">
                    <label>Password:</label>
                    <input type="password" name="password" required>
                </div>
                <div class="field input">
                    <label>Confirm Password:</label>
                    <input type="password" name="cpassword" required>
                </div>
                <div class="field">
                    <input type="submit" class="button" name="register" value="Create Account">
                </div>
                <div class="links">
                    Have an account already? <a href="login.php">Login Here</a>
                </div>
            </div>
        </div>


    </form>

</body>

</html>