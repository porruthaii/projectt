<?php 
    session_start();
    include('C:\xampp\htdocs\projectt\server.php');
    include('C:\xampp\htdocs\projectt\top.php');
    if (isset($_SESSION['username'])) {
        $name = $_SESSION['username'];
        $sql = "INSERT INTO restaurant (username) VALUES ('$name')";
      
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
    <link rel="stylesheet" href="\projectt\css\regis_p2.css" />
</head>

<body>
    <?php include('C:\xampp\htdocs\projectt\errors.php'); ?>
    <?php if (isset($_SESSION['error'])) : ?>
    <div class="error" align="center">
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
            <table>
                <tr>
                    <td width="10"></td>
                    <td>
                        <h1 align="left">เพิ่มเมนูอาหาร</h1>
                        <p class="limn">*เพิ่มชื่ออาหารในร้านอาหารไทยของท่าน</p>
                    </td>
                </tr>
            </table>
            <form action="\projectt\restaurant\edit_namefood.php" method="post">
                <table style="width:100%">
                    <tr>
                        <th scope="col-2" class="h1">#</th>
                        <th scope="col-10" class="h1">ชื่ออาหาร</th>

                        <?php 
                        if (isset($_SESSION['username'])) {
                                $name = $_SESSION['username'];
                                $sql = "SELECT * FROM restaurants WHERE username = '$name'";
                                $result = mysqli_query($conn, $sql);
                                $i=1;
                                while($row = mysqli_fetch_array($result)){
                    
                                    echo "<tr>";
                                    echo "<th class='col-2 data center'>";
                                    echo $i;
                                    echo "</th>";
                                    echo "<td class='data center' >";
                                    echo $row['name_food'];
                                    echo "</td>";
                                    echo "<td class='data center'width='80'>";
                                    echo "<a type ='submit'  align='center' class='link active btn-success ' 
                                                name='add_obj' href='/projectt/restaurant/edit_namefood.php?id="; echo $row['id'];echo "'>ลบ</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $i++;
                                }
                        }
                    ?>
                        </td>
                    </tr>
                </table>
            </form>
            <table>
                <tr>
                    <td width="700">
                        <input class="form-control" type="text" name="addname" placeholder="ชื่ออาหาร">
                    </td>
                    <td width="300"><input type="submit" href="#fix" class="form-control btn-info" value="เพิ่ม"
                            style="font-size:16px;">
                    </td>
                </tr>
            </table>
            <a name="fix"></a>
            <table>
                <tr>
                    <td width="700">
                        <a href="\projectt\owl\explain.php" type="button" class="form-control btn-success "
                            style="font-size:16px;" align="center">เสร็จสิ้น</a>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>

</html>