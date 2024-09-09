<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Send Mail using PHP Mailer</h4>
            </div>
            <div class="card-body">
                <form action="Mailer.php" method="post">
                    <div class="mb-3">
                        <label for="full_name">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" require id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" require id="subject" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="message">Message</label>
                        <input type="text" name="message" require id="message" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary border rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Correctly output PHP session value.
        let message_text = "<?php echo $_SESSION['status'] ?? ''; ?>";
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Thank you!",
            text: message_text,
            showConfirmButton: false,
            timer: 3000
        });
        <?php unset($_SESSION['status']); ?>
    </script>
</body>

</html>