<?php 
@ini_set('display_errors', '0');
    session_start();
    include('C:\xampp\htdocs\projectt\top.php'); 
    include('C:\xampp\htdocs\projectt\server.php');
    if (isset($_SESSION['username'])) {
        $name = $_SESSION['username'];
    }
?>

</html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/lib/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>ร้านอาหาร</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="\projectt\css\homepage.css" />

    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class=".col-xl-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="\projectt\photo\3f.png" alt="...." width="100%">

                        </div>
                        <div class="item">
                            <img src="\projectt\photo\2f.jpg" alt="...." width="100%">

                        </div>
                        <div class="item">
                            <img src="\projectt\photo\4f.jpg" alt="...." width="100%">

                        </div>
                        <div class="item">
                            <img src="\projectt\photo\5f.jpg" alt="...." width="100%">

                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <table class="data">
            <tr>
                <td>
                    <?php 
                        if (isset($_SESSION['username'])) {
                                    
                            $name = $_SESSION['username'];
                            $sql ="SELECT * FROM (restaurant) WHERE username = '$name' ";
                            $result = mysqli_query($conn, $sql);
                               while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td class='h1'>";
                                    echo "ร้าน";echo $row['name_shop']; echo "</br>";
                                    echo "</td>";
                                echo "<tr>";
                                    echo "<td class='data'>";  
                                    echo "<i class='fa fa-location-arrow' aria-hidden='true'></i>" ;   echo $row['id_address']; echo "</br>";
                                    echo "<i class='fa fa-clock-o' aria-hidden='true'></i>"; echo $row['time_open'];echo "</br>";
                                    echo "<i class='fa fa-phone' aria-hidden='true'></i>";    echo $row['phone_number'];echo "</br>";
                                    echo "</td>";
                                echo "</tr>";
                            }
                            }
                        ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="containers">
        <form class="containers" action="webpage.php" name="frmMain" method="post" target="iframe_target">
            <div class="photos form-control">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php" target="iframe">เมนู</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="img.php" target="iframe">รูปภาพ</a>
                    </li>
                </ul>
                <iframe class="photo form-control" id="" name="iframe" src="menu.php"></iframe>
            </div>
        </form>
    </div>
    <div class="row align-items-end">
        <div class="bottom col col-ms-12">
        </div>
    </div>
</body>


</html>