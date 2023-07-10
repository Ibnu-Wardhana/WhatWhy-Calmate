<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Calorie Counter</title>
    <link rel="stylesheet" type="text/css" href="style.css?d=<?php echo time(); ?>" />
</head>

<body class="mainPage">
    <nav>
        <div class="navbar">
            <div class="logo"><a href='mainPage.php'>CalMate</a></div>
            <div class="menu">
                <ul>
                    <li><a href="mainPage.php">Calculate</a></li>
                    <li><a href="userDatabase.php">Foods Database</a></li>
                    <!-- <li><a href="premium.php">Premium</a></li> -->
                    <li><a href="logout.php" class="blueButton">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="calculator">
            <h2>BMR Calculator</h2>
            <form method="post">
                <h3>Age</h3>
                <input name="age" type="text">
                <h3>Gender</h3>
                <select name="gender">
                    <option>Male</option>
                    <option>Female</option>
                </select>
                <h3>Height</h3>
                <input name="height" type="text">
                <h3>Weight</h3>
                <input name="weight" type="text">

                <br><input type="submit" class="calculate-button" value="Calculate">

                <?php
                if (isset($_POST['age']) && isset($_POST['weight']) && isset($_POST['height']) && isset($_POST['gender'])) {
                    $age = $_POST['age'];
                    $weight = $_POST['weight'];
                    $height = $_POST['height'];
                    $gender = $_POST['gender'];

                    if (!empty($age) && !empty($weight) && !empty($height)) {
                        switch ($gender) {
                            case 'Female':
                                $bmr = 655 + (9.6 * $weight) + (1.8 * $height) - (4.7 * $age);
                                echo "<p>Your estimated calorie needed in a day is $bmr to maintain your current weight </p>";
                                break;
                            case 'Male':
                                $bmr = 66 + (13.7 * $weight) + (5 * $height) - (6.8 * $age);
                                echo "<p>Your estimated calorie needed in a day is $bmr to maintain your current weight </p>";
                                break;
                        }
                    } else {
                        echo "<p>Please fill in all the required fields.</p>";
                    }
                }
                ?>
            </form>
        </div>
    </div>
</body>

</html>