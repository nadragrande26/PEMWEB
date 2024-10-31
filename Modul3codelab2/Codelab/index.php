<?php

require "Controllers/ProductController.php"; // Use require instead of include

use Controller\ProductController;

$productController = new ProductController();

echo $productController->getAllProduct();
