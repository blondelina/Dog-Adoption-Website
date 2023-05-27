<?php
    $dbUser = 'root';
    $dbPassword = '';
    $dbName = 'WebProject';
    $hostName = 'localhost';
    $connection = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName) or die("Unable to connect");
?>