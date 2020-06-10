<?php

require_once 'autoload.php';

//print_r($products);exit();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Snus Shop</title>
</head>
<body>
<style>
    .col-4{
        display: block; margin-left: auto; margin-right: auto;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col"><h1>Softi Sahtel</h1>
            <div align="right">
                    <a href="https://shop.tak17nurmberg.itmajakas.ee/cart.php" class="btn btn-primary">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Cart
                    </a>
            </div>
            <hr>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col"><?php echo message(); ?></div>
    </div>
    <div class="row">
        <img style="display: block; margin-left: auto; margin-right: auto; width: 50%;" src="images/how%20to%20use.png">
    </div>
        <hr>
    <div class="row">
        <?php if (!empty($products)) : foreach ($products as $product) { ?>
            <div class="col-4">
                <div class="card" style="width: 20rem; ">
                    <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']; ?></h5>
                        <p class="card-text"><?php echo $product['description']; ?></p>
                        <a href="add-to-cart.php?product=<?php echo $product['id']; ?>" class="btn btn-primary">Add to cart <?php echo $product['price']; ?></a>
                    </div>
                </div>
                <br>
            </div>
        <?php } endif; ?>

    </div>
</div>
<footer class="page-footer font-small blue pt-4">
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a> ÕUX Snus OÜ</a>
    </div>
</footer>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>