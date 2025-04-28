<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="container mt-5">
    <form method="post" action="create.php" class="needs-validation" novalidate>
        <div class="has-validation">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
        <div class="has-validation">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" aria-describedby="emailHelp" required>
            <div class="invalid-feedback">
                Please choose a email.
            </div>
        </div>
        <input type="submit" name="submit" value="Tambah" class="btn btn-primary mt-3 mb-3">
    </form>

    <?php
    include 'connectdb.php';
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = "INSERT INTO users(name, email) VALUES('$name', '$email')";
        if (mysqli_query($conn, $sql)) {
            echo "Data berasil ditambahkan";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>

    <a href="read.php">Lihat Data</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>
</body>

</html>