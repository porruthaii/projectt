<?php 
    session_start();
    include('C:\xampp\htdocs\projectt\server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM users_member WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $query); 
            $loginResult = mysqli_fetch_array($result,MYSQLI_ASSOC);

            if(!$loginResult)
  {
    echo "login Error";
  }
  else
  {
      $_SESSION["username"] = $loginResult["username"];
      $_SESSION["email"] = $loginResult["email"];
      
      session_write_close();
}
            if (mysqli_num_rows($result) == 1) {
                if( $_SESSION['username'] =="admin"){
                    header("location: \projectt\account\admin.php");
                }
                else if( $_SESSION['username'] =="expert"){
                    header("location: \projectt\owl\owl.php");
                    
                }
                else{
                    header("location: \projectt\index.php");
                }
              
            } else {
                array_push($errors, "Wrong Username or Password");
                $_SESSION['error'] = "Wrong Username or Password";
                header("location: \projectt\register.php");
            }
        } else {
            array_push($errors, "Username & Password is required");
            $_SESSION['error'] = "Username & Password is required";
            header("location: \projectt\register.php");
        }
    }

?>