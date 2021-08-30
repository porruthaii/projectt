<?php 
session_start();
include('C:\xampp\htdocs\projectt\server.php'); 
if (isset($_SESSION['username'])) {
    $name = $_SESSION['username'];
}
?>
<?php  
    $id = $_GET['id'];
    $sql ="SELECT * FROM (restaurants) WHERE id = '$id' ";
    $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){ 
            $id =$row['id'];
            $name_food = $row['name_food'];
            $sql = "DELETE FROM restaurants WHERE restaurants.id = '$id'";
            mysqli_query($conn, $sql);

            $sql ="SELECT * FROM (restauranttype) WHERE name_food = '$name_food' ";
            $result = mysqli_query($conn, $sql);
            
            while($row = mysqli_fetch_array($result)){ 
                $sql = "DELETE FROM restauranttype WHERE restauranttype.name_food = '$name_food'";
                mysqli_query($conn, $sql);
            }
            header('location: \projectt\restaurant\regis_p2.php#fix');
        }        
?>