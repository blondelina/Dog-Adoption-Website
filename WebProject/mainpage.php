<?php session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling.css">
    <title>Home</title>
</head>

<body>
    <header id="menuContainer">
        <a class="active" href="mainpage.php">Home</a>
        <a href="adoptions.php">Up for adoption</a>
        <a href="addadoption.php">Add animal</a>
        <a href="about.php">About</a>
    </header>
    <div class="content">
        <div>
            <h1>Welcome <?php
                        echo $_SESSION["username"];
                        ?> ! </h1>


        </div>
        <h2 style="color: red;">
            <?php
            if ($_SESSION["isAdmin"] == 1) {
                echo "Admin account";
            }
            ?>
        </h2>
        
    </div>
    <footer>
        ® all rights reserverd
    </footer>
</body>

</html>