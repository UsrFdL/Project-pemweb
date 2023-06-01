<?php 
    include 'function.php';
    session_start();

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
    <table>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Admin</th>
            <th>Nama</th>
            <th>Divisi</th>
            <th>Action</th>
        </tr>
    <?php 
    $sql = "SELECT * FROM user";
    $prepared = $db->prepare($sql);
    $prepared->execute();
    $rows = $prepared->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
    echo"<tr>
            <form method='post'>
                <td>$row[id]</td>
                <td>$row[username]</td>
                <td>$row[admin]</td>
                <td>$row[nama]</td>
                <td>$row[divisi]</td>
                <td><button id='Hapus' type='submit' value='$row[id]' name='hapus'>Delete</button></td>
            </form>
        </tr>";
    }
    $db = null;
    ?>
    
    </table>
    <form action="" method="post"><button type="submit" id="buatAkun" name='buatAkun'>Buat akun</button></form>
    <?php 
    if (isset($_POST['buatAkun'])) {
        unset($_POST['close']);
    echo"<form action='' method='post'>
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
            <input class='Close' type='submit' value='X' name='close'>
        </form>";
    }
    ?>
</body>
</html>