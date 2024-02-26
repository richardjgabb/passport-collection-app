<?php

$db = new PDO('mysql:host=db;dbname=passportStampsDatabase', 'root', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT `airport`,`country`, `date`, `image`
FROM `stamps`;');
$query->execute();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Header</h1>
    </header>

</body>
</html>
