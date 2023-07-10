<?php
// Database connection setup
$host = 'localhost';
$dbname = 'calmate';
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit(); // Stop execution if connection fails
}

// Retrieve all data from the 'foods' table
$stmt = $db->query("SELECT foodName, calories FROM foods");
$foods = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Database Page</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
        }

        table th:last-child,
        table td:last-child {
            border-right: none;
        }

        table th:first-child,
        table td:first-child {
            border-left: 1px solid #ddd;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="style.css?d=<?php echo time(); ?>" />
</head>

<body>
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
    <h1>Admin Page - Database</h1>
    <table>
        <thead>
            <tr>
                <th>Food Name</th>
                <th>Calories</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($foods as $food): ?>
                <tr>
                    <td>
                        <?php echo $food['foodName']; ?>
                    </td>
                    <td>
                        <?php echo $food['calories']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>