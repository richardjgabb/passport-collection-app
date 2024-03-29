<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

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
                        <option value="date" <?php if(isset($_GET['sortBy']) && $_GET['sortBy'] == 'date'){echo 'selected';}?>>Date</option>
                        <option value="rating" <?php if(isset($_GET['sortBy']) && $_GET['sortBy'] == 'rating'){echo 'selected';}?>>Rating</option>
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
                            echo "<option value=" . $country['country'] . " >" . $country['country'] . "</option>";
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
            ");

            $query->execute();
            $database = $query->fetchAll();

            foreach ($database as $item){
                if ($item['image'] == null){
                    $item['image'] = 'images/default.png';
                }
                $rotation = rand(-40, 40);
                echo "<div class='stamp'>
                <a href='infoPage.php?id={$item['id']}'><img src='{$item['image']}' style='rotate: {$rotation}deg'></a><h3>". $item['airport'] . "</h3>";
                    $i = $item['rating'];
                        echo '<span>' . str_repeat('★', $i) .'</span>';
                    echo "<br></div>";
            }
            ?>
        </section>
    </section>
    </main>

</body>
</html>
