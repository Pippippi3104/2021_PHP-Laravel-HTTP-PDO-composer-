<?php

/* CSRF対策 */
session_start();

/* validation (入力エラーなど) */
require 'validation.php';

/* サニタイジング(クリックジャッキング) */
header('X-FRAME-OPTIONS:DENY');

/* super global variable */
if (!empty($_SESSION)) {
  echo '<pre>';
  var_dump($_SESSION);
  var_dump($_POST);
  echo '</pre>';
}

/* サニタイジング(XSS) */
function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/* 入力、確認、完了：input.php, confirm.php, thanks.php */
/* 今回は "input.php" のみで表現する */
$pageFlag = 0;
$errors = validation($_POST);
if (!empty($_POST['btn_confirm']) && empty($errors)) {
  $pageFlag = 1;
}
if (!empty($_POST['btn_submit'])) {
  $pageFlag = 2;
}
?>


<!-- Bootstrap -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
<body>


<!-- 確認画面 -->
<?php if ($pageFlag === 1): ?>
<!-- csrf対策 -->
 <?php if ($_POST['csrf'] === $_SESSION['csrfToken']): ?>
<form method="POST" action="input.php">
氏名
<?php echo h($_POST['your_name']); ?>
<br>
メールアドレス
<?php echo h($_POST['email']); ?>
<br>
ホームページ
<?php echo h($_POST['url']); ?>
<br>
性別
<?php
if ($_POST['gender'] === '0') {
  echo '男性';
}
if ($_POST['gender'] === '1') {
  echo '女性';
}
?>
<br>
年齢
<?php
if ($_POST['age'] === '1') {
  echo '〜19歳';
}
if ($_POST['age'] === '2') {
  echo '20歳〜29歳';
}
if ($_POST['age'] === '3') {
  echo '30歳〜39歳';
}
if ($_POST['age'] === '4') {
  echo '40歳〜49歳';
}
if ($_POST['age'] === '5') {
  echo '50歳〜59歳';
}
if ($_POST['age'] === '6') {
  echo '60歳〜';
}
?>
<br>
お問い合わせ内容
<?php echo h($_POST['contact']); ?>
<br>

<input type="submit" name="back" value="戻る">
<input type="submit" name="btn_submit" value="送信する">
<input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
<input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
<input type="hidden" name="url" value="<?php echo h($_POST['url']); ?>">
<input type="hidden" name="gender" value="<?php echo h($_POST['gender']); ?>">
<input type="hidden" name="age" value="<?php echo h($_POST['age']); ?>">
<input type="hidden" name="contact" value="<?php echo h($_POST['contact']); ?>">
<input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']); ?>">
<?php endif; ?>
<?php endif; ?>


<!-- 完了画面 -->
<?php if ($pageFlag === 2): ?>
<!-- csrf対策 -->
<?php if ($_POST['csrf'] === $_SESSION['csrfToken']): ?>

<!-- DB接続 -->
<?php
require '../mainte/insert.php';
insertContact($_POST);
?>

送信が完了しました
<?php unset($_SESSION['csrfToken']); ?>
<?php endif; ?>
<?php endif; ?>


<!-- 入力画面 -->
 <?php
 if (!isset($_SESSION['csrfToken'])) {
   // CSRF対策用合言葉
   $_csrfToken = bin2hex(random_bytes(32));
   $_SESSION['csrfToken'] = $_csrfToken;
 }
 $token = $_SESSION['csrfToken'];
 ?>
<?php if ($pageFlag === 0): ?>

<!-- validation error -->
<?php if (!empty($errors) && !empty($_POST['btn_confirm'])): ?>
<?php echo '<ul>'; ?>
<?php foreach ($errors as $error) {
  echo '<li>' . $error . '</li>';
} ?>
<?php echo '</ul>'; ?>
<?php endif; ?>

<div class ="container">
  <div class="row">
    <div class="col-md-6">
      <form method="POST" action="input.php">
      <div class="form-group">
        <label for="your_name">氏名</label>
        <input type="text" class="form-control" id="your_name" name="your_name" value="<?php if (
          !empty($_POST['your_name'])
        ) {
          echo h($_POST['your_name']);
        } ?>" required>
      </div>
      <div>
        <label for="email">メールアドレス</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php if (
          !empty($_POST['email'])
        ) {
          echo h($_POST['email']);
        } ?>" required>
      </div>
      <div>
        <label for="email">ホームページ</label>
        <input type="url" class="form-control" id="url" name="url" value="<?php if (
          !empty($_POST['url'])
        ) {
          echo h($_POST['url']);
        } ?>">
      </div>
      性別：
      <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" id="gender1" name="gender" value="0"
        <?php if (!empty($_POST['gender']) && $_POST['geder'] === '0') {
          echo 'checked';
        } ?>>
          <label class="form-check-label" for="gender1">男性</label>
        </div>
        <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" id="gender2" name="gender" value="1"
        <?php if (!empty($_POST['gender']) && $_POST['geder'] === '1') {
          echo 'checked';
        } ?>>
          <label class="form-check-label" for="gender2">女性</label>
      </div>
      <div class="form-group">
        <label for="age">年齢</label>
        <select class="form-control" id="age" name="age">
          <option value="">選択してください</optiuon>
          <option value="1" selected>〜19歳</optiuon>
          <option value="2">20歳〜29歳</optiuon>
          <option value="3">30歳〜39歳</optiuon>
          <option value="4">40歳〜49歳</optiuon>
          <option value="5">50歳〜59歳</optiuon>
          <option value="6">60歳〜</optiuon>
        </select>
      </div>
      <div class="form-group">
        <label for="contact">お問い合わせ内容</label>
        <textarea class="form-control" id="contact" row="3" name="contact">
        <?php if (!empty($_POST['contact'])) {
          echo h($_POST['contact']);
        } ?>
        </textarea>
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="caution" name="caution" value="1">
        <label class="form-check-label" for="caution">注意事項にチェックする</label>
      </div>

      <input type="submit" class="btn btn-info" name="btn_confirm" value="確認する">
      <input type="hidden" name="csrf" value="<?php echo $token; ?>">
      </form>
    </div><!-- .col-md-6 -->
  </div>
</div>

<?php endif; ?>

<!-- Bootstrap -->
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<!-- http://localhost:8888/2021_PHP-Laravel-HTTP-PDO-composer-/src/form/input.php -->