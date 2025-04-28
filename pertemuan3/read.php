<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="container pt-5">
    <?php
    include 'connectdb.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    echo "<a href='create.php'>Tambah Data</a><br><br>";
    if (mysqli_num_rows($result) > 0) {
        echo " <table class='table table-hover'>
        <thead>
            <tr>
                <th scope='col'>id</th>
                <th scope='col'>Name</th>
                <th scope='col'>Email</th>
                <th scope='col'>Aksi</th>
            </tr>
        </thead>
        <tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><th scope='row'>" . $row['id'] . "</th><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td>
            <td><a href='update.php?id=" . $row['id'] . "'>Edit</a> | <a href='#' class='btn-delete' data-id='" . $row['id'] . "'>Hapus</a></td>
            </tr>";
        }
        echo "
        </tbody>
        </table>";
    } else {
        echo "Tidak ada data.";
    }
    ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
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
                window.location.href = `delete.php?id=${userId}`;
            }
        });
    });
});
</script>

</html>