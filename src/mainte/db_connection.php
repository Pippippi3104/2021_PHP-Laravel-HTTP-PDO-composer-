<?php

// 接続に必要な情報
const DB_HOST = 'mysql:dbname=udemy_php;host127.0.0.1;charset=utf8';
const DB_USER = 'php_user';
const DB_PASSWORD = 'password123';

// 例外処理 Exception
try {
  $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //よく使うオプション(連想配列)
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //よく使うオプション(例外を表示)
    PDO::ATTR_EMULATE_PREPARES => false, //よく使うオプション(SQLインジェクション対策)
  ]);
  echo '接続成功';
} catch (PDOException $e) {
  echo '接続失敗' . $e->getMessage() . "\n";
  exit();
}
?>
<!-- http://localhost:8888/2021_PHP-Laravel-HTTP-PDO-composer-/src/mainte/db_connection.php -->