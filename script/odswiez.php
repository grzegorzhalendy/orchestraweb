<?php
session_start();
require_once('mysql_connect.php');
if(isset($_SESSION['user'])){if($_SESSION['user']=='admin'){?>
<?php
    $results=$db->prepare('SELECT * FROM ksiega_gosci WHERE AKCEPTACJA = FALSE ORDER BY ID_WPISU DESC');
    $results->execute();
    $ksiega_gosci=$results->fetchAll(PDO::FETCH_ASSOC);
    $results->closeCursor();
    if ($ksiega_gosci == true){?>
<h2>Wpisy oczekujące na akceptacje</h2>
<?php
        foreach($ksiega_gosci as $ksiega){
        $imie=$ksiega['IMIE'];
        $data=$ksiega['DATA_WPISU'];
        $text=$ksiega['WPIS'];
        $id=$ksiega['ID_WPISU'];
        ?>
    <div class="card col-md-6 offset-md-3 ">
        <h5 class="card-header">
            <?php echo $data; ?>
            <button name="btn_akceptuj" class="btn btn-sx btn-success  btn_akceptuj" data-id=" <?php echo $id; ?>">Akceptuj</button>
            <button name="usun_btn" class="btn btn-sx btn-danger btn_usun" data-id2="<?php echo $id; ?>">Usuń</button>
        </h5>
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $imie; ?>
            </h5>
            <p class="card-text">
                <?php echo $text; ?>
            </p>
        </div>
    </div>

    <?php }}

    $results=$db->prepare('SELECT * FROM ksiega_gosci WHERE AKCEPTACJA = TRUE ORDER BY ID_WPISU DESC');
    $results->execute();
    $ksiega_gosci=$results->fetchAll(PDO::FETCH_ASSOC);
    $results->closeCursor();
    if ($ksiega_gosci == true){?>
    <h2>Wpisy zaakceptowane</h2>
    <?php
        foreach($ksiega_gosci as $ksiega){
        $imie=$ksiega['IMIE'];
        $data=$ksiega['DATA_WPISU'];
        $text=$ksiega['WPIS'];
        $id=$ksiega['ID_WPISU'];?>
        <div class="card col-md-6 offset-md-3 ">
            <h5 class="card-header">
                <?php echo $data; ?>
                <button name="usun_btn" class="btn btn-sx btn-danger btn_usun" data-id2="<?php echo $id; ?>">Usuń</button>
            </h5>
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $imie; ?>
                </h5>
                <p class="card-text">
                    <?php echo $text; ?>
                </p>
            </div>
        </div>
        <?php }}}
}else{
    $results=$db->prepare('SELECT * FROM ksiega_gosci WHERE AKCEPTACJA = TRUE ORDER BY ID_WPISU DESC');
    $results->execute();
    $ksiega_gosci=$results->fetchAll(PDO::FETCH_ASSOC);
    $results->closeCursor();
    if ($ksiega_gosci == true){
    foreach($ksiega_gosci as $ksiega){
    $imie=$ksiega['IMIE'];
    $data=$ksiega['DATA_WPISU'];
    $text=$ksiega['WPIS'];
    ?>
        <div class="card col-md-6 offset-md-3">
            <h5 class="card-header">
                <?php echo $data; ?>
            </h5>
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $imie; ?>
                </h5>
                <p class="card-text">
                    <?php echo $text; ?>
                </p>
            </div>
        </div>
        <?php }}
} ?>
