<?php

declare(strict_types=1); // 強い型指定
ini_set('dispaly_errors', 1);
error_reporting(E_ALL);

echo 'タイプヒナティングテスト' . '<br>';
/**
 * @param $string
 */
function noTypeHint($string)
{
  var_dump($string);
}
noTypeHint(['テスト']); // 引き数string予定に　配列->エラーは出ない
echo '<br>';

// タイプヒンティング(引き数に型を指定、型が違うとエラー)
function typeTest(string $string)
{
  // 引き数stringの他にarray, callbackなど色々設定できる
  var_dump($string);
}
typeTest(['配列文字']); // 引数にstringと指定しているのに配列 -> エラー
echo '<br>';
?>
<!-- http://localhost:8888/2021_PHP-Laravel-HTTP-PDO-composer-/src/function/type_hinting.php -->
