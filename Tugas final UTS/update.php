<?php
include 'connectdb.php';

if (isset($_POST['update'])) {
    $kd_supplier = $_POST['kd_supplier'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $telephon = $_POST['telephon'];

    $sql = "UPDATE supplier SET nama='$nama', alamat='$alamat', kota='$kota', telephon='$telephon' WHERE kd_supplier='$kd_supplier'";

    if (mysqli_query($conn, $sql)) {
        header("Location: read.php?pesan=berhasil_update");
    } else {
        header("Location: read.php?pesan=gagal_update");
    }
    exit;
} else {
    header("Location: read.php");
    exit;
}
?>
