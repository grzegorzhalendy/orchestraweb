<?php
session_start();
if($_POST['email']!='' && $_POST['password']!=''){
    $email=$_POST['email'];
    $haslo=$_POST['password'];
    $a=isset($_POST['email'], $_POST['password']);
    echo $a;
    echo 'wyłączyłem sesje1';
    unset($_SESSION['puste_pola']);
    require_once('mysql_connect.php');
    $results=$db->prepare('SELECT * FROM admini WHERE adres_email = :email AND haslo = :haslo');
    $results->bindParam(':haslo', $haslo);
    $results->bindParam(':email', $email);
    $results->execute();
    $admin=$results->fetch(PDO::FETCH_ASSOC);
    if($results->rowCount()>0){

        $imie = $admin['IMIE'];
        $nazwisko = $admin['NAZWISKO'];
        $haslo2 =  $admin['HASLO'];
        $results->closeCursor();
        if($haslo==$haslo2){
            $_SESSION['user']= 'admin';
            unset($_SESSION['blad']);
            header('Location: ../index.php');
        }
    }else{
        $_SESSION['blad'] = '<div class="alert alert-danger" role="alert"> Nieprawudłowy e-mail lub hasło!</div>';
        header('Location: ../views/logowanie.php');
        }
}
else{
        $_SESSION['puste_pola'] = '<div class="alert alert-danger" role="alert"> Puste pole formularza</div>';
        header('Location: ../views/logowanie.php');
        }

?>
