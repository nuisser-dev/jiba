<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BE-PRO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.0/sweetalert2.min.css">
    
    <style>
        body {
            background-color: #fff8e1; /* Soft yellow background */
            font-family: 'Arial', sans-serif; /* Clean font */
        }

        .signup-container {
            max-width: 600px; /* Wider form */
            margin: 50px auto; /* Centered on the page */
            padding: 30px;
            background-color: #ffffff; /* White background for form */
            border: 1px solid #dee2e6; /* Light border */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05); /* Soft shadow for depth */
        }

        .form-label {
            font-weight: 500; /* Slightly bolder labels */
        }

        .btn-primary {
            width: 100%; /* Full width button */
            background-color: #ffc107; /* Yellow button matching the site's theme */
            border-color: #ffc107; /* Border same as background */
        }

        .btn-primary:hover {
            background-color: #e0a800; /* Darker yellow on hover */
            border-color: #d39e00;
        }

        h1.text-center {
            font-size: 2rem;
            font-weight: 700; /* Strong heading */
            margin-bottom: 30px;
            color: #333; /* Darker heading color */
        }

        /* Media query for mobile responsiveness */
        @media (max-width: 768px) {
            .signup-container {
                width: 90%; /* Adjust form width on mobile */
            }

            h1.text-center {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

<!-- Begin nav -->
<?php include "include/header.php"; 

include "include/functions.php";
$user = true;


if (!empty($_POST)) {
    $user = Addvisitor($_POST);
    if ($user) {
        header('location:login.php');
        exit();
    } else {
        echo "signup failed. User not found.";
    }
}










?>
<!-- End nav -->

<div class="signup-container">
    <h1 class="text-center">Sign-Up</h1>
    <form action="signup.php" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username </label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email </label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone </label>
            <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="mp" class="form-control" id="exampleInputPassword1" required>
        </div>

        <button type="submit" class="btn btn-primary">Sign-Up</button>
    </form>
</div>

<?php include "include/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.0/sweetalert2.all.js"></script>
<?php 
$ShowRegistrationAlert=0;
if ($ShowRegistrationAlert == 1) {
  print "
  <script>
    Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: 'Account successfully created',
    confirmationButtonText: 'OK',
    timer: 2000
  })
  </script>
  ";
}
?>

</body>
</html>
