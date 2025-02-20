<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Grow Guide</title>
    <link rel="stylesheet" href="basic.css">
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

    <h1>Reminders Page</h1>

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
