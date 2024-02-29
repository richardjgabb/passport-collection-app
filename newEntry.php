<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
<main>
    <?php
    require_once 'homepage.php';
    ?>


<section class="content beach">
    <?php
    require_once 'navbar.php';
    ?>
    <form class="entryForm" action="formComplete.php" method="post">
        <h1 class="addTripTitle">Add trip</h1>
        <input type="text" name="airport" class="halfWidth" placeholder="City:">
        <input type="text" name="country" class="halfWidth" placeholder="Country:">
        <input type="text" name="image" class="fullWidth" placeholder="Passport stamp:">
        <input type="date" required name="date" class="columnLeft date" placeholder="Date:">
        <input type="number" min="1" max="5" name="rating" class="columnRight" placeholder="Rating:">
        <input type="text" name="review" class="fullWidth details" placeholder="Details:">
        <input type="submit" class="submit">
    </form>
</section>
</main>
</body>
</html>