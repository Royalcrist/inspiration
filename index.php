<?php 

    $popularItems = array(
        array(
            "title" => "Modern Chair",
            "price" => "22.19€",
            "previusPrice" => "34.59€",
            "img" => "assets\static\home\blackChair.png"
        ),
        array(
            "title" => "Modern Sofa",
            "price" => "31.69€",
            "previusPrice" => "42.29€",
            "img" => "assets\static\home\pinkSofa.png"
        ),
        array(
            "title" => "Modern Chair",
            "price" => "22.19€",
            "previusPrice" => "34.59€",
            "img" => "assets\static\home\blackChair.png"
        ),
        array(
            "title" => "Modern Sofa",
            "price" => "31.69€",
            "previusPrice" => "42.29€",
            "img" => "assets\static\home\pinkSofa.png"
        ),
        array(
            "title" => "Modern Chair",
            "price" => "22.19€",
            "previusPrice" => "34.59€",
            "img" => "assets\static\home\blackChair.png"
        ),
        array(
            "title" => "Modern Sofa",
            "price" => "31.69€",
            "previusPrice" => "42.29€",
            "img" => "assets\static\home\pinkSofa.png"
        )
    );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <title>Inspiration</title>
</head>
<body>
    <?php include './components/header.php'; ?>
    <div class="hero">
        <img src="assets/static/home/banner.jpg" alt="New colection!">
        <h2>New colection!</h2>
    </div>

    <div class="popular">
        <h1>Popular</h1>

        <div class="popular-container">
            <?php foreach ($popularItems as $item): ?>
                <div class="popular-item">
                    <div class="popular-item_img">
                        <img src="./<?php echo $item["img"] ?>" alt="<?php echo $item["title"] ?>">
                    </div>
                    <div class="popular-item_description">
                        <h3><?php echo $item["title"] ?></h3>
                        <span><?php echo $item["previusPrice"] ?></span>
                        <span><?php echo $item["price"] ?></span>
                    </div>   
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    
</body>
</html>