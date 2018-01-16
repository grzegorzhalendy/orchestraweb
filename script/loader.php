<?php

$CONTENT = $_POST['Content'];
if($CONTENT == "glowna"){
    require_once('../views/'.$CONTENT.'.php');
} else if($CONTENT == "galeria"){
    require_once('../views/'.$CONTENT.'.php');
} else if($CONTENT == "repertuar"){
    require_once('../views/'.$CONTENT.'.php');
} else if($CONTENT == "sklad"){
    require_once('../views/'.$CONTENT.'.php');
} else if($CONTENT == "ksiega-gosci"){
    require_once('../views/'.$CONTENT.'.php');
} else if($CONTENT == "kontakt"){
    require_once('../views/'.$CONTENT.'.php');
} else
    ?>
