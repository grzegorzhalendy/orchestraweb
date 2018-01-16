
<?php
function open_txt_file($src){
    function utf8_fopen_read($fileName) {
        $fc = iconv('windows-1250', 'utf-8', file_get_contents($fileName));
        $handle=fopen("php://memory", "rw");
        fwrite($handle, $fc);
        fseek($handle, 0);
        return $handle;
    }
    $d = utf8_fopen_read($src, "r");
    $content=fread($d,filesize($src));
    $bn=explode('||',$content);
    foreach($bn as $bn)
        return $bn.'<br>';
}
?>
