<?php

// 可変引数
function combine(string ...$name): string
{
  $combinedName = '';
  for ($i = 0; $i < count($name); $i++) {
    $combinedName .= $name[$i];
    if ($i != count($name) - 1) {
      $combinedName .= '.';
    }
  }
  return $combinedName;
}

$lName = '名前';
$fName = '苗字';
$name1 = combine($lName, $fName);

echo '結合結果:' . $name1;
echo '<br>';

$variableLength = combine('test1', 'test2', 'test3');
echo $variableLength;
?>
<!-- http://localhost:8888/2021_PHP-Laravel-HTTP-PDO-composer-/src/function/variableLengthArgs.php -->
