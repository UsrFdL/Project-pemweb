<?php 
    include 'function.php';
    session_start();

    if (!isset($_SESSION['nama']) || !$_SESSION['admin']) header('Location: login.php');

    if (isset($_POST['close'])) unset($_POST['buatAkun']);

    if (isset($_POST['daftar'])) daftar($_POST);

    if (isset($_POST['hapus'])) hapus($_POST, "user");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/account.css">
    <script>if (window.history.replaceState) window.history.replaceState( null, null, window.location.href );</script>
    <title>Account</title>
</head>
<body>
    <header>
        <div class="topnav">
            <div class="kiri">
                <a href="index.php" class="profil">Home</a>
                <a href="admin.php">Buat Post</a>
                <a href="employee.php">Postingan</a>
                <a href="account.php" id="acc">Account</a>
            </div>
            <div class="tengah"><p><?php echo $_SESSION["divisi"] ?></p></div>
            <div class="kanan">
                <?php echo "<p>$_SESSION[nama]</p>" ?>
                <form action="" method="post"><input class="keluarBtn" type="submit" value="Keluar" name="keluar" id="keluar"></form>
            </div>
        </div>
    </header>
    <main>
        <section id="tabel">
            <form method="post" id='atas'>
                <input type="text" name="keyword" id="kotak" autofocus placeholder="Cari" autocomplete="off">
                <button type="submit" name="cari" id="cari">Cari</button>
            </form>
            <div id="area">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Username</th>
                            <th>Admin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql = "SELECT * FROM user";
                        $prepared = $db->prepare($sql);
                        $prepared->execute();
                        $rows = $prepared->fetchAll(PDO::FETCH_ASSOC);
                        if (isset($_POST['cari'])) $rows = cari($_POST['keyword']);
                        foreach ($rows as $row) {
                        echo"<tr id='isi'>
                                <form method='post'>
                                    <td>$row[id]</td>
                                    <td>$row[nama]</td>
                                    <td>$row[divisi]</td>
                                    <td>$row[username]</td>
                                    <td>$row[admin]</td>
                                    <td><button id='hapus' type='submit' value='$row[id]' name='hapus'>Delete</button></td>
                                </form>
                            </tr>";
                        }
                        $db = null;
                        ?>
                    </tbody>
                </table>
            </div>
            <form action="" method="post"><button type="submit" id="buatAkun" name='buatAkun'>Buat akun</button></form>
        </section>
        <?php 
        if (isset($_POST['buatAkun'])) {
            unset($_POST['close']);
            echo"<section id='buat'>
                <form action='' method='post'>
                        <input type='text' placeholder='Nama' name='nama'>
                        <select type='text' placeholder='Divisi' name='divisi'>
                            <option value='Manajer'>Manajer</option>
                            <option value='Human Resource'>Human Resource</option>
                            <option value='Product Management'>Product Management</option>
                            <option value='Marketing'>Marketing</option>
                        </select>
                        <input type='text' placeholder='Username' name='username'>
                        <input type='password' placeholder='Password' name='password'>
                        <input type='password' placeholder='Konfirmasi Password' name='password2'>
                        <input class='daftarBtn' type='submit' value='Daftar' name='daftar'>
                        <input class='close' type='submit' value='X' name='close'>
                    </form>;
                </section>";
            }
        ?>
    </main>
</body>
</html>