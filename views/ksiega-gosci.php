<!--------Widok dla Administratora---->
<?php session_start();
if(isset($_SESSION['user'])){
    if($_SESSION['user']=='admin'){  ?>
    <div class="content2">

        <?php
       require_once('../script/mysql_connect.php');
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
                        <button name="btn_akceptuj" class="btn btn-sx btn-success  btn_akceptuj" data-id=" <?php echo $id; ?>" >Akceptuj</button>
                        <button name="usun_btn" class="btn btn-sx btn-danger btn_usun" data-id2="<?php echo $id; ?>" >Usuń</button>
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

    <?php }} ?>

<?php

       require_once('../script/mysql_connect.php');
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
                        <button name="usun_btn" class="btn btn-sx btn-danger btn_usun" data-id2="<?php echo $id; ?>" >Usuń</button>
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
    <?php }} ?>
</div>
<!-----Widok dla gościa---------->
<?php  } } else{ ?>
    <div class="content2">
    <div class="col-md-6 offset-md-3">
        <form id="formularz" method="post" autocomplete="on">
            <div class="form-group">
                <label for="exampleFormControlInput1">Adres Email</label>
                <input  class="form-control" id="email" name="email" placeholder="name@gmail.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Imię</label>
                <input class="form-control" id="imie" name="imie" placeholder="np. Jan">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Twój wpis</label>
                <textarea class="form-control" id="text" name="text" rows="3"></textarea>
            </div>
            <input type="submit" id="idwyslij" name="idwyslij" value="Zapisz" class="my-btn btn btn-success btn-lg btn-block " style="margin-bottom: 20px;">
        </form>
    </div>
        <?php
       require_once('../script/mysql_connect.php');
           $results=$db->prepare('SELECT * FROM ksiega_gosci WHERE AKCEPTACJA = TRUE ORDER BY ID_WPISU DESC');
           $results->execute();
           $ksiega_gosci=$results->fetchAll(PDO::FETCH_ASSOC);
           $results->closeCursor();

    if ($ksiega_gosci == true){?>
            <?php
        foreach($ksiega_gosci as $ksiega){
        $imie=$ksiega['IMIE'];
        $data=$ksiega['DATA_WPISU'];
        $text=$ksiega['WPIS'];
        ?>
                <div class="card col-md-6 offset-md-3 ">
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
    </div>
    <?php }
     } ?>
<?php } ?>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../script/script.js"></script>
<script>
    $(document).ready(function(){
    $(document).on('click','.btn_usun',function(){
        var id=$(this).data("id2");
        $.ajax({
            url:"../script/usun_wpis.php",
            method:"POST",
            data:{id:id},
            dataType:"text",
            success:function(){
                $('.content2').load('../script/odswiez.php');
                swal("Wpis został usunięty");
            }
        });
    });
     $(document).on('click','.btn_akceptuj',function(){
        var id=$(this).data("id");
        $.ajax({
            url:"../script/akceptuj_wpis.php",
            method:"POST",
            data:{id:id},
            dataType:"text",
            success:function(){
                $('.content2').load('../script/odswiez.php');
                swal("Wpis został zaakceptowany");
            }
        });
    });
    });

</script>
