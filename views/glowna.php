<?php
include '../script/funkcje.php';
?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel data-interval=2000">
    <div class="my-carusel carousel-inner">
        <div class="carousel-item active">
            <img class=" d-block w-100 " src="/img/1K.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 " src="/img/2K.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 " src="/img//3K.jpg" alt="Third slide">
        </div>
         <div class="arrows"></div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>
<div>

    <div class="container">
        <div id="jumbo1" class="jumbotron my-jumbotron">
            <h1>Reaktywacja Orkiestry w roku 1998</h1>
            <p align="justify">
                <?php
                echo open_txt_file("../teksty/glowna_text.txt");
                ?>
            </p>
        </div>
    </div>
</div>
<script>
$(function(){
    $('.arrows').click(function(){
        $('html, body').animate({scrollTop: $("#jumbo1").offset().top},1000,'linear');
    });

});
</script>
