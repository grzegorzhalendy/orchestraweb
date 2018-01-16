<?php
session_start();
$_SESSION['strona']='glowna';
header('Content-Type: charset=utf-8');
include 'script/funkcje.php';
require_once('script/mysql_connect.php');
?>

<!doctype html>
<html lang="pl">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
            </ul>
        </div>
    </nav>
    <div class="bg">
        <div class="content">

        </div>
    </div>
</body>

<script type="text/javascript">
    $(window).scroll(function(){
        var top=$(window).scrollTop();
        var find_class_small=$.contains('nav','.small');
        if(top>50 && find_class_small == false){
           $('nav').addClass('small');
        }else{$('nav').removeClass('small')}
    })
    var info = {
        content: "<?php echo $_SESSION['strona'] ?>",
    }
    loadContent("glowna");
    $(".nav-item .nav-link").click(function(e) {

        var content = $(this).attr("data-content");
        if (info.content != content) {
            $(".active").removeClass("active");
            $(this).addClass("active");
            loadContent(content);

        }
        e.stopPropagation();
    });

    function loadContent(content) {
        $.ajax({
            url: 'script/loader.php',
            type: 'post',
            data: {Content: content},
            success: function(response) {
                $(".content").html(response);
                info.content = content;
            }
        });
    }

</script>

</html>
