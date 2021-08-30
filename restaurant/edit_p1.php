<?php  
    session_start();
    include('C:\xampp\htdocs\projectt\server.php');
    include('C:\xampp\htdocs\projectt\top.php');
    if (isset($_SESSION['username'])) {
        $name = $_SESSION['username'];
        $sql = "INSERT INTO restaurant (username) VALUES ('$name')";
        $email = $_SESSION["email"];
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
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/lib/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Home page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@4.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="\projectt\css\regis_p1.css" />

    <style>

    </style>
</head>

<body>
    <?php 
        $user_check_query = "SELECT * FROM restaurant WHERE username = '$name'";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);
        $name_shop = $result['name_shop'];
        $phone_number = $result['phone_number'];
        $time_open = $result['time_open'];
        $id_address = $result['id_address'];
    ?>
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
    <form action="\projectt\db\register_db.php" method="post">
        <div class="container">
            <table style="width:100%">
                <tr class="border-5">
                    <td>
                        <h1>ลงทะเบียนร้านอาหาร </h1>
                    </td>
                </tr>
                <tr class="border-5">
                    <td>
                        <div class="input-group">
                            <input class="form-control" type="text" name="name_shop" placeholder="ชื่อร้านอาหาร"
                                value="<?php echo $name_shop; ?>">
                        </div>
                    </td>
                </tr>
                <tr class="border-5">
                    <td>
                        <div class="input-group">
                            <input type="tel" id="tel" class="form-control" name="phone_number" id="input_tel"
                                placeholder="เบอร์โทรศัพท์" value="<?php echo $phone_number; ?>">
                        </div>
                    </td>
                </tr>
                <tr class="border-5">
                    <td>
                        <p class="h1time col"> เวลาเปิด - ปิด </p>
                        <div class="input-group">
                            <input class="form-control" type="text" name="time_open" placeholder="เช่น 08.00-19.00"
                                value="<?php echo $time_open; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><?php include('location.php'); ?></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="edit1" id="edit1" value="บันทึก" class="form-control btn-success "
                            style="font-size:16px;" href="edit_p2.php" />
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <?php 
    ?>
</body>

</html>