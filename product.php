<?php 
include "include/functions.php";
$categories = getAllCategories();

if (isset($_GET['id'])) {
    $product = GetProductById($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BE-PRO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #e9ecef; /* Light gray background */
            color: #333; /* Dark text for readability */
            font-family: Arial, sans-serif; /* Font style for better readability */
        }
        .product-card {
            margin: 50px auto; /* Center the card with margin */
            padding: 30px; /* Increased inner padding */
            border: 1px solid #ced4da; /* Light border */
            border-radius: 8px; /* Rounded corners */
            background-color: #ffffff; /* White background */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Soft shadow */
            transition: transform 0.2s; /* Smooth transition on hover */
            width: 80%; /* Increased card width */
        }
        .product-card:hover {
            transform: scale(1.02); /* Slight zoom on hover */
        }
        .card-title {
            font-size: 1.5rem; /* Larger title font size */
            font-weight: bold; /* Bold title */
        }
        .card-text {
            font-size: 1rem; /* Standard font size for text */
        }
        .card-img-top {
            width: 100%; /* Make the image responsive */
            height: auto; /* Maintain aspect ratio */
            max-width: 500px; /* Set maximum width for the image */
            margin: 0 auto; /* Center the image */
            border-radius: 5px; /* Rounded corners for the image */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Soft shadow for the image */
        }
        /* Adding media query for responsive design */
        @media (max-width: 768px) {
            .product-card {
                width: 90%; /* Adjust width for smaller screens */
            }
        }
    </style>
</head>
<body>

<?php include "include/header.php"; ?>

<!-- Begin Product Display -->
<div class="row col-12 mt-4">
    <div class="card product-card col-8 offset-2">
        <img src="pictures/<?php echo isset($product['image']) ? $product['image'] : 'placeholder.jpg'; ?>" class="card-img-top" alt="<?php echo isset($product['productname']) ? htmlspecialchars($product['productname']) : 'Product Image'; ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo isset($product['productname']) ? htmlspecialchars($product['productname']) : 'Product Name Not Available'; ?></h5>
            <p class="card-text"><?php echo isset($product['description']) ? htmlspecialchars($product['description']) : 'Description Not Available'; ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?php echo isset($product['price']) ? htmlspecialchars($product['price']) : 'Price Not Available'; ?> DT</li>
            <li class="list-group-item"><?php echo isset($product['category']) ? htmlspecialchars($product['category']) : 'Category Not Available'; ?></li>
        </ul>
    </div>
</div>

<?php include "include/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
