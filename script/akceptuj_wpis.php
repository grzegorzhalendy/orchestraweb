<?php
require_once('mysql_connect.php');
$id=$_POST['id'];
echo $id;
$query=$db->prepare('UPDATE ksiega_gosci SET AKCEPTACJA = TRUE WHERE ID_WPISU = :id');
$query->bindParam(':id', $id);
$query->execute();
?>
