<?php 
    try {
        $db = new PDO("mysql:host=localhost;dbname=PemWeb", "root", "");
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage() . '<br>');
    }

    function kirim($data) {
        global $db;
        if (empty($data['subjek']) || empty($data['isi'])) /* echo "<p>Username atau Password tidak boleh kosong</p>" */;
        else {
            $insert = "INSERT INTO post (subjek, isi) VALUES ('$data[subjek]', '$data[isi]')";
            $prepared = $db->prepare($insert);
            $prepared->execute();
            $db = null;
        }
    } 

    function login($data) {
        global $db;
        if (empty($data['username']) || empty($data['password'])) echo "<p>Username atau Password tidak boleh kosong</p>";
        else {
            $username = $data['username'];
            $password = $data['password'];
            $stmt = $db->prepare("SELECT * FROM user WHERE username = :username");
            $stmt->execute(['username' => $username]);
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $row['password'])) {
                    $_SESSION['admin'] = $row['admin'];
                    $_SESSION['nama'] = $row['nama'];
                    $_SESSION['divisi'] = $row['divisi'];
                    if ($row['admin']) {
                        header('Location: admin.php');
                    }
                    else {
                        header('Location: employee.php');
                    }
                }else {
                    echo "<p>Username atau Password salah.</p>";
                }
            } else {
                echo "<p>Username atau Password salah.</p>";
            }
            $db = null;
        }
    }

    function daftar($data) {
        global $db;
        $username = stripslashes($data['username']);
        $password = $data['password'];
        $password2 = $data['password2'];
        ($data['divisi'] == 'Manajer') ? $admin = 1 : $admin = 0;

        if ($password === $password2) {
            $stmt = $db->prepare('SELECT * FROM user WHERE username = :username');
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch();
            if ($user) {
                echo "<script>alert('User sudah')</script>";
            }
            else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $insert = "INSERT INTO user (username, password, admin, nama, divisi) VALUES ('$username', '$hash', '$admin', '$data[nama]', '$data[divisi]')";
                $prepared = $db->prepare($insert);
                $prepared->execute();
            }
        }
        else {
            echo "<script>alert('Konfirmasi password salah')</script>";
        }
        
    }

    function hapus($data, $ini) {
        global $db;
        $hapus = "DELETE FROM $ini WHERE id=$data[hapus]";
        $prepared = $db->prepare($hapus);
        $prepared->execute();
    }

    function endSession() {
        session_start();
        session_destroy();
        
        header("Location: index.php");
    }

    // function login($data) {
    //     global $conn;
    //     $username = stripslashes($data["username"]);
    //     $password = mysqli_real_escape_string($conn, $data["password"]);
    //     $usrnm = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    //     if ($password === $usrnm["password"]) {
    //         echo "<script>console.log('benar')</script>";
    //     };
    // }
