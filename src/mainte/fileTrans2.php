<?php

$contactFile = '.contact.dat';
$contents = fopen($contactFile, 'a+');

$addText = '1行追記' . "\n";
fwrite($contents, $addText);

fclose($contents);
?>
<!-- http://localhost:8888/2021_PHP-Laravel-HTTP-PDO-composer-/src/mainte/fileTrans2.php -->