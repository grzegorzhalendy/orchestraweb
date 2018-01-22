<!doctype html>
<?php
    session_start();
?>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/log.js">


    </script>
    <title>Orkiestra Reprezentacyjna Związku Harcerstwa Polskiego Z Żurawicy</title>
</head>

<body>
    <div class="log-view">
        <form action="../script/zaloguj.php" method="post">
            <h1>Logowanie</h1>
            <div class="form-group">
                <input type="email" id="email" name="email"  placeholder="Adres E-mail">
            </div>
            <div class="form-group">
                <input type="password"  id="password" name="password" placeholder="Hasło">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-outline-primary btn-block" value="Zaloguj">
            </div>
            <div class="form-group">
               <a href="../views/zmianahasla.php"> Zpomniałem hasła </a>
            </div>
        </form>
    </div>
    <?php
    if(isset($_SESSION['puste_pola'])) echo $_SESSION['puste_pola'];
    if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
    ?>
</body>

</html>
