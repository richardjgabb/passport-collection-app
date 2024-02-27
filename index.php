<?php

if (!isset($_POST['airport'])) {

    $airport = $_POST['airport'];
    $country = $_POST['country'];
    $date = $_POST['date'];
    $image = $_POST['image'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    $db = new PDO('mysql:host=db;dbname=passportStampsDatabase', 'root', 'password');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $query = $db->prepare('INSERT INTO `stamps` (`airport`, `country`, `date`, `image`, `rating`, `review`)
    VALUES (:airport, :country, :date, :image, :rating, :review);');

    $query->bindParam(':airport', $airport);
    $query->bindParam(':country', $country);
    $query->bindParam(':date', $date);
    $query->bindParam(':image', $image);
    $query->bindParam(':rating', $rating);
    $query->bindParam(':review', $review);

    $query->execute();
}

$db = new PDO('mysql:host=db;dbname=passportStampsDatabase', 'root', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT `airport`,`country`, `date`, `image`, `rating`, `review`
FROM `stamps`');
$query->execute();

$database = $query->fetchAll();


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="tripTitleDiv">
            <img id="logoImage" src="images/TRIP-Photoroom.png-Photoroom.png" alt="Trip Logo">
        </div>
    </header>

    <section class="filterDiv">
        <select name="filterBy" id="filterBy">
            <option value="date">Date</option>
            <option value="country">Country</option>
            <option value="rating">Rating</option>
        </select>
        <a href="newEntry.php">Add Entry</a>
        <select name="sortBy" id="sortBy">
            <option value="dateNewest">Date, newest first</option>
            <option value="dateOldest">Date, oldest first</option>
            <option value="ratingAscending">Rating, ascending</option>
            <option value="ratingDescending">Rating, descending</option>
        </select>
    </section>

    <main>
        <div class="passportPage">
        <div class="passportDiv">
            <?php
            foreach ($database as $item){
                $rotation = rand(-20, 20);
                echo "<div class='stamp'>
                <img src='{$item['image']}' style='rotate: {$rotation}deg'>"  .'<br></div>';
//                echo '<p class="stampInfoTag">' . $item['country'] . ': '. $item['date'] . '</p></div>';
            }
            ?>

        </div>
        </div>
    </main>
</body>
</html>
