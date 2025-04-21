<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP</title>
    <style>
        h1 {
            color: red;
            text-align: center;
            background-color: gray;
            padding: 10px;
            border-radius: 20px;
        }

        h1:hover {
            color: black;
            background-color: white;
        }
    </style>
</head>
<body>
    <h1>Belajar Pemrograman Server Side Menggunakan PHP</h1>
    
    <? 
        echo "Test PHP<br>";

        $nama = "Rendi";
        $umur = 21;
        $tinggi = 172.5;
        $aktif = true;

        echo "Nama: $nama<br>";
        echo "Umur: $umur tahun<br>";
        echo "Tinggi: $tinggi cm<br>";
        echo "Status Aktif: $aktif<br>";

        $nilai = 85;
        if ($nilai >= 75) {
            echo "Lulus<br>";
        } else {
            echo "Tidak Lulus<br>";
        }

        for ($i = 1; $i <= 5; $i++) {
            echo "Baris ke-$i <br>";
        }

        function salam($nama) {
            return "Hallo, $nama!<br>";
        }

        echo salam("Hendra");

        $buah = ["Apel", "Jeruk", "Mangga"];
        foreach ($buah as $b) {
            echo "Buah: $b<br>";
        }
    ?>

    <form action="proses.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama">
        <input type="submit" value="Kirim">
    </form>
    
</body>
</html>