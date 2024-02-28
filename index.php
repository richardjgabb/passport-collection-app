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
    <header>
        <div class="tripTitleDiv">
            <img id="logoImage" src="#" alt="Logo">
            <section class="sortByDiv">
                <a href="newEntry.php">New trip</a>
                <form action="index.php" method="get">
                    <select name="sortBy" id="sortBy" onchange="this.form.submit();">
                        <option value="" disabled selected hidden>Sort by </option>
                        <option value="date">Date</option>
                        <option value="rating">Rating</option>
                        <option value="country">Country</option>
                    </select>
                </form>
            </section>
        </div>
    </header>

    <main>
        <div class="passportPage">
        <div class="passportDiv">
            <?php
            require_once('dbConnection.php');
            if (!isset($_GET['sortBy'])) {
                $sorter = 'date';
            } elseif (($_GET['sortBy'] === 'date') || ($_GET['sortBy'] === 'country') || ($_GET['sortBy'] === 'rating')) {
                $sorter = $_GET['sortBy'];
            }
            $query = $db->prepare("SELECT `airport`,`country`, `date`, `image`, `rating`, `review`, `id`
            FROM `stamps`
            ORDER BY `" . $sorter . "`;");
            $query->execute();
            $database = $query->fetchAll();

            foreach ($database as $item){
                $rotation = rand(-40, 40);
                echo "<div class='stamp'>
                <a href='infoPage.php?id={$item['id']}'><img src='{$item['image']}' style='rotate: {$rotation}deg'></a>"  .'<br></div>';
            }
            ?>
        </div>
        </div>
    </main>
</body>
</html>
