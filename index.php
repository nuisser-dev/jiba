<?php
session_start();
include "include/functions.php";
$categories = getAllCategories();
$products = getAllProducts();
$message = '';

// Check if the form is submitted (POST request)
if (!empty($_POST)) {
    $products = searchproduct($_POST['search']);
} else {
    $products = getAllProducts();
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
            background-color: #fff8e1; /* Soft yellow background */
        }
        .header {
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            padding: 15px 0;
            text-align: center;
        }
        .card {
            border: none;
            transition: transform 0.2s; /* Animation for scaling */
        }
        .card:hover {
            transform: scale(1.05); /* Slight zoom effect on hover */
        }
        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .alert {
            margin: 20px;
        }
    </style>
</head>
<body>

<?php include "include/header.php"; ?>

<!-- Display Message if Button is Clicked -->
<?php if ($message): ?>
    <div class="alert alert-success text-center" role="alert">
        <?= $message ?>
    </div>
<?php endif; ?>

<!-- Begin Product Grid -->
<div class="container mt-4">
    <div class="row">
        <?php foreach($products as $product): ?>
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <img src="pictures/<?php echo $product['image'] ;?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($product['productname']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
                        <a href="product.php?id=<?= $product['id'] ?>" class="btn btn-primary">Display</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include "include/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
