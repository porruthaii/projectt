<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
        include('server.php');
    } 
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
    }
    if (isset($_SESSION['username'])) {
        $_SESSION['username'];
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="\projectt\css\top.css" />

    <style>

    </style>
</head>

<body>
    <div class="homecontent">
        <?php if (isset($_SESSION['username'])) : ?>


        <div class="topnav fixed-top" id="myDIV">
            <a class=" active" href="\projectt\index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            <a class=" logout" href="\projectt\index.php?logout='1' " name="logout"> <i class="fa fa-sign-out"
                    aria-hidden="true"></i> Logout</a>

            <?php if(($_SESSION['username']) == "expert") :?>
            <a type="button" class=" account" href="\projectt\owl\owl.php">ตรวจสอบข้อมูล
                <i class="fa fa-user-o" aria-hidden="true"></i></a>
            <?php elseif(($_SESSION['username']) == "admin") :?>
            <a type="button" class=" account" href="\projectt\account\admin.php">ตรวจสอบข้อมูล
                <i class="fa fa-user-o" aria-hidden="true"></i></a>
            <?php else : ?>
            <a type="button" class=" account" href="\projectt\account\account.php">ข้อมูลส่วนตัว
                <i class="fa fa-user-o" aria-hidden="true"></i></a>
            <?php endif ?>
        </div>

    </div>

    <?php endif ?>

    <!-- logged in user information -->
    <?php if (!isset($_SESSION['username'])) : ?>
    <div class="topnav fixed-top">
        <a class="active" href="C:\xampp\htdocs\projectt\index.php"><i class="fa fa-home" aria-hidden="true"></i> Home
        </a>
        <a href="\projectt\register.php" class="login">
            <i class="fa fa-sign-out" aria-hidden="true"></i>Login </a>

    </div>

    <?php endif ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

</body>

</html>