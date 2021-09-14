<?php
    $buku = array(
        0 => array(
            'nama'=>'Python', 
            'search'=>'python', 
            'catalog'=>'pembelajaran', 
            'img'=>'book/algoritmapython.jpeg'), 
        1 => array(
            'nama'=>'PHP 5', 
            'search'=>'php', 
            'catalog'=>'pembelajaran', 
            'img'=>'book/belajarweb.jpeg'), 
        2 => array(
            'nama'=>'Java Programming', 
            'search'=>'java', 
            'catalog'=>'pembelajaran', 
            'img'=>'book/logikajava.jpeg'), 
        3 => array(
            'nama'=>'Chronicles of Narnia', 
            'search'=>'chronicles of narnia', 
            'catalog'=>'fantasy', 
            'img'=>'book/chroniclesofnarnia.jpeg'), 
        4 => array(
            'nama'=>'Harry Potter: Philosopers Stone', 
            'search'=>'harry potter', 
            'catalog'=>'fantasy', 
            'img'=>'book/harrypotter1.jpeg'), 
        5 => array(
            'nama'=>'Harry Potter: Chambers of Secret', 
            'search'=>'harry potter', 
            'catalog'=>'fantasy', 
            'img'=>'book/harrypotter2.jpeg'), 
        6 => array(
            'nama'=>'Lord of The Ring', 
            'search'=>'lord of the ring', 
            'catalog'=>'fantasy', 
            'img'=>'book/lordofthering.jpeg'), 
        7 => array(
            'nama'=>'One Punch Man: ch 1', 
            'search'=>'one punch man', 
            'catalog'=>'manga', 
            'img'=>'book/opm1.png'), 
        8 => array(
            'nama'=>'One Punch Man: ch 2', 
            'search'=>'one punch man', 
            'catalog'=>'manga', 
            'img'=>'book/opm2.jpeg'), 
        9 => array(
            'nama'=>'Naruto: ch 28', 
            'search'=>'naruto', 
            'catalog'=>'manga', 
            'img'=>'book/naruto28.jpeg'), 
    );

    // Fungsi Display Buku
    function display($book, $katalog = null, $srcvalue = null){
        if ($katalog == 'cari') {
            $result = array();
            foreach ($book as $bukurow => $bukurowval) {
                foreach ($bukurowval as $bukucol => $bukucolval) {
                    if ($bukucolval == $srcvalue) {
                        $result[] = $bukurowval;
                    };
                };
            };
        } elseif ($katalog == 'pembelajaran') {
            $result = array();
            foreach ($book as $bukurow => $bukurowval) {
                foreach ($bukurowval as $bukucol => $bukucolval) {
                    if ($bukucolval == $katalog) {
                        $result[] = $bukurowval;
                    };
                };
            };
        } elseif ($katalog == 'fantasy') {
            $result = array();
            foreach ($book as $bukurow => $bukurowval) {
                foreach ($bukurowval as $bukucol => $bukucolval) {
                    if ($bukucolval == $katalog) {
                        $result[] = $bukurowval;
                    };
                };
            };
        } elseif ($katalog == 'manga') {
            $result = array();
            foreach ($book as $bukurow => $bukurowval) {
                foreach ($bukurowval as $bukucol => $bukucolval) {
                    if ($bukucolval == $katalog) {
                        $result[] = $bukurowval;
                    };
                };
            };
        } else {
            $result = $book;
        }
        return $result;

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Buku</title>
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
            <a href="login.php">Login</a>
        </nav>
    </div>

    <div class="container">

        <!--Sidebar-->
        <div class="search">
            <form action="" method="POST">
                <label for="buku"><center>Cari Buku:</center></label>
                <input type="text" name="buku" id="caribuku" placeholder="Masukkan Nama Buku" autofocus>
                <button type='submit' name='cari'>Cari Buku</button>
            </form>
        </div>
        <div class="catalog">
            <label><center>Katalog Buku</center></label>
            <form action="" method='POST'>
                <ul>
                    <li><button type='submit' name='pembelajaran' values='pembelajaran'>Edukasi</button></li>
                    <li><button type='submit' name='fantasy' values='fantasy'>Fantasy</button></li>
                    <li><button type='submit' name='manga' values='manga'>Manga</button></li>
                </ul>
            </form>
        </div>

        <!--Content-->
        <div class="content">
            <?php
                if (isset($_POST['cari'])) {
                    $pencarian = strtolower($_POST['buku']);
                    $resultt = display($buku, 'cari', $pencarian);
                } elseif (isset($_POST['pembelajaran'])) {
                    $resultt = display($buku, 'pembelajaran');
                } elseif (isset($_POST['fantasy'])) {
                    $resultt = display($buku, 'fantasy');
                } elseif (isset($_POST['manga'])) {
                    $resultt = display($buku, 'manga');
                } else {
                    $resultt = display($buku);
                }
            ?>

            <?php foreach ($resultt as $hasil): ?>
            <div class="item">
                <div class="nama"><?= $hasil['nama']; ?></div>
                <img src="<?=$hasil['img'];?>">
            </div>
            <?php endforeach; ?>

        </div>

        <!--Footer-->
        <div class="footer">
            <div>© Kelompok: 5</div>
            <div>kelas: 19.2B.01</div>
            <div>2021</div>
        </div>

    </div>

    <script src="js/script.js"></script>
</body>
</html>