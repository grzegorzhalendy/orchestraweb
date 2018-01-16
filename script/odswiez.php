<?php
   require_once('mysql_connect.php');
   try {
     global $db;
       $results=$db->prepare('SELECT * FROM ksiega_gosci ORDER BY ID_WPISU DESC');
       $results->execute();
       $ksiega_gosci=$results->fetchAll(PDO::FETCH_ASSOC);
       $results->closeCursor();

   }
catch(Exception $e){
    echo $e->getMessagr();
    exit;
}
if ($ksiega_gosci == true){?>
    <div class="alert alert-success col-md-6 offset-md-3" role="alert">Wpis zakończony sukcesem!<br> Dziękujemy za wpis do księgi gości.</div>
    <?php
    foreach($ksiega_gosci as $ksiega){
    $imie=$ksiega['IMIE'];
    $data=$ksiega['DATA_WPISU'];
    $text=$ksiega['WPIS'];?>
    <div class="card col-md-6 offset-md-3">
        <h5 class="card-header"><?php echo $data; ?></h5>
        <div class="card-body">
            <h5 class="card-title"><?php echo $imie; ?></h5>
            <p class="card-text"><?php echo $text; ?></p>
        </div>
    </div>
    <?php }
 } ?>

