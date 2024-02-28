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
    $database = $query->fetchAll();
    $item = $database[0];
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
<header>
    <div class="tripTitleDiv">
        <img id="logoImage" src="#" alt="Logo">
        <a href="index.php">Home</a>
    </div>
</header>
<section class="card">
    <div class="cardTop">
        <div class="cardTopLeft">
            <?php
            echo "<img src='{$item['image']}' style='rotate: -30deg'>";
            ?>
        </div>
        <div class="cardTopRight">
            <?php
            $originalDate = $item['date'];
            $newDate = date("d M Y", strtotime($originalDate));
            echo "<h2>";
                for($i=0; $i<$item['rating']; $i++){
                    echo '<span class="material-symbols-outlined">star</span>';
                    }
            echo "</h2>
            <h2>{$item['airport']}</h2>
            <h2>{$item['country']}</h2>
            <h2>$newDate</h2>"
            ?>
        </div>
    </div>
    <div class="cardBottom">
        <p class="reviewText"><?php echo $item['review']?></p>
        <form action="deleteEntry.php" method="get">
            <input name="id" value="<?php echo $item['id']?>" type='hidden'>
            <button><span class="material-symbols-outlined">delete</span></button>
        </form>
    </div>
</section>
</body>
</html>