<?php
$imie =$_POST['imie'];
$email =$_POST['email'];
$text =$_POST['text'];
$data =date('Y-m-d');
if(isset($email)&&isset($imie)&&isset($text)){
    if(empty($email)){
    }else{
        require_once('mysql_connect.php');
        $query=$db->prepare('INSERT INTO ksiega_gosci VALUES (NULL,:imie,:data,:email,:text)');
        $query->bindParam(':imie', $imie);
        $query->bindParam(':data', $data);
        $query->bindParam(':email', $email);
        $query->bindParam(':text', $text);
        $query->execute();
    }
}else{
    $message = "Formulaż zawiera puste pola.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
