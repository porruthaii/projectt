<?php 
@ini_set('display_errors', '0');
    session_start();
    include('C:\xampp\htdocs\projectt\server.php'); 
    if (isset($_SESSION['username'])) {
        $name = $_SESSION['username'];
        $email = $_SESSION["email"]; 
        $sql ="SELECT * FROM (restaurant) WHERE username = '$name' ";
        $sql2 ="SELECT * FROM (restaurants) WHERE username = '$name' ";
        
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);
        $query2 = mysqli_query($conn, $sql2);
        $result2 = mysqli_fetch_assoc($query2);
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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <title>ข้อมูลร้านอาหาร</title>
    <link rel="stylesheet" href="\projectt\css\account.css" />
    <style>
    </style>
</head>

<body>
    <?php if (isset($_SESSION['username'])) : ?>
    <div class="topnav fixed-top" id="myDIV">
        <a class=" active" href="\projectt\index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a class=" login" href="\projectt\index.php?logout='1'"> <i class="fa fa-sign-out" aria-hidden="true"></i>
            Logout</a>
    </div>
    <?php endif ?>
    <?php include('C:\xampp\htdocs\projectt\errors.php'); ?>
    <?php if (isset($_SESSION['error'])) : ?>
    <div class="error">
        <h3>
            <?php 
              echo $_SESSION['error']."!!";
              unset($_SESSION['error']);
                        ?>
        </h3>
    </div>
    <?php endif ?>
    <form action="" method="post">

        <div class="container">
            <div class="row">
                <!-- <div class="col col-sm-1"></div> -->
                <div class="h1 col col-sm-12" style="background-color:#ffffff;">
                    <div class="row " style="margin-left:80px; ">
                        <div class="col-2"><img class="img" src="\projectt\photo\profile.jpg" width="100%"></div>
                        <div class="col-10">
                            <div class="containers">
                                <table style="margin-top:20px;">
                                    <tr>
                                        <th>Username :</th>
                                        <td><?php echo $name ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email :</th>
                                        <td><?php echo $email ?></td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="row" style="margin-top:30px; margin-bottom:0px;">
                        <div class="col-12" align="center">
                            ข้อมูลร้านอาหาร
                        </div>
                        <div class="col-2"></div>
                        <div class="col-10">

                            <div class="containers" align="left">
                                <table>
                                    <tr>
                                        <th>ชื่อร้านอาหาร : </th>
                                        <td><?php echo $result['name_shop']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>จังหวัด : </th>
                                        <td><?php echo $result['id_address']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>เวลา ปิด - เปิด : </th>
                                        <td><?php echo $result['time_open']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>เบอร์ : </th>
                                        <td><?php echo $result['phone_number']; ?></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                    <a name="fix"></a>
                    <div class="container">


                        <div class="row">
                            <div class="col-1"> </div>
                            <div class="col-10">

                                <table align="center" class="row">


                                    <form class="photo" action="" name="frmMain" method="post" target="iframe_target">

                                        <div class="photos form-control">
                                            <ul class="nav nav-tabs">

                                                <li class="nav-item">
                                                    <a class="nav-link" href="\projectt\restaurant\menu.php"
                                                        target="iframe">เมนู</a>

                                                </li>
                                                <li class="nav-item">

                                                    <a class="nav-link" href="img.php" target="iframe">รูปภาพ</a>
                                                </li>
                                            </ul>
                                            <iframe class="photo form-control" id="" name="iframe"
                                                src="\projectt\restaurant\menu.php"></iframe>
                                        </div>
                                    </form>
                                </table>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                    <div name="button" align="center" style="margin-top:20px;">
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-3">
                                <a class="form-control" type="button" name="account"
                                    href="\projectt\restaurant\homepage.php">ร้านอาหาร</a>
                            </div>
                            <div class="col-3">
                                <a class="form-control" href="\projectt\restaurant\edit_p1.php">แก้ไขข้อมูล</a>
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>
<?php 

?>