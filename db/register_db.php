<?php 
    session_start();
    include('C:\xampp\htdocs\projectt\server.php');
    
    $errors = array();
//register
    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
       
        if (empty($username)) {
            array_push($errors, "Username is required");
            $_SESSION['error'] = "Username is required";
        }
        else if (empty($email)) {
            array_push($errors, "Email is required");
            $_SESSION['error'] = "Email is required";
            
        }
        else if (empty($password_1)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
           
        }
        else if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
            $_SESSION['error'] = "The two passwords do not match";
           
        }

        $user_check_query = "SELECT * FROM users_member WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { 
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
                $_SESSION['error'] = "Username already exists";
                
            }
           else if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
                $_SESSION['error'] = "Email already exists";
            }
        }
        if (count($errors) == 0) {
            $password = md5($password_1);
            $sql = "INSERT INTO users_member (username, email, password) VALUES ('$username', '$email', '$password')";
            mysqli_query($conn, $sql);
            $_SESSION['username'] = $username;
            $_SESSION['email']=$email;
            header('location: \projectt\restaurant\regis_p1.php');
        } else {
            header('location: \projectt\register.php');
        }
    } 
    //regieter namerestaurant
    else if (isset($_POST['submit'])) {
        if (isset($_SESSION['username'])) {
            $name = $_SESSION['username'];
            $name_shop = mysqli_real_escape_string($conn, $_POST['name_shop']);
            $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
            $time_open = mysqli_real_escape_string($conn, $_POST['time_open']);
            $id_address = mysqli_real_escape_string($conn, $_POST['id_address']);
            
            if (empty( $name_shop)) {
                array_push($errors, "error : ไม่ได้ระบุชื่อร้านอาหาร");
                $_SESSION['error'] = "error : ไม่ได้ระบุชื่อร้านอาหาร";
            }
            else if (empty( $phone_number)) {
                array_push($errors, "error : ไม่ได้ระบุเบอร์");
                $_SESSION['error'] = "error : ไม่ได้ระบุเบอร์";
                
            }
            else if (empty( $time_open)) {
                array_push($errors, "error : ไม่ได้ระบุเวลาเปิดปิด");
                $_SESSION['error'] = "error : ไม่ได้ระบุเวลาเปิดปิด";
               
            }
            else if (empty($id_address)) {
                array_push($errors, "error : ไม่ได้ระบุจังหวัด");
                $_SESSION['error'] = "error : ไม่ได้ระบุจังหวัด";
               
            }
            $user_check_query = "SELECT * FROM restaurant WHERE name_shop = '$name_shop' LIMIT 1";
            $query = mysqli_query($conn, $user_check_query);
            $result = mysqli_fetch_assoc($query);
    
            
            if (count($errors) == 0) {
                
            $sql = "INSERT INTO restaurant (username,name_shop,phone_number,time_open,id_address) VALUES ('$name','$name_shop','$phone_number','$time_open','$id_address')";
            mysqli_query($conn, $sql);
            echo $name_shop;
            $_SESSION['uername'] = $username;
            $_SESSION['name_shop'] = $name_shop;
            $_SESSION['phone_number'] = $phone_number;
            $_SESSION['time_open'] = $time_open;
            $_SESSION['id_address'] = $id_address;
            header('location: \projectt\restaurant\regis_p2.php');
            }
            else {
                header('location: \projectt\restaurant\regis_p1.php');
            }
        }
     }
     //add namefood
     else if (isset($_POST['addname'])) {
       
        if (isset($_SESSION['username'])) {
            $name = $_SESSION['username'];
            $addname = $_POST['addname'];

            $name_food = mysqli_real_escape_string($conn, $_POST['addname']);
            $user_check_query = "SELECT name_food FROM food WHERE name_food = '$name_food'";
            $query = mysqli_query($conn, $user_check_query);
            $result = mysqli_fetch_assoc($query);
    
            if (empty($name_food)) {
                array_push($errors, "error : ไม่ได้ระบุชื่ออาหาร");
                $_SESSION['error'] = "error : ไม่ได้ระบุชื่ออาหาร";
            }
            if (count($errors) == 0) {
            $sql = "SELECT * FROM food WHERE name_food LIKE '%$addname%'";
            $result = mysqli_query($conn,$sql);
           
            $sql = "INSERT INTO restaurants (username,name_food) VALUES ('$name','$name_food') ";
            mysqli_query($conn, $sql); 
                while($row = mysqli_fetch_array($result)){ 
                    $sqll = "SELECT * FROM (food) WHERE name_food = '$name_food'";
                    $resultt = mysqli_query($conn,$sqll);
                        while($row = mysqli_fetch_array($resultt)){
                        echo 'ชื่ออาหาร : '.$name_food;   echo "</br>";
                        echo  $type_food = $row['object'];
                        $sql = "INSERT INTO restauranttype (username,name_food,type_food) VALUES ('$name','$name_food','$type_food')";
                        mysqli_query($conn, $sql);
                header('location: \projectt\restaurant\regis_p2.php#fix');
                        }
                }      
                header('location: \projectt\restaurant\regis_p2.php#fix');
            }else{
                header('location: \projectt\restaurant\regis_p2.php#fix');
            }
        }
    }
    //expert comment
    else if (isset($_POST['subbmit'])) {
         if (isset($_SESSION['username'])) { 
            $object = mysqli_real_escape_string($conn, $_POST['object']); 
            $id = $_SESSION['id'];
            if (empty( $object)) {
                array_push($errors, "error : โปรดระบุ");
                $_SESSION['error'] = "error : โปรดระบุ";
            }
            if (count($errors) == 0) {
                $sqli = "UPDATE food SET object = 'กำลังทำการแก้ไข' WHERE id='$id'";
                $sqlii = "UPDATE food SET comment = '$object' WHERE id='$id'";
                $sql = "SELECT name_food FROM food WHERE id=$id";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result)){
                    $name_food = $row['name_food'];
                    $sql = "INSERT INTO edit (object,name_food) VALUES ('$object','$name_food')";
                    mysqli_query($conn, $sql);
                }
                mysqli_query($conn, $sqli);
                mysqli_query($conn, $sqlii);
                header('location: \projectt\owl\edit_owl.php');
            }
        }
    }
    //edit restaurant
    else if (isset($_POST['edit1'])) {
        if (isset($_SESSION['username'])) {
            $name = $_SESSION['username'];
            $name_shop = mysqli_real_escape_string($conn, $_POST['name_shop']);
            $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
            $time_open = mysqli_real_escape_string($conn, $_POST['time_open']);
            $id_address = mysqli_real_escape_string($conn, $_POST['id_address']);
            if (empty( $name_shop)) {
                array_push($errors, "error : ไม่ได้ระบุชื่อร้านอาหาร");
                $_SESSION['error'] = "error : ไม่ได้ระบุชื่อร้านอาหาร";
            }
            else if (empty( $phone_number)) {
                array_push($errors, "error : ไม่ได้ระบุเบอร์");
                $_SESSION['error'] = "error : ไม่ได้ระบุเบอร์";
                
            }
            else if (empty( $time_open)) {
                array_push($errors, "error : ไม่ได้ระบุเวลาเปิดปิด");
                $_SESSION['error'] = "error : ไม่ได้ระบุเวลาเปิดปิด";
               
            }
            else if (empty($id_address)) {
                array_push($errors, "error : ไม่ได้ระบุจังหวัด");
                $_SESSION['error'] = "error : ไม่ได้ระบุจังหวัด";
               
            }
            $user_check_query = "SELECT * FROM restaurant WHERE name_shop = '$name_shop' LIMIT 1";
            $query = mysqli_query($conn, $user_check_query);
            $result = mysqli_fetch_assoc($query);

            if (count($errors) == 0) {
               
                $sql = "UPDATE restaurant SET name_shop = '$name_shop' WHERE username='$name'";
                $sql2 = "UPDATE restaurant SET phone_number = '$phone_number' WHERE username='$name'";
                $sql3 = "UPDATE restaurant SET time_open = '$time_open' WHERE username='$name'";
                $sql4 = "UPDATE restaurant SET id_address = '$id_address' WHERE username='$name'";
                mysqli_query($conn, $sql);
                mysqli_query($conn, $sql2);
                mysqli_query($conn, $sql3);
                mysqli_query($conn, $sql4);
               header('location: \projectt\restaurant\edit_p2.php');
            }
           
            else {
                header('location: \projectt\restaurant\edit_p1.php');
            }
        }
     }
     //delete comment
     else if (isset($_POST['del_obj'])) {
        $id = $_POST['id'];
        $sql ="SELECT * FROM (edit) WHERE id = '$id' ";
        $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_array($result)){ 
            $id =$row['id'];
            $name_food = $row['name_food'];
            $sql = "DELETE FROM edit WHERE edit.id = '$id'";
            mysqli_query($conn, $sql);
            header('location: \projectt\account\admin.php#fix');
           }  
   }
   

?>