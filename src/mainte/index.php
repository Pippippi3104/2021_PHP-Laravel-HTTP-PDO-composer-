<?php

// DB接続
require 'db_connection.php';

// 対象選択
$selectId = 2;

// ユーザー入力なし query
$sql = 'select * from contacts where id = ' . $selectId;
$stmt = $pdo->query($sql);

$result = $stmt->fetchall();
echo '<pre>';
var_dump($result);
echo '</pre>';

// ユーザー入力あり prepare, bind, execute <- SQLインジェクション対策
$sql = 'select * from contacts where id = :id'; //名前付きプレースホルダー
$stmt = $pdo->prepare($sql); // prepared statememt
$stmt->bindValue('id', $selectId, PDO::PARAM_INT); // 紐付け
$stmt->execute(); //実行

$result = $stmt->fetchall();
echo '<pre>';
var_dump($result);
echo '</pre>';
?>
<!-- http://localhost:8888/2021_PHP-Laravel-HTTP-PDO-composer-/src/mainte/index.php -->
