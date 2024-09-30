<?php
session_start();

if (isset($_SESSION['username'])) {
    header('location:profile.php');
}

include "include/functions.php";
$categories = getAllCategories();
$user = true;

if (!empty($_POST)) {
    $user = VisitorConnection1($_POST);
    
    if ($user) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['mp'] = $user['mp'];
        $_SESSION['phone'] = $user['phone'];
        
        // Ensure no output is sent before redirection
        header('location:profile.php');
        exit(); // It's good practice to exit after header redirection
    } else {

        $user = AdminConnection($_POST);
        if ($user) {
          
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['mp'] = $user['mp'];
        
            header('location:admin/adminprofile.php');
          }
else 
echo "Login failed. User not found.";


    }
}


?>

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
            background: linear-gradient(135deg, #ffcc00, #ff9966);
            color: #333; /* Darker text for better contrast */
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Begin nav -->
    <?php include "include/header.php"; ?>
    <!-- End nav -->
    
    <div class="login-container">
        <h1 class="text-center">Login</h1>
        <form id="loginForm" action="login.php" method="Post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text"></div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="mp" class="form-control" id="exampleInputPassword1" required>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <?php include "include/footer.php"; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.0/sweetalert2.all.js"></script>
    <script>
        // Custom form validation
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            const email = document.getElementById('exampleInputEmail1').value;
            const password = document.getElementById('exampleInputPassword1').value;

            if (!email || !password) {
                event.preventDefault(); // Prevent form submission
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning!',
                    text: 'Please fill in both fields.',
                    confirmButtonText: 'OK',
                });
            }
        });
    </script>
    
 <?php 
    if (!$user) {
       
        print "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Invalid information',
                confirmationButtonText: 'Ok',
            
            });
        </script>
        ";
    }
    ?> 
</body>
</html>
