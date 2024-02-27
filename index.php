<?php
require_once('dbConnection.php');
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
        <form action="index.php" method="get">
            <select name="sortBy" id="sortBy">
                <option value="date">Date</option>
                <option value="rating">Rating</option>
                <option value="country">Country</option>
            </select>
            <input type="submit">
        </form>
    </section>

    <main>
        <div class="passportPage">
        <div class="passportDiv">
            <?php
            if (!isset($_GET['sortBy'])) {
                $sorter = 'date';
            } elseif (($_GET['sortBy'] === 'date') || ($_GET['sortBy'] === 'country') || ($_GET['sortBy'] === 'rating')) {
                $sorter = $_GET['sortBy'];
            }
            $query = $db->prepare("SELECT `airport`,`country`, `date`, `image`, `rating`, `review`
            FROM `stamps`
            ORDER BY `" . $sorter . "`;");
            $query->execute();
            $database = $query->fetchAll();

            foreach ($database as $item){
                $rotation = rand(-20, 20);
                echo "<div class='stamp'>
                <img src='{$item['image']}' style='rotate: {$rotation}deg'>"  .'<br></div>';
            }
            ?>
        </div>
        </div>
    </main>
</body>
</html>
