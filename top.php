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
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    * {
        box-sizing: border-box;
    }

    @import 'https://fonts.googleapis.com/css?family=Kanit|Prompt';

    body {
        margin: 0;
        font-family: 'Kanit', sans-serif;
    }

    .topnav {
        height: 40px;
        overflow: hidden;
        background-color: #e9e9e9;
        font-family: 'Kanit', sans-serif;
    }

    .account {
        float: right;
    }

    .account i {
        margin-left: 5px;
    }

    .login,
    .logout {
        float: left;
    }

    .topnav a {
        font-family: 'Kanit', sans-serif;
        display: block;
        color: black;
        text-align: center;
        padding: 10px 16px;
        text-decoration: none;
        font-size: 14px;
        background-color: #c6c6c6;
        margin: 0px;

    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    .topnav a.active {
        float: left;
        background-color: #2196F3;
        color: white;
    }

    .topnav .search-container {
        float: initial;

    }

    @media screen and (max-width: 600px) {
        .topnav .search-container {
            float: none;
        }

        .topnav a,
        .topnav input[type=text],
        .topnav .search-container button {
            float: none;
            display: block;
            text-align: left;
            width: 100%;
            margin: 0;
            padding: 14px;
        }

        .topnav input[type=text] {
            border: 1px solid #ccc;
        }
    }

    .bottom {
        background-color: #3b3b3b;
        height: 40px;
    }
    </style>
</head>

<body>
    <div class="homecontent">
        <?php if (isset($_SESSION['username'])) : ?>
        <div class="topnav fixed-top" id="myDIV">
            <a class="btn active" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            <a class="btn logout" href="index.php?logout='1' " name="logout"> <i class="fa fa-sign-out"
                    aria-hidden="true"></i> Logout</a>

            <?php if(($_SESSION['username'])=="expert") :?>
            <a type="button" class="btn account" href="owl.php">ตรวจสอบข้อมูล
                <i class="fa fa-user-o" aria-hidden="true"></i></a>
            <?php if(($_SESSION['username'])=="admin") :?>
            <a type="button" class="btn account" href="owl.php">ตรวจสอบข้อมูล
                <i class="fa fa-user-o" aria-hidden="true"></i></a>
            <?php else : ?>
            <a type="button" class="btn account" href="account.php">ข้อมูลส่วนตัว
                <i class="fa fa-user-o" aria-hidden="true"></i></a>


            <?php endif ?>
        </div>

    </div>

    <?php endif ?>

    <!-- logged in user information -->
    <?php if (!isset($_SESSION['username'])) : ?>
    <div class="topnav fixed-top">
        <a class="active" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home </a>
        <a href="register.php" class="login">
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