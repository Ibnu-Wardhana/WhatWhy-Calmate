<?php
session_start();
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai input username dan password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa username dan password di database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result && $result->num_rows == 1) {
        // Jika username dan password cocok
        $_SESSION['username'] = $username;
        header("Location: mainPage.php");
    } else {
        // Jika username atau password salah, tampilkan pesan error
        echo "<script>
                    alert('Wrong username or password');
                </script>";
    }
    if ($username === 'admin' && $password === 'admin') {
        // Jika username dan password adalah 'admin', redirect ke halaman adminPage.php
        header("Location: adminPage.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                <h2 class="loginh2">Login</h2>
                <div class="field input">
                    <label>Username:</label>
                    <input type="text" name="username" required>
                </div>
                <div class="field input">
                    <label>Password:</label>
                    <input type="password" name="password" required>
                </div>
                <div class="field">
                    <input type="submit" class="button" value="Login">
                </div>
                <div class="links">
                    Don't have an account yet? <a href="register.php">Sign Up Now</a>
                </div>
            </div>
        </div>

    </form>
</body>

</html>