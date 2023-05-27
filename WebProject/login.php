<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling.css">
    <script src="index.js"></script>
    <title>Login</title>

</head>

<body>
    <div class="container">
        <div class="formContainer">
            <?php
            include "./connection.php";
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"])) {
                $username = $_GET["lusername"];
                $password = $_GET["lpassword"];
                $result = mysqli_query($connection, "SELECT `username`,`isAdmin` FROM `user` WHERE (`username` = '$username' and `password` = '$password')");
                $user = mysqli_fetch_array($result);
                if ($user != null) {
                    $_SESSION["username"] = $username;
                    $_SESSION["isAdmin"] = $user[1];
                    echo '<script>alert("Successful!")</script>';
                    header('Location: mainpage.php');
                } else {
                    echo '<script>alert("User not found!")</script>';
                }
            }
            ?>
            <form name="form1" id="loginForm" method="GET" onsubmit="event.preventDefault()">
                <h1>Login</h1>
                <div class="form">
                    <span>
                        <label for="lusername">Username:</label>
                        <input type="text" id="lusername" name="lusername" required><br><br>
                    </span>
                    <span>
                        <label for="lpassword">Password:</label>
                        <input type="password" id="inputPassword" name="lpassword" required><br><br>

                    </span>
                    <label id="passwordValidationLabel"></label>

                    <div>
                        <a href="signup.php" target="_blank">Don't have an account? Click here!</a>
                    </div>
                    <input type="submit" value="Login" class="loginButton" name="submit" onclick="validatePassword(document.form1.lpassword,document.form1)">
                </div>
            </form>
        </div>
        <footer>
            ® all rights reserverd
        </footer>
    </div>
</body>

</html>