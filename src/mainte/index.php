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

// Transaction まとまって処理 beginTransaction, commit, rollback
// ex)銀行 残高を確認->Aさんから引き落とし->Bさんに振込
$pdo->beginTransaction();
try {
  // sql処理
  $stmt = $pdo->prepare($sql); // prepared statememt
  $stmt->bindValue('id', $selectId, PDO::PARAM_INT); // 紐付け
  $stmt->execute(); //実行

  $pdo->commit();
} catch (PDOException $e) {
  $pdo->rollback(); // 更新のキャンセル
}
?>
<!-- http://localhost:8888/2021_PHP-Laravel-HTTP-PDO-composer-/src/mainte/index.php -->
