<?php 
    include 'function.php';
    session_start();

    if (!isset($_SESSION['nama']) || !$_SESSION['admin']) header('Location: login.php');

    if (isset($_POST['keluar'])) endSession();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin.css">
    <script>if (window.history.replaceState) window.history.replaceState( null, null, window.location.href );</script>
    <script src="app.js"></script>
    <title>Portal</title>

</head>

<body style="display: block;">
    <header>
        <div class="topnav">
            <div class="kiri">
                <a href="index.php" class="profil">Home</a>
                <a href="admin.php" id="buat">Buat Post</a>
                <a href="employee.php">Postingan</a>
                <a href="account.php">Account</a>
            </div>
            <div class="tengah"><p class="mclass"><?php echo $_SESSION["divisi"] ?></p></div>
            <div class="kanan">
                <?php echo "<p>$_SESSION[nama]</p>" ?>
                <form action="" method="post"><input class="keluarBtn" type="submit" value="Keluar" name="keluar" id="keluar"></form>
            </div>
        </div>
    </header>
    <section>
        <div class="inputPost">
            <h2>Create Post</h2>
            <div class="inputBox">
                <form action="" method="post">
                    <input class="inputBox" <?php echo (isset($_POST["kirim"]) && empty($_POST["isi"])) ? "id='subjek2'" : "id='subjek'" ?> type="text" placeholder="Subjek" name="subjek">
                    <textarea name="isi" <?php echo (isset($_POST["kirim"]) && empty($_POST["isi"])) ? "id='isi2'" : "id='isi'" ?> placeholder="Isi"></textarea>
                    <input class="kirimBtn" type="submit" value="Kirim" name="kirim" id="kirim">
                    <?php if (isset($_POST['kirim'])) kirim($_POST); ?>
                </form>
            </div>
        </div>
    </section>
</body>

</html>