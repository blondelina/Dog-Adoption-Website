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
    <title>Signup</title>
</head>

<body>
    <div class="container">
        <div class="formContainer">
            <?php

            include "./connection.php";
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
                $username = $_POST["fusername"];
                $password = $_POST["lpassword"];
                $result = mysqli_query($connection,"SELECT COUNT(*) as total FROM `user` WHERE (`username` = '$username')");
                $count = mysqli_fetch_array($result);
                if($count[0] != 0)
                {
                    echo "<script>alert('Username taken!')</script>";
                }
                else{
                    $sql = "INSERT INTO `user` (`username`,`password`,`isAdmin`) VALUES ('$username','$password',0)";
                    $query = mysqli_query($connection, $sql);
                    if ($query) {
                        $_SESSION["username"] = $username;
                        $_SESSION["isAdmin"] = 0;
                        echo '<script>alert("Successful!")</script>';
                        header('Location: mainpage.php');
                    } else {
                        echo '<script>alert("Unsuccessful :(")</script>';
                    }
                }
            }
            ?>
            <form name="form1" onsubmit="event.preventDefault()" method="POST">
                <h1>Sign up</h1>
                <div class="form">
                    <span>
                        <label for="fusername">Username:</label>
                        <input type="text" id="fusername" name="fusername" required><br><br>
                    </span>
                    <span>
                        <label for="lpassword">Password:</label>
                        <input type="password" id="lpassword" name="lpassword" required><br><br>
                    </span>

                    <span>
                        <label for="lconfirmpassword">Confirm Password:</label>
                        <input type="password" id="lconfirmpassword" name="lconfirmpassword" required><br><br>
                    </span>

                    <div>
                        <a href="login.php" target="_blank">Already have an account?</a>
                    </div>
                    <input type="submit" value="Signup" name="submit" onclick="validateConfirmPassword(document.form1.lpassword,document.form1.lconfirmpassword,document.form1)">
                </div>
            </form>
        </div>
        <footer>
            ® all rights reserverd
        </footer>
    </div>
</body>

</html>