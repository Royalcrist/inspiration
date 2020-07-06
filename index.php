<?php 

    $popularItems = array(
        array(
            "title" => "Modern Chair",
            "price" => "22.19€",
            "previusPrice" => "34.59€",
            "img" => "assets/static/home/blackChair.png"
        ),
        array(
            "title" => "Modern Sofa",
            "price" => "31.69€",
            "previusPrice" => "42.29€",
            "img" => "assets/static/home/pinkSofa.png"
        ),
        array(
            "title" => "Modern Chair",
            "price" => "22.19€",
            "previusPrice" => "34.59€",
            "img" => "assets/static/home/blackChair.png"
        ),
        array(
            "title" => "Modern Sofa",
            "price" => "31.69€",
            "previusPrice" => "42.29€",
            "img" => "assets/static/home/pinkSofa.png"
        ),
        array(
            "title" => "Modern Chair",
            "price" => "22.19€",
            "previusPrice" => "34.59€",
            "img" => "assets/static/home/blackChair.png"
        ),
        array(
            "title" => "Modern Sofa",
            "price" => "31.69€",
            "previusPrice" => "42.29€",
            "img" => "assets/static/home/pinkSofa.png"
        )
    );

    $inspirations = array(
        array(
            "title" => "Living room",
            "img" => "assets/static/home/inspirations1.jpg",
            "svg" => "assets/static/home/inspirations1.jpg"
        ),
        array(
            "title" => "Living room",
            "img" => "assets/static/home/inspirations1.jpg",
            "svg" => "assets/static/home/inspirations1.jpg"
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
                        <img src="./<?php echo $item["img"]; ?>" alt="<?php echo $item["title"] ?>">
                    </div>
                    <div class="popular-item_description">
                        <h3><?php echo $item["title"]; ?></h3>
                        <span><?php echo $item["previusPrice"]; ?></span>
                        <span><?php echo $item["price"]; ?></span>
                    </div>   
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="inspirations-categories">
        <a class="selected" href="">
            <h1>Minimalism</h1>
        </a>
        <a href="">
            <h1>Nordic</h1>
        </a>
        <a href="">
            <h1>Industrial</h1>
        </a>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" viewBox="0 0 960 1207">
        <defs>
            <pattern id="pattern" width="1" height="1" viewBox="0 74.549 960 1207">
            <image preserveAspectRatio="xMidYMid slice" width="100%" xlink:href="./assets/static/home/inspirations1.jpg"/>
            </pattern>
            <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
            <stop offset="0" stop-color="#fff" stop-opacity="0"/>
            <stop offset="1" stop-opacity="0.4"/>
            </linearGradient>
        </defs>
        <g id="Inspiration" transform="translate(-15.586 -870.055)">
            <rect id="inspirations1" width="100%" rx="8" transform="translate(15.587 870.055)" fill="url(#pattern)"/>
            <rect id="inspirations1-2" data-name="inspirations1" width="100%" rx="8" transform="translate(15.587 870.055)" fill="url(#linear-gradient)"/>
            <g id="Ellipse_6" data-name="Ellipse 6" transform="translate(172.587 1686.055)" fill="none" stroke="#fff" stroke-width="2">
            <ellipse cx="25" cy="25.5" rx="25" ry="25.5" stroke="none"/>
            <ellipse cx="25" cy="25.5" rx="24" ry="24.5" fill="none"/>
            </g>
            <g id="Ellipse_10" data-name="Ellipse 10" transform="translate(584.586 1762.055)" fill="none" stroke="#fff" stroke-width="2">
            <ellipse cx="26.5" cy="26" rx="26.5" ry="26" stroke="none"/>
            <ellipse cx="26.5" cy="26" rx="25.5" ry="25" fill="none"/>
            </g>
            <g id="Ellipse_11" data-name="Ellipse 11" transform="translate(795.587 1623.055)" fill="none" stroke="#fff" stroke-width="2">
            <ellipse cx="25" cy="24.5" rx="25" ry="24.5" stroke="none"/>
            <ellipse cx="25" cy="24.5" rx="24" ry="23.5" fill="none"/>
            </g>
            <g id="Ellipse_7" data-name="Ellipse 7" transform="translate(239.587 1094.055)" fill="rgba(255,255,255,0.8)" stroke="#fff" stroke-width="2">
            <circle cx="25" cy="25" r="25" stroke="none"/>
            <circle cx="25" cy="25" r="24" fill="none"/>
            </g>
        </g>
    </svg>
    <h1>More instpirations</h1>
    <div class="inspirations-group">
        <?php foreach ($inspirations as $inspiration) : ?>

        <div class="inspirations-item">
            <img src="<?php echo $inspiration["img"]; ?>" alt="<?php echo $inspiration["title"]; ?>">
            <h3><?php echo $inspiration["title"]; ?></h3>
        </div>

        <?php endforeach; ?>
    </div>

    <footer>
        <p>Cristian Suárez all rights reserved Copyright</p>
    </footer>

</body>
</html>