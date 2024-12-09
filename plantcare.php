<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location:login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Grow Guidde</title>
    <link rel="stylesheet" href="basics.css">
    <link rel="stylesheet" href="care.css">
</head>
<body>
    <nav id="navbar">
    <img src="logo.jpg" alt="not loaded" id="logo">
    <ul>
        <li><a href="http://localhost/MiniProject/home.php">Home</a></li>
        <li><a href="http://localhost/MiniProject/plantcare.php">Plant Info</a></li>
        <li><a href="http://localhost/MiniProject/reminders.php">Reminders</a></li>
        <li><a href="http://localhost/MiniProject/logout.php">Log out</a></li>
        <li><b><?php echo $_SESSION['name'] ?></b></li>
    </ul>
    <div class="nav-toggle">
        <img src="hicon.png" alt="Home" id="homeimg">
        <span></span>
    </div>
    </nav>
    <div id="searchsection">
        <h1>Search for plant information</h1> 
        <form action="" method="post">
            <input type="search" name="searchbox" id="searchbox" placeholder="Search for any plant">
            <input type="submit" id="sbutton">
            <div class="card">
                <img src="" alt="">
                <h3>Name : </h3>
                <div> Scientific name: </div>
                <div>Water :</div>
                <div>Description :</div>
            </div>
        </form>
    </div>

    <h1>You also like....</h1>
    <div class="plantcards">
        <div class="card">
            <img src="" alt="">
            <h3>Name : </h3>
            <div> Scientific name: </div>
            <div>Water :</div>
            <div>Description : Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, atque dolore! Eveniet eius reprehenderit assumenda ab voluptatum tempore, autem nihil!</div>
        </div>
        <div class="card">
            <img src="" alt="">
            <h3>Name : </h3>
            <div> Scientific name: </div>
            <div>Water :</div>
            <div>Description : Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, atque dolore! Eveniet eius reprehenderit assumenda ab voluptatum tempore, autem nihil!</div>
        </div>
        <div class="card">
            <img src="" alt="">
            <h3>Name : </h3>
            <div> Scientific name: </div>
            <div>Water :</div>
            <div>Description : Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, atque dolore! Eveniet eius reprehenderit assumenda ab voluptatum tempore, autem nihil!</div>
        </div>
        <div class="card">
            <img src="" alt="">
            <h3>Name : </h3>
            <div> Scientific name: </div>
            <div>Water :</div>
            <div>Description : Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, atque dolore! Eveniet eius reprehenderit assumenda ab voluptatum tempore, autem nihil!</div>
        </div>
        <div class="card">
            <img src="" alt="">
            <h3>Name : </h3>
            <div> Scientific name: </div>
            <div>Water :</div>
            <div>Description : Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, atque dolore! Eveniet eius reprehenderit assumenda ab voluptatum tempore, autem nihil!</div>
        </div>
        <div class="card">
            <img src="" alt="">
            <h3>Name : </h3>
            <div> Scientific name: </div>
            <div>Water :</div>
            <div>Description : Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, atque dolore! Eveniet eius reprehenderit assumenda ab voluptatum tempore, autem nihil!</div>
        </div>
        <div class="card">
            <img src="" alt="">
            <h3>Name : </h3>
            <div> Scientific name: </div>
            <div>Water :</div>
            <div>Description : Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, atque dolore! Eveniet eius reprehenderit assumenda ab voluptatum tempore, autem nihil!</div>
        </div>
        <div class="card">
            <img src="" alt="">
            <h3>Name : </h3>
            <div> Scientific name: </div>
            <div>Water :</div>
            <div>Description : Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, atque dolore! Eveniet eius reprehenderit assumenda ab voluptatum tempore, autem nihil!</div>
        </div>
        
    </div>
    
    <script>
        let a = document.getElementById('homeimg');
        let n = document.querySelector('ul');
        a.addEventListener('click',()=>{
            if(n.style.display == 'none'){
                n.style.display = 'block';
                document.querySelector('span').append(n)
            }else{
                n.style.display = 'none';
            }
        })
    </script>
</body>
</html>

