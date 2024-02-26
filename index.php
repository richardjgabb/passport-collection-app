<?php

$db = new PDO('mysql:host=db;dbname=passportStampsDatabase', 'root', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT `airport`,`country`, `date`, `image`, `airportStarRating`, `review`
FROM `stamps`');
$query->execute();

$database = $query->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Header</h1>
    </header>

    <?php
    foreach ($database as $item){
        echo 'Airport: ' . $item['airport'] .'<br>';
        echo 'Country: ' . $item['country'] .'<br>';
        echo 'Date visited: ' . $item['date'] .'<br>';
        echo 'Image: ' . $item['image'] .'<br>';
        echo 'Rating: ' . $item['airportStarRating'] .'<br>';
        echo 'Review: ' . $item['review'] .'<br><hr>';
    }
    ?>

</body>
</html>
