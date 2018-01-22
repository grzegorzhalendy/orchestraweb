<?php
session_start();
header('Content-Type: charset=utf-8');
include 'script/funkcje.php';
unset($_SESSION['puste_pola']);
unset($_SESSION['blad']);
?>
    <!doctype html>
    <html lang="pl">

    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen" />
        <link rel="stylesheet" href="../css/style.css" />
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>

    <body>
        <nav class="my-nav navbar navbar-expand-lg navbar-dark " id="nav1">
            <a class="navbar-brand" href="#">Harcerska Orkiestra Dęta w Żurawicy </a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item">
                        <a class="nav-link active" data-content="glowna">Strona główna <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Historia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-content="galeria">Galeria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-content="repertuar">Repertuar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-content="sklad">Skład orkiestry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-content="ksiega-gosci">Księga gości</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-content="kontakt">Kontakt</a>
                    </li>
                    <?php if(isset($_SESSION['user'])){
                            if($_SESSION['user']=='admin'){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" data-content="ustawienia">Ustawienia</a>
                    </li>
                    <li class="nav-item" action="../script/wyloguj.php">
                        <a class="nav-link" data-content="wyloguj">Wyloguj</a>
                    </li>
                    <?php } } ?>
                </ul>
            </div>
        </nav>
        <div class="bg">
            <div class="content">

            </div>
        </div>
        <footer class="footer">
            <div class="row">
                <div class="col-sm">col-sm</div>
                <div class="col-sm">
                    <p align="center">Copyright 2018 by Grzegorz Halendy<br>grzegorzhalendy@gmail.com<br>Kopiowanie bez zgody autora zabronione</p>
                </div>
                <div class="col-sm">
                    <img src="img/fbLogo.png" alt="Facebook" height="42" width="42" margin="10px">
                    <a href="views/logowanie.php"><img src="img/settings.png"  alt="Ustawienia" height="40" width="40" margin="10px"></a></div>
            </div>
        </footer>
    </body>

    <script type="text/javascript">
        $(window).scroll(function() {
            var top = $(window).scrollTop();
            var find_class_small = $.contains('nav', '.small');
            if (top > 50 && find_class_small == false) {
                $('nav').addClass('small');
            } else {
                $('nav').removeClass('small')
            }
        })
        var info = {
            content: 'glowna',
        }
        loadContent("glowna");
        $(".nav-item .nav-link").click(function(e) {
            var content = $(this).attr("data-content");
            if (info.content != content) {
                $(".active").removeClass("active");
                $(this).addClass("active");
                    loadContent(content);
            }
            if(content == 'wyloguj'){
                location.href="script/wyloguj.php";
            }
            e.stopPropagation();
        });

        function loadContent(content) {
            $.ajax({
                url: 'script/loader.php',
                type: 'post',
                data: {
                    Content: content
                },
                success: function(response) {
                    $(".content").html(response);
                    info.content = content;
                }
            });
        }

    </script>

    </html>
