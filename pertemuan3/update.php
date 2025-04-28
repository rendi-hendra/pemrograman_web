<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
</head>

<body class="container mt-5">
    <?php
    include 'connectdb.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result); ?>
    <form method="post" action="update.php?id=<?php echo $id; ?>" class="needs-validation" novalidate>
        <div class="has-validation">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
        <div class="has-validation">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" aria-describedby="emailHelp"
                value="<?php echo $row['email']; ?>" required>
            <div class="invalid-feedback">
                Please choose a email.
            </div>
        </div>
        <input type="submit" name="update" value="Update" class="btn btn-primary mt-3 mb-3">
    </form>

    <?php
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            echo "Data berhasil diupdate.";
            header('Location: read.php');
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>

</html>