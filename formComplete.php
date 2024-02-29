<?php
require_once('dbConnection.php');

if ((!isset($_POST['airport'])) || (!isset($_POST['country'])) || (!isset($_POST['date']))){
    echo 'Incomplete Form';
        } else {

    $airport = $_POST['airport'];
    $country = $_POST['country'];
    $date = $_POST['date'];
    $image = $_POST['image'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

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

header('Location: index.php');