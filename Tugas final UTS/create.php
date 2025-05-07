<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $telephon = $_POST['telephon'];

    $sql = "INSERT INTO supplier (nama, alamat, kota, telephon) VALUES ('$nama', '$alamat', '$kota', '$telephon')";
    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success'>Data berhasil ditambahkan.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>
