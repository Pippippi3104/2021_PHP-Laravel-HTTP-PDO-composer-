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

/* const */
echo("<br>");
const MAX = 10;
echo MAX;

/* array */
echo("<br>");
$array = [1, 2, 3];
echo $array[1];
echo "<pre>";
var_dump($array);
echo "</pre>";

$array_2 = [
    ["red", "blue", "yellow"],
    ["green", "purple", "black"]
];
echo "<pre>";
var_dump($array_2);
echo "</pre>";

/* 連想配列 */
echo("<br>");
$array_member = [
    "name" => "honda",
    "height" => 170,
    "hobby" => "soccer",
];
echo "<pre>";
var_dump($array_member);
echo "</pre>";
echo $array_member["hobby"];

$array_member_2 = [
    "honda" => [
        "height" => 170,
        "hobby" => "soccer",
    ],
    "kagawa" => [
        "height" => 165,
        "hobby" => "soccer",
    ],
];
echo "<pre>";
var_dump($array_member_2);
echo "</pre>";

/* if */
echo("<br>");
$height_2 = 90;
if ($height_2 == 90) {
    echo "Height is " . $height_2 . "cm.";
}

/* forEach */
echo ("<br>");
$member = [
    "name" => "honda",
    "height" => 170,
    "hobby" => "soccer",
];
foreach($member as $i) {
    /* value only */
    echo($i);
};
foreach($member as $key => $value) {
    echo("<br>");
    echo("key" . $key . "is" . $value . ".");
};

/* for */
echo ("<br>");
for ($i = 0; $i < 10; $i++) {
    if($i === 5){
        break;
        // continue
    }

    echo ("<br>");
    echo($i);
};

/* while */
echo ("<br>");
$i = 0;
while($i < 5){
    echo ("<br>");
    echo($i);
    $i++;
};

/* switch */
echo ("<br>");
$data = 1;
switch($data){
    case 1:
        echo($data);
    break;
    case 2:
        echo($data);
    break;
    case 3:
        echo($data);
    break;
    default:
        echo("default");
}

/* functions */
echo ("<br>");
function test() {
    echo("this is test.");
};
test();

echo ("<br>");
function getComment($string) {
    echo($string);
};
getComment("this is test.");

/* php's infometion */
phpinfo();
?>

</body>
</html>

<!-- http://localhost:8888/2021_PHP-Laravel-HTTP-PDO-composer-/src/php_test/index.php -->
<!-- http://127.0.0.1:8888/2021_PHP-Laravel-HTTP-PDO-composer-/src/php_test/index.php -->