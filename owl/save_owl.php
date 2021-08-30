<?php 
session_start();
include('C:\xampp\htdocs\projectt\server.php'); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="\projectt\css\save_owl.css" />

    <style>

    </style>
</head>

<body>
    <div class="container " align="center">
        <?php  
                $id = $_GET['id'];
                $user_check_query = "SELECT * FROM food WHERE id = '$id' ";
                $query = mysqli_query($conn, $user_check_query);
                $result = mysqli_fetch_assoc($query); 
                $_SESSION['id']=$id;

            echo "<form action='/projectt/db/register_db.php' method='post'>";
                echo "<table class='containers form-control'>"; 
                    echo "<tr>";
                        echo "<td class='data center' width='300' >";
                        echo $result['name_food']; 
                        echo "</td>";
                    echo "<td class='data center' width='300'>";
                        echo "<input type='text' class='form-control' name='object' placeholder='"; echo $result['object'];  echo " ' value='"; echo $result['object'];  echo "'>";
                    echo "</td>";
                    echo "<td class='data center' width='150'>";
                        echo "<button  type='submit' width='100'name='subbmit' class='form-control btn-success col-3 success'>
                            <i class='fa fa-check-square' aria-hidden='true'></i>บันทึก</button>"; 
                    echo "</td>";
                echo "</table>";
            echo "</form>";
        ?>
    </div>
</body>

</html>