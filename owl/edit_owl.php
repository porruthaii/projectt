<?php 

session_start();
include('C:\xampp\htdocs\projectt\server.php'); 
if (isset($_SESSION['username'])) {
    $sql ="SELECT * FROM (food)";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    echo "logout";
    header('location: index.php');
}
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

    <style>
    @import 'https://fonts.googleapis.com/css?family=Kanit|Prompt';

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: 'Kanit', sans-serif;
        background-color: #ffffff;
        height: 100%;
    }

    .container {
        padding: 10px;
        margin: 40px;
    }

    th,
    td,
    tr {
        padding: 10px;
    }

    a {
        margin-left: 30px;
        width: 70px;

    }
    </style>
</head>

<body>

    <form action="save_owl.php" method="post">
        <form class="containers" action="webpage.php" name="frmMain" method="post" target="iframe_target">
            <div class="container" align="center">
                <table class="table-striped">
                    <tr>
                        <th>id</th>
                        <th>ชื่ออาหาร</th>
                        <th>ประเภท</th>
                    </tr>
                    <?php 
                        $sql = "SELECT id,name_food,object FROM food";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                                echo "<th class='col-2 data center'>";
                                    echo $row['id'];
                                echo "</th>";
                                echo "<td class='data center' >";
                                    echo $row['name_food'];
                                echo "</td>";
                                echo "<td class='data center' >";
                                    echo $row['object'];
                                echo "</td>";
                                echo "<td class='data center' >";
                                    echo "<a type ='submit' align='center' class='link active form-control btn-success col-3 ' 
                                        name='add_obj' href='\projectt\owl\save_owl.php?id=";  echo $row['id'];echo "'>แก้ไข</a>";
                                echo "</td>"; 
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </form>
    </form>
</body>

</html>