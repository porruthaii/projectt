<?php 
@ini_set('display_errors', '0');
session_start();
include('C:\xampp\htdocs\projectt\server.php'); 
    // include('top.php');
if (isset($_SESSION['username'])) {
    $sql ="SELECT * FROM (comment)";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    echo "logout";
    header('location:\projectt\index.php');
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
    <link rel="stylesheet" href="\projectt\css\admin.css" />
    <style>

    </style>
</head>

<body>
    <?php if (isset($_SESSION['username'])) : ?>

    <div class="topnav fixed-top" id="myDIV">
        <a class="active" href="\projectt\index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a class="login" href="\projectt\index.php?logout='1'"> <i class="fa fa-sign-out" aria-hidden="true"></i>
            Logout</a>
    </div>

    <?php endif ?>

    <form action="\projectt\owl\edit_food.php" method="post">

        <div class="container" align="center">
            <div class="h4">ความคิดเห็นของผู้เชี่ยวชาญ</div>

            <table class="table-striped">
                <tr>

                    <th>ชื่ออาหาร</th>
                    <th>แก้ไข</th>
                </tr>
                <?php 
                        $sql = "SELECT id,name_food,object FROM edit";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                                echo "<td class='data center' >";
                                    echo $row['name_food'];
                                echo "</td>";
                                echo "<td class='data center' >";
                                    echo $row['object'];
                                echo "</td>";
                                echo "<td class='data center' >";
                                echo "<a type ='submit'  align='center' class='link active btn-success form-control' 
                                                name='add_obj' href='/projectt/owl/edit_food.php?id=";  echo $row['id'];echo "'>ลบ</a>";
                            echo "</td>";
                            echo "</tr>";
}
?>
            </table>
        </div>
    </form>

</body>

</html>