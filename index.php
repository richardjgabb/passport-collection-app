<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<main>

        <?php
        require_once 'homepage.php';
        ?>


    <section class="content">
    <div class="sort flex" id="passportPage">

        <a href="newEntry.php">New trip</a>

            <div class="dropdowns flex">

                <form action="index.php" method="get">
                    <select name="sortBy" id="sortBy" onchange="this.form.submit();">
                        <option value="" disabled selected hidden>Sort by </option>
                        <option value="date">Date</option>
                        <option value="rating">Rating</option>
                    </select>
                </form>

                <form action="index.php#passportPage" method="get">
                    <select name="countryFilter" id="countryFilter" onchange="this.form.submit();">
                        <option value="" disabled selected hidden>Filter by country</option>
                        <?php
                        require_once('dbConnection.php');
                        $query = $db->prepare("SELECT `country`
                        FROM `stamps`");
                        $query->execute();
                        $countries = $query->fetchAll();
                        echo "<option value='%'>All</option>";

                        foreach ($countries as $country){
                            echo "<option value=".$country['country'].">".$country['country']."</option>";
                        }
                        ?>
                    </select>
                </form>
            </div>

    </div>

        <section class="passportDiv">
            <?php

            if(!isset($_GET['countryFilter']) && (!isset($_SESSION['filter']))) {
                $_SESSION['filter'] = '%';
            }elseif (isset($_GET['countryFilter'])) {
                $_SESSION['filter'] = $_GET['countryFilter'];
            } else {
                $filter = $_SESSION['filter'];
            }

            if (!isset($_GET['sortBy'])) {
                $_SESSION['sorter'] = 'date';
            } elseif (($_GET['sortBy'] === 'date') || ($_GET['sortBy'] === 'rating')) {
                $_SESSION['sorter'] = $_GET['sortBy'];
            }
            $sorter = $_SESSION['sorter'];
            $filter = $_SESSION['filter'];
            $query = $db->prepare("SELECT `airport`,`country`, `date`, `image`, `rating`, `review`, `id`, `deleted`
            FROM `stamps`
            WHERE `deleted` IS NULL && `country` LIKE '$filter'
            ORDER BY `" . $sorter . "`
            LIMIT 9;");

            $query->execute();
            $database = $query->fetchAll();

            foreach ($database as $item){
                $rotation = rand(-40, 40);
                echo "<div class='stamp'>
                <a href='infoPage.php?id={$item['id']}'><img src='{$item['image']}' style='rotate: {$rotation}deg'></a>"  .'<br></div>';
            }
            ?>
        </section>
    </section>
    </main>

</body>
</html>
