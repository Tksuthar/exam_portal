<?php
$servername = "localhost";
$username = "u334693525_hellboy0763";
$password = "Mudit@8512";
try {
    $conn = new PDO("mysql:host=$servername;dbname=u334693525_db_MSA", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connection established ";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>