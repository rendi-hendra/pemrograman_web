<?php include 'connectdb.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Supplier</title>
    <link href="bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2 class="text-center mb-5">Data Supplier</h2>

    <h3>Tambah Data</h3>
    <form method="POST" action="read.php" class="mt-2 row g-3 mb-4">
        <div class="mb-3 col-md-6">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3 col-md-6">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>
        <div class="mb-3 col-md-6">
            <label>Kota</label>
            <input type="text" name="kota" class="form-control" required>
        </div>
        <div class="mb-3 col-md-6">
            <label>No Telephon</label>
            <input type="text" name="telephon" class="form-control" required>
        </div>
        <div class="col-12 mb-3">
            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
        </div>
        <!-- Notifikasi -->
        <?php if (isset($_GET['pesan'])): ?>
            <?php
            $pesan = $_GET['pesan'];
            $alertClass = in_array($pesan, ['berhasil_tambah', 'berhasil_update', 'berhasil_hapus']) ? 'alert-success' : 'alert-danger';
            ?>
            <div class="alert <?= $alertClass ?>">
                <?php
                if ($pesan == 'berhasil_update') echo "Data berhasil diupdate.";
                elseif ($pesan == 'gagal_update') echo "Gagal update data.";
                elseif ($pesan == 'berhasil_tambah') echo "Data berhasil ditambahkan.";
                elseif ($pesan == 'berhasil_hapus') echo "Data berhasil dihapus.";
                elseif ($pesan == 'gagal_hapus') echo "Gagal menghapus data.";
                ?>
            </div>
        <?php endif; ?>

    </form>

    <?php
    // Proses tambah data
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $telephon = $_POST['telephon'];

        $sql = "INSERT INTO supplier (nama, alamat, kota, telephon) VALUES ('$nama', '$alamat', '$kota', '$telephon')";
        if (mysqli_query($conn, $sql)) {
            header("Location: read.php?pesan=berhasil_tambah");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Gagal menambahkan data: " . mysqli_error($conn) . "</div>";
        }
    }

    // Tampilkan data supplier
    $sql = "SELECT * FROM supplier";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0):
    ?>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>KD Supplier</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>No Telephon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <?php if (isset($_GET['edit']) && $_GET['edit'] == $row['kd_supplier']): ?>
                        <!-- Form edit -->
                        <tr>
                            <form method="POST" action="update.php">
                                <input type="hidden" name="kd_supplier" value="<?= $row['kd_supplier'] ?>">
                                <td><?= $row['kd_supplier'] ?></td>
                                <td><input type="text" name="nama" value="<?= $row['nama'] ?>" class="form-control" required></td>
                                <td><input type="text" name="alamat" value="<?= $row['alamat'] ?>" class="form-control" required></td>
                                <td><input type="text" name="kota" value="<?= $row['kota'] ?>" class="form-control" required></td>
                                <td><input type="text" name="telephon" value="<?= $row['telephon'] ?>" class="form-control" required></td>
                                <td>
                                    <button type="submit" name="update" class="btn btn-success btn-sm">Simpan</button>
                                    <a href="read.php" class="btn btn-secondary btn-sm">Batal</a>
                                </td>
                            </form>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td><?= $row['kd_supplier'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td><?= $row['kota'] ?></td>
                            <td><?= $row['telephon'] ?></td>
                            <td>
                                <a href="read.php?edit=<?= $row['kd_supplier'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <!-- <a href="delete.php?kd_supplier=<?= $row['kd_supplier'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a> -->
                                <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row['kd_supplier'] ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning">Tidak ada data.</div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    // Ketika tombol dengan class btn-delete diklik
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Supaya gak langsung jalanin link

            const userId = this.getAttribute('data-id');

            Swal.fire({
                title: 'Yakin mau hapus?',
                text: "Data akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Arahkan ke delete.php jika konfirmasi OK
                    window.location.href = `delete.php?kd_supplier=${userId}`;
                }
            });
        });
    });
    </script>
</body>

</html>