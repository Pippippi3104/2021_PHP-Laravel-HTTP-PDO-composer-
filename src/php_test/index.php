<!DOCTYPE html>

<head></head>
<body>

This is HTML.

<?php
/* test */
echo("<br>");
echo("This is PHP.");

/* var(動的型付) */
echo("<br>");
$test = 123;
echo $test;

/* 型の判定 */
echo("<br>");
var_dump($test);

/* add */
echo("<br>");
$test_1 = 123;
$test_2 = 456;
$test_3 = $test_1 + $test_2;
echo $test_3;

/* php's infometion */
phpinfo();
?>

</body>
</html>

<!-- http://localhost:8888/2021_PHP-Laravel-HTTP-PDO-composer-/src/php_test/index.php -->
<!-- http://127.0.0.1:8888/2021_PHP-Laravel-HTTP-PDO-composer-/src/php_test/index.php -->