<?php 
session_start();
include('C:\xampp\htdocs\projectt\server.php'); 
if (isset($_SESSION['username'])) {
    $name = $_SESSION['username'];
}
?>
<?php  
   $id = $_GET['id'];
   $sql ="SELECT * FROM (edit) WHERE id = '$id' ";
   $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result)){ 
         $id =$row['id'];
         $sql = "DELETE FROM edit WHERE edit.id = '$id'";
         mysqli_query($conn, $sql);
         header('location: \projectt\account\admin.php#fix');
   }

?>