<?php 
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit(); // Ensure no further code is executed after the redirect
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; /* Light background for better contrast */
            color: #333; /* Dark text for readability */
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Full viewport height */
        }
        .container {
            margin-top: 50px; /* Add top margin for spacing */
            text-align: center; /* Center the text */
            flex: 1; /* Allow the container to grow */
        }
        h1 {
            font-size: 2.5rem; /* Increase font size for the heading */
            margin-bottom: 20px; /* Spacing below the heading */
        }
        .text-yellow {
            color: yellow; /* Change the text color to yellow */
            font-weight: bold; /* Bold for emphasis */
        }
        footer {
            background-color: #343a40; /* Dark background for footer */
            color: white; /* White text for contrast */
            text-align: center; /* Center text in footer */
            padding: 30px 0; /* Increased padding for a larger footer */
            font-size: 1.2rem; /* Larger font size */
            position: relative; /* Position relative to body */
        }
    </style>
</head>
<body>

<?php include "include/header.php"; ?>

<div class="container">
    <h1>Welcome <span class="text-yellow"><?php echo htmlspecialchars($_SESSION['username']); ?></span></h1>
</div>



<footer style="background-color: #343a40; color: white; text-align: center; padding: 50px 0; font-size: 1.5rem; height: 150px;">
    <p>&copy; <?php echo date("Y"); ?> Be-Pro. All rights reserved.</p>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
