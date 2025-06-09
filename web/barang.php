<?php include 'connectdb.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Library Cafe</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
        crossorigin="anonymous" />
</head>

<body>
    <div>
        <nav
            class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body"
            data-bs-theme="dark">
            <div class="container">
                <span class="navbar-brand fw-semibold">Library Cafe</span>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">User</a>
                        </li>
                        <button class="btn btn-danger ms-3">Logout</button>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <table
                class="table table-bordered border-dark table-striped text-center mt-5">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM barang";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <th scope="row"><?= $row['id'] ?></th>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['harga'] ?></td>
                            <td><?= $row['stok'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>