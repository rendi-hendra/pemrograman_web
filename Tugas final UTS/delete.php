<?php
include 'connectdb.php';

$supplier = $_GET['kd_supplier'];
$sql = "DELETE FROM supplier WHERE kd_supplier=$supplier";

if (mysqli_query($conn, $sql)) {
    header("Location: read.php?pesan=berhasil_hapus");
} else {
    header("Location: read.php?pesan=gagal_hapus");
}
exit;
?>
