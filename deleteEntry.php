<?php
require_once('dbConnection.php');
$id = intval($_GET['id']);

$query = $db->prepare('DELETE
FROM `stamps`
WHERE `id` = :id');

$query->bindParam(':id', $id);
$query->execute();

header('Location: index.php');
