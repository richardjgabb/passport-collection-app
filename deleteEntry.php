<?php
require_once('dbConnection.php');
$id = intval($_GET['id']);
$deleted = 1;

$query = $db->prepare('UPDATE `stamps` SET `deleted` = :deleted
WHERE `id` = :id');

$query->bindParam(':id', $id);
$query->bindParam(':deleted', $deleted);
$query->execute();

header('Location: index.php');
