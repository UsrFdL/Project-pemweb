<?php 
	include "function.php";
	session_start();

	if (!isset($_SESSION['nama'])) {
        header('Location: login.php');
    }
	
	if (isset($_POST['keluar'])) {
        endSession();
    }

	if (isset($_POST['hapus'])) {
        hapus($_POST, "post");
    }

	if (isset($_POST['kirim'])) kirimLink($_POST);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="style/employee.css" />
    <script>if (window.history.replaceState) window.history.replaceState( null, null, window.location.href );</script>
	<title>Company A</title>
</head>

<body>
	<main>
		<section id="main">
			<nav>
				<span id="nama_divisi"><?php echo $_SESSION["divisi"] ?></span>
				<span id="nama_lengkap"><?php echo $_SESSION["nama"] ?></span>
			</nav>
			<hr />
			<section id="subjek">
				<?php
					$sql = "SELECT * FROM post";
					$result = $db->query($sql);
					while($row = $result->fetch()){
					echo"<div class='card'>
							<span id='judul_subjek'>$row[subjek]</span>
							<hr/>
							<span id='isi_subjek'>
							$row[isi]
								<form method='post'>";
									if ($row['link'] == null || isset($_POST['edit'])) {
									echo"<div class='inp'><input class='link' type='text' size='27' placeholder='Link' name='link'></div>
										<div class='btn'><button class='kirimBtn' type='submit' value='$row[id]' name='kirim'>Kirim</button>";
									}
									else {
									echo"<div class='inp'><a class='teks' href='$row[link]' name='teks'>$row[link]</a></div>
										<div class='btn'><button class='editBtn' type='submit' value='$row[id]' name='edit'>Edit</button>";
									}
									if ($_SESSION['admin']) echo "<button class='hapusBtn' type='submit' value='$row[id]' name='hapus'>Delete</button>";
								echo"</div>";
						echo"		</form>
							</span>
						</div>";
					}
					$db = null;
				?>
			</section>
		</section>
		<section id="banner">
			<nav>
				<div>
					<form action="" method="post">
						<?php if ($_SESSION["admin"]) echo "<a href='admin.php'>Portal Admin | </a>" ?>
						<a href="index.php">Home</a>
						<button class="keluarBtn" type="submit" name="keluar">Keluar</button>
					</form>
				</div>
			</nav>
			<img src="./img/banner.jpg" alt="Banner" />
		</section>
	</main>
</body>

</html>