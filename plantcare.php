<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:login.php");
    exit;
}

$servername = 'localhost';
$username = 'root';
$password = "";
$database = "plantcare"; 
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die('Cannot connect to the database');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['searchbox']) && !empty($_POST['searchbox'])) {
        $name = $_POST['searchbox'];

        $un = "SELECT * FROM `plantdetails` WHERE `common_plant` = '$name'";
        $result1 = mysqli_query($conn, $un);
        
        if (mysqli_num_rows($result1) > 0) {
            $searchResult = mysqli_fetch_assoc($result1);
        } else {
            $searchResult = "No results found for '$name'.";
        }
    }
}

$plantsQuery = "SELECT * FROM `plantdetails`";
$plantsResult = mysqli_query($conn, $plantsQuery);

if (mysqli_num_rows($plantsResult) > 0) {
    while ($row = mysqli_fetch_assoc($plantsResult)) {
        $plants[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Grow Guide</title>
    <link rel="stylesheet" href="basic.css">
    <link rel="stylesheet" href="plantcare.css">
</head>
<body>
    <nav id="navbar">
        <img src="logo.jpg" alt="not loaded" id="logo">
        <ul>
            <li><a href="http://localhost/MiniProject/home.php">Home</a></li>
            <li><a href="http://localhost/MiniProject/plantcare.php">Plant Info</a></li>
            <li><a href="http://localhost/MiniProject/reminders.php">Reminders</a></li>
            <li><a href="http://localhost/MiniProject/logout.php">Log out</a></li>
            <li><b><?php echo $_SESSION['name']; ?></b></li>
        </ul>
        <div class="nav-toggle">
            <img src="hicon.png" alt="Home" id="homeimg">
            <span></span>
        </div>
    </nav>

    <div id="searchsection">
        <h1>Search for plant information</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="search" name="searchbox" id="searchbox" placeholder="Search for any plant">
            <input type="submit" id="sbutton">
        </form>

        <?php if (isset($searchResult)): ?>
            <?php if (is_array($searchResult)): ?>
                <div class="card">
                    <h3>Name: <i><?php echo htmlspecialchars($searchResult['common_plant']); ?></i></h3>
                    <div><strong>Scientific Name: </strong> <i><?php echo htmlspecialchars($searchResult['scientific_name']); ?></i></div>
                    <div><strong>Watering: </strong> <i><?php echo htmlspecialchars($searchResult['watering']); ?></i></div>
                    <div><strong>Sunlight: </strong><i> <?php echo htmlspecialchars($searchResult['sunlight']); ?></i></div>
                    <div><strong>Poisonous: </strong><i> <?php echo htmlspecialchars($searchResult['poisonous']); ?></i></div>
                    <div><strong>Soil Needed: </strong><i> <?php echo htmlspecialchars($searchResult['soil_needed']); ?></i></div>
                </div>
            <?php else: ?>
                <div class="no-results"><?php echo htmlspecialchars($searchResult); ?></div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <h1>You may also like....</h1>
    <div class="plantcards">
        <?php if (count($plants) > 0): ?>
            <?php foreach ($plants as $plant): ?>
                <div class="card1">
                    <h3>Name: <i><?php echo htmlspecialchars($plant['common_plant']);?></i> </h3>
                    <div><strong>Scientific Name: </strong><i> <?php echo htmlspecialchars($plant['scientific_name']); ?></i></div>
                    <!-- <div><strong>Watering: </strong> <i><?php echo htmlspecialchars($plant['watering']); ?></i></div> -->
                    <!-- <div><strong>Sunlight: </strong><i> <?php echo htmlspecialchars($plant['sunlight']); ?></i></div> -->
                    <!-- <div><strong>Poisonous: </strong> <i><?php echo htmlspecialchars($plant['poisonous']); ?></i></div> -->
                    <div><strong>Soil Needed: </strong><i> <?php echo htmlspecialchars($plant['soil_needed']); ?></i></div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No other plants available to display.</p>
        <?php endif; ?>
    </div>
    <script>
        let a = document.getElementById('homeimg');
        let n = document.querySelector('ul');
        a.addEventListener('click', () => {
            if (n.style.display == 'none') {
                n.style.display = 'block';
                document.querySelector('span').append(n);
            } else {
                n.style.display = 'none';
            }
        });
    </script>
</body>
</html>
