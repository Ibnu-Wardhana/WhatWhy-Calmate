<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Main Page</title>
    <link rel="stylesheet" type="text/css" href="style.css?d=<?php echo time(); ?>" />
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo"><a href=''>CalMate</a></div>
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
    <div>
        <!-- home -->
        <div class="adminPage">
            <h1>Welcome to Admin Page</h1>
            <p>Click on the functions in the navigation bar above.</p>
        </div>

</body>

</html>