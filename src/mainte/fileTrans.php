<?php
$contactFile = '.contact.dat';

// ファイルまるごと
$fileContents = file_get_contents($contactFile);
echo $fileContents;

// ファイルを上書き
//file_put_contents($contactFile, 'テストです');

$addText = 'This is Test' . "\n";

// ファイルに追記
file_put_contents($contactFile, $addText, FILE_APPEND);

// 配列 file、区切る explode、 foreach
$allData = file($contactFile);
foreach ($allData as $lineData) {
  $lines = explode(',', $lineData);
  echo $lines[0] . '<br>';
  echo $lines[1] . '<br>';
  echo $lines[2] . '<br>';
}
?>
<!-- http://localhost:8888/2021_PHP-Laravel-HTTP-PDO-composer-/src/mainte/fileTrans.php -->