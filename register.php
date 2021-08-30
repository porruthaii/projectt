<?php 
    session_start(); 
    include('server.php');
?>
<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="css\register.css" />
</head>

<header>
    <div class="topnav">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
        <div class="search-container">
        </div>
    </div>
</header>

<body>
    <?php include('errors.php'); ?>
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
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="db\register_db.php" method="post">
                <h1>Register for Restaurant</h1>
                <div class="input-group">
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="input-group">

                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="input-group">
                    <input type="password" name="password_1" placeholder="Password">
                </div>
                <div class="input-group">
                    <input type="password" name="password_2" placeholder="Password">
                </div>

                <button type="submit" name="reg_user" href="#">Next</button>
            </form>

        </div>
        <div class="form-container sign-in-container">
            <form action="db\login_db.php" method="post">
                <h1>Login </br>
                    <p class="limn">*สำหรับร้านอาหาร</p>
                </h1>

                <div class="input-group">
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="input-group">

                    <input type="password" name="password" placeholder="Password">
                </div>
                <?php include('errors.php'); ?>
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
                <button type="submit" name="login_user" href="">Login</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome!</h1>
                    <p>login</p>

                    <button class="ghost" id="signIn">Back</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello!</h1>

                    <p>Register for a restaurant</p>
                    <button class="ghost" id="signUp">Go!</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
    </script>
</body>

</html>