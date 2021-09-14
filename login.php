<?php
    session_start();
    if (isset($_POST['logout'])) {
        unset($_SESSION);
        session_destroy();
    } elseif (isset($_POST['login'])) {
        $_SESSION['user'] = $_POST['username'];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <!--Header-->
    <div class="header">
        <div class="logo">
            Perpustakaan<br>Kelompok 5
        </div>
        <div class="menu" onclick="display()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <nav class="nav">
            <a href="index.html">Home</a>
            <a href="program.html">Programs</a>
            <a href="service.html">Service</a>
            <a href="catalog.php">Catalog</a>
        </nav>
    </div>

    <!--Login Box-->
    <div class="login-container">
        <div class="boxlogin">

            <?php
                if (isset($_SESSION['user'])) {
                    echo "
                    <h1>Hello!</h1>
                    <div class='txt' style='margin-bottom: 20px; letter-spacing:3px'>". $_SESSION['user'] ."</div>";
                    echo "<form action='' method='POST'><button type='submit' name='logout'>Logout</button></form>";
                } else {
            ?>
                <form action="" method='POST'>
                    <h1>Login</h1>
                    <label for="username">
                        <input type="text" name="username" placeholder='Username' required>
                    </label>
                    <label for="password">
                        <input type="password" name="password" placeholder='Password' required>
                    </label>
                    <button type='submit' name='login'>Login</button>
                </form>
            <?php
                }
            ?>

        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>