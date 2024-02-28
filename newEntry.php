<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <div class="tripTitleDiv">
        <img id="logoImage" src="#" alt="Logo">
        <a href="index.php">Home</a>
    </div>
</header>
<section class="passportPage">
    <form action="formComplete.php" method="post">
        <input type="text" name="airport" class="halfWidth" placeholder="Airport:">
        <input type="text" name="country" class="halfWidth" placeholder="Country:">
        <input type="text" name="image" class="fullWidth" placeholder="Passport stamp:">
        <input type="date" name="date" class="quarterWidth date" placeholder="Date:">
        <input type="number" min="1" max="5" name="rating" class="quarterWidth" placeholder="Rating:">
        <input type="text" name="review" class="fullWidth" placeholder="Review:">
        <input type="submit">
    </form>
</section>
</body>
</html>