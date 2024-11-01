<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Sounds</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 80%;
            max-width: 500px;
            text-align: center;
        }
        .animal {
            margin: 20px 0;
        }
        .animal img {
            width: 150px;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .animal-description {
            font-size: 1.1em;
            margin: 10px 0;
        }
        .animal-sound {
            font-weight: bold;
            color: #007acc;
            font-size: 1.2em;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    require_once 'src/Animal.php';
    require_once 'src/Dog.php';
    require_once 'src/Cat.php';

    use App\Animals\Dog;
    use App\Animals\Cat;

    $dog = new Dog("Bulldog", "Brown");
    $cat = new Cat("Persian", "White");

    // Display for Dog
    echo "<div class='animal'>";
    echo "<img src='image.png' alt='Dog Image'>"; // Replace with actual dog image URL
    echo "<div class='animal-description'>" . $dog->getDescription() . "</div>";
    echo "<div class='animal-sound'>" . $dog->makeSound() . "</div>";
    echo "</div>";

    // Display for Cat
    echo "<div class='animal'>";
    echo "<img src='image2.png' alt='Cat Image'>"; // Replace with actual cat image URL
    echo "<div class='animal-description'>" . $cat->getDescription() . "</div>";
    echo "<div class='animal-sound'>" . $cat->makeSound() . "</div>";
    echo "</div>";
    ?>
</div>

</body>
</html>
