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
        hapus($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="style/employee.css" />
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
					$result = $conn->query($sql);
					while($row = $result->fetch_array()){
						echo "<div class='card'>";
							echo "<span id='judul_subjek'>$row[subjek]</span>";
							echo "<hr/>";
							echo "<span id='isi_subjek'>";
								echo "$row[isi]";
								if ($_SESSION['admin']) {
									echo "<form method='post'>";
										echo "<button class='hapusBtn' type='submit' value='$row[id]' name='hapus'>Delete</button>";
									echo "</form>";
								}
							echo "</span>";
						echo "</div>";
					}
					$conn->close();
				?>
			</section>
		</section>
		<section id="banner">
			<nav>
				<div>
					<form action="" method="post">
						<?php if ($_SESSION["admin"]) echo "<a href='admin.php'>Portal Admin | </a>" ?>
						<a href="index.php">Home</a>
						<button type="submit" name="keluar">Keluar</button>
					</form>
				</div>
			</nav>
			<img src="./img/banner.jpg" alt="Banner" />
		</section>
	</main>
</body>

</html>