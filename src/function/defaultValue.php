<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// 関数作成
function defaultValue($string = '本田')
{
  echo $string . 'です';
}

// 引数なし
defaultValue();
echo '<br>';

// 引数あり
defaultValue('テスト');
?>
<!-- http://localhost:8888/2021_PHP-Laravel-HTTP-PDO-composer-/src/function/defaultValue.php -->
