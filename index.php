<?php 
    include "function.php";
    session_start();

    if (isset($_POST['keluar'])) {
        endSession();
    }

    if (isset($_POST['masuk'])) {
        header('Location: login.php');
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/home.css">
    <title>Portal</title>
</head>
<body>
    <header>
        <div class="topnav">
            <a href="index.php" class="profil">FGR Innovations</a>
            <form method="post">
                <?php 
                if (isset($_SESSION['nama'])) {
                    echo "<a href='login.php' class='profil'>$_SESSION[nama]</a>";
                    echo "<input type='submit' value='Keluar' name='keluar' id='keluar'>";
                }
                else {
                    echo "<input type='submit' value='Masuk' name='masuk' id='masuk'>";
                }
                ?>
            </form>
        </div>
    </header>
    <section>
        <div class="content">
            <div class="sec1">
                <div class="teks">
                    <h1 style="font-size: xx-large; color: #ddd">TransLogistics</h1>
                    <h2 style="font-size: x-large; color: #ddd">Solusi Transportasi Terpercaya dan Efisien</h2>
                    <p style="font-size: large; color: #ddd;">TransLogistics hadir sebagai mitra transportasi yang siap memberikan solusi terpercaya dan efisien untuk kebutuhan logistik bisnis Anda. Kami memiliki armada kendaraan modern dan tim profesional yang berpengalaman dalam mengantarkan barang dengan tepat waktu dan dengan keamanan yang terjamin. Dengan fokus pada keandalan, kecepatan, dan kepuasan pelanggan, kami menyediakan layanan transportasi yang disesuaikan dengan kebutuhan khusus Anda. Dari pengiriman lokal hingga pengiriman lintas negara, TransLogistics menawarkan pengaturan dan pengelolaan logistik yang detail, sehingga Anda dapat fokus pada pertumbuhan dan pengembangan bisnis Anda.</p>
                </div>
            </div>
            <div class="sec2">
                <div class="teks">
                    <h1 style="font-size: xx-large; color: #ddd">FriendlyConnect</h1>
                    <h2 style="font-size: x-large; color: #ddd">Menghubungkan Dengan Pelayanan Pelanggan yang Ramah</h2>
                    <p style="font-size: large; color: #ddd;">Di FriendlyConnect, kami mengerti bahwa pelayanan pelanggan yang ramah dan profesional dapat membuat perbedaan dalam pengalaman pelanggan Anda. Kami bangga menyediakan tim customer service yang terlatih dengan baik, siap untuk memberikan pelayanan yang memuaskan dan memberikan solusi atas kebutuhan dan pertanyaan Anda. Dengan pendekatan yang ramah, responsif, dan penuh perhatian, kami berkomitmen untuk membangun hubungan jangka panjang dengan Anda. Kami akan bekerja sama dengan Anda untuk memastikan kepuasan pelanggan yang tak tergoyahkan dan memastikan setiap interaksi dengan FriendlyConnect menjadi pengalaman yang positif. Jadikan kami mitra pelayanan pelanggan Anda yang andal dan dapat diandalkan.</p>
                </div>
            </div>
            <div class="sec3">
                <div class="teks">
                    <h1 style="font-size: xx-large; color: #ddd">EcoImpact</h1>
                    <h2 style="font-size: x-large; color: #ddd">Menginspirasi Perubahan Positif dengan Dampak Ramah Lingkungan</h2>
                    <p style="font-size: large; color: #ddd;">EcoImpact hadir dengan komitmen kuat untuk memberikan dampak positif terhadap lingkungan. Kami percaya bahwa setiap tindakan kecil dapat membuat perbedaan besar. Dengan solusi inovatif dan ramah lingkungan, kami memungkinkan Anda untuk menjadi bagian dari perubahan positif. Mulai dari produk-produk ramah lingkungan hingga praktik bisnis yang berkelanjutan, kami berusaha mengurangi jejak karbon dan mendorong penggunaan sumber daya yang bertanggung jawab. Bersama-sama, kita dapat menciptakan masa depan yang lebih hijau dan berkelanjutan. Bergabunglah dengan EcoImpact dan mari bersama-sama memberikan dampak positif bagi lingkungan.</p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
