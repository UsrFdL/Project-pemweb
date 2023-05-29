<?php 
    include 'function.php';
    session_start();

    if (isset($_SESSION['admin'])) {
        if ($_SESSION['admin']) {
            header('Location: manajer.php');
        }
        else {
            header('Location: karyawan.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <script>if (window.history.replaceState) window.history.replaceState( null, null, window.location.href );</script>
    <title>Login</title>
</head>
<body>
    <header>
        <div class="topnav">
            <a href="index.php" class="profil">FGR Innovations</a>
        </div>
    </header>
    <section>
        <form method="post" class="login">
            <h2>Login</h2>
            <div class="inputBox">
                <input type="text" placeholder="Username" name="username">
                <input type="password" placeholder="Password" name="password">
                <input class="loginBtn" type="submit" value="Masuk" name="masuk">
            </div>
            <?php if (isset($_POST['masuk'])) login($_POST); ?>
        </diform>
    </section>
</body>
</html>