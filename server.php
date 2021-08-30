<?php 
    $servername = "localhost";
    $username = "root";
    $password = "12345";
    $dbname = "register_db";

    // Create Connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_query($conn, "utf8");
   
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    } 
    try {
        $db = new PDO("mysql:host={$servername};dbname={$dbname}",$username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    } catch(PDOException $e) {
      $e->getMessage();
    }

?>