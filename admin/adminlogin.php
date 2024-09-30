<?php
session_start();

if (isset($_SESSION['username'])) {
  // header(('location:profile.php'));
}

include "../include/functions.php";

$user = true;

if (!empty($_POST)) {
  $user = AdminConnection($_POST);
  if ($user) {
    session_start();
    $_SESSION['email'] = $user['email'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['mp'] = $user['mp'];

    header('location:adminprofile.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BE-PRO</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.0/sweetalert2.min.css">
  <style>
    body {
      background-color: #fff8e1; /* Soft yellow background */
    }

    .container {
      max-width: 600px;
      margin-top: 50px;
      padding: 30px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #007bff;
      font-weight: bold;
      margin-bottom: 30px;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>

<body>
<?php include "../include/header.php"; ?>
  <!-- Begin Form Section -->
  <div class="container">
    <h1 class="text-center">Admin Space: Login</h1>
    <form action="adminprofile.php" method="Post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="mp" class="form-control" id="exampleInputPassword1">
      </div>

      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>
  <!-- End Form Section -->

  <?php include "../include/footer.php"; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.0/sweetalert2.all.js"></script>

  <?php 
  if (!$user) {
    print "
    <script>
      Swal.fire({
      icon: 'error',
      title: 'Error!',
      text: 'Invalid information',
      confirmationButtonText: 'OK',
      timer: 2000
    })
    </script>
    ";
  }
  ?>
</body>

</html>
