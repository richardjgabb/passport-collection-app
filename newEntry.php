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
<section class="passportPage">
    <form action="formComplete.php" method="post">
        <input type="text" name="airport" placeholder="Airport:">
        <input type="text" name="country" placeholder="Country:">
        <input type="date" name="date" placeholder="Date:">
        <input type="text" name="image" placeholder="Passport stamp:">
        <input type="number" min="1" max="5" name="rating" placeholder="Rating:">
        <input type="text" name="review" placeholder="Review:">
        <input type="submit">
    </form>
</section>
</body>
</html>