<?php


file_put_contents("latest.zip", file_get_contents('https://wordpress.org/latest.zip'));

$zip = new ZipArchive;
if ($zip->open('latest.zip') === TRUE) {
    $zip->extractTo('./');
    $zip->close();
    echo 'ok';
} else {
    echo 'failed';
}

unlink("latest.zip");

rename(__FILE__, __FILE__ . ".phps");
?>
