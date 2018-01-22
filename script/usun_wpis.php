<?php
require_once('mysql_connect.php');
$id=$_POST['id'];
echo $id;
$query=$db->prepare('DELETE FROM ksiega_gosci WHERE ID_WPISU = :id');
$query->bindParam(':id', $id);
$query->execute();
?>
