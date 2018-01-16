<div class="col-md-6 offset-md-3">
    <form id="formularz" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Adres Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@gmail.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Imię</label>
            <input class="form-control" id="imie" name="imie" placeholder="np. Jan">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Twój wpis</label>
            <textarea class="form-control" id="text" name="text" rows="3"></textarea>
        </div>
        <input type="submit" id="idwyslij" name="idwyslij" value="Zapisz" class="my-btn btn btn-success btn-lg btn-block "style="margin-bottom: 20px;">
    </form>
</div>
<div class="content2">
    <?php
   require_once('../script/mysql_connect.php');
       $results=$db->prepare('SELECT * FROM ksiega_gosci ORDER BY ID_WPISU DESC');
       $results->execute();
       $ksiega_gosci=$results->fetchAll(PDO::FETCH_ASSOC);
       $results->closeCursor();

if ($ksiega_gosci == true){?>
 <?php
    foreach($ksiega_gosci as $ksiega){
    $imie=$ksiega['IMIE'];
    $data=$ksiega['DATA_WPISU'];
    $text=$ksiega['WPIS'];?>
    <div class="card col-md-6 offset-md-3 ">
        <h5 class="card-header"><?php echo $data; ?></h5>
        <div class="card-body">
            <h5 class="card-title"><?php echo $imie; ?></h5>
            <p class="card-text"><?php echo $text; ?></p>
        </div>
    </div>
    <?php }
 } ?>
</div>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../script/wpiskg.js"></script>
