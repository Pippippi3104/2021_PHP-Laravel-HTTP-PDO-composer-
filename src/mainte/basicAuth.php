<?php
// パスワードを記録したファイルの場所
echo __FILE__;
// パスワード(暗号化)
// /Applications/MAMP/htdocs/2021_PHP-Laravel-HTTP-PDO-composer-/src/mainte/basicAuth.php
echo '<br>';
echo password_hash('password123', PASSWORD_BCRYPT);
?>
<!-- http://localhost:8888/2021_PHP-Laravel-HTTP-PDO-composer-/src/mainte/basicAuth.php -->