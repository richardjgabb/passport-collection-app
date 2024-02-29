<?php
require_once('dbConnection.php');
if (!isset($_GET['id'])) {
    header('Location: index.php');
} else {
    $id = $_GET['id'];
    $query = $db->prepare("SELECT `airport`, `country`, `date`, `rating`, `review`, `image`, `id`
    FROM `stamps`
    WHERE `id` = $id;");
    $query->execute();
    $item = $query->fetch();

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
</head>
<body>
<main>
    <section class="header hidden">
    <?php
    require_once 'homepage.php';
    ?>
    </section>

    <section class="content beach">
        <?php
        require_once 'navbar.php';
        ?>
        <div class="card">
            <div class="topCard">
                <?php
                echo "<img src='{$item['image']}' style='rotate: -30deg'>";
                ?>
            </div>
            <div class="topCard">
                <?php
                $originalDate = $item['date'];
                $newDate = date("d M Y", strtotime($originalDate));
                echo "<h2>";
                for ($i = 0; $i < $item['rating']; $i++) {
                    echo '<span class="material-symbols-outlined">star</span>';
                }
                echo "</h2>
                    <h2>{$item['airport']}</h2>
                    <h2>{$item['country']}</h2>
                    <h2>$newDate</h2>"
                ?>
            </div>
            <div class="spanTwoColumns">
                <p class="reviewText"><?= $item['review'] ?></p>
                <form action="deleteEntry.php" method="get">
                    <input name="id" value="<?= $item['id'] ?>" type='hidden'>
                    <button><span class="material-symbols-outlined">delete</span></button>
                </form>
            </div>
        </div>
    </section>
</main>
</body>
</html>