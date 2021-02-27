<a id="contents"></a>

# Contents

- [Section01](#Section01)
- [Section02](#Section02)
- [Section03](#Section03)
- [Section04](#Section04)

<a id="Section01"></a>

# Section01

## PHP や Laravel でできること

- HP にプラス α の機能を追加できる

  - ブログ
  - お問い合わせフォーム
  - 天気の情報表示

- フロントエンドとバックエンド
  - クライアントサイド
    - HTML
    - JS
    - CSS
  - サーバーサイド
    - PHP
    - MySQL
    - Laravel

## フレームワークのメリット

- 頻度高く使う機能があらかじめ用意されている
  - メリット：
    - 車輪の再発明を防止
    - 開発スピードアップ
    - セキュリティにも配慮されている
  - 機能例
    - ログイン機能
    - データベースとのやりとり
    - 日付計算
    - 二段階認証
    - API 認証

## フレームワークのトレンド

- Laravel
- CakePHP
- Codelgniter
- FuelPHP

## 開発環境を作る(PHP)

- XAMPP(win) / MAMP(mac)
  - Apache
  - MySQL(MariaDB)
  - PHP(over 7.2)
- Google Chrome(ブラウザ)
- VScode(エディタ)

## 開発環境を作る(Laravel)

- XAMPP(win) / MAMP(mac)
  - Apache
  - MySQL(MariaDB)
  - PHP(over 7.2)
- Composer(PHP パッケージ管理ツール)
- Node.js(JS ミドルウェア)

## run and check

- http://localhost:8888/path
- http://127.0.0.1:8888/path

## 配列と連想配列(辞書)

- 配列
  - 数字(順番固定)と値がセット
  - $array[1]
- 連想配列
  - キーと値がセット
    - キー(key) -> 値(value)
  - $array["key"]

## for and while

- for:
  - 繰り返す数が決まっていたら
- while:
  - 繰り返す数が決まっていなかったら

## switch

- 注意点
  - "=="で判定される
    - case 部分で"==="により対応可能、一方コード量が増加する
  - break が必要、見辛い
- if 文を使うことが推奨される

## 文字列操作

- strlen($text)
  - 文字の長さを取得
  - 日本語の場合、UTF-8 は 3~6 バイトのため、大きく出る
- mb_strlen($text)
  - UTF-8 であっても純粋に文字数のみを取得可能
- str_replace("置換対象文字列", "ちかん後文字列", $text)
  - text 内の対象文字列を置換する
- explore("区切り文字", "text");
  - 区切り文字を境に文字列を分割する
  - 返り値は配列型
- preg_match("判定文字列", $text)
  - 正規表現
  - 判定したい文字列が幾つ存在するか数える
  - 返り値は Int

## Rules

- 文字の先頭は英文字かアンダーバー
- 動的型付
- 一致：
  - ==: 値が一致
  - ===:型まで一致
- add
  - . -> 文字を横に合わせる
  - - -> 数字を足す
- <"pre"></"pre">
  - 縦に並んで見やすくなる

### [Return to Contents](#contents)

<a id="Section02"></a>

# Section02

## web 通信

- http and https
  - http
    - Hyper Text Transfer Protocol(ルール)
  - https
    - SSL(Secure Socket Layer)
    - 暗号化
    - ドメイン毎に認証
- request and response
  - request
    - http リクエスト行(method)
      - get
        - URL に表示される
          - 検索条件など
        - クエリーリクエスト
      - post
        - 見られてはいけない NG なデータなど
    - http header
    - データ本体
  - response
    - レスポンス状態行(状態コード)
    - http header
    - データ本体

## error detection

- check here and fix display_errors off -> on
  - /Applications/MAMP/bin/php/php7.4.12/conf/php.ini

## スパーグローバル変数

- 連想配列
- PHP では 9 種類存在する

## 代表的な攻撃と対策

- 攻撃
  - XSS(Cross Site Scripting)
    - 例）
      """
      <script>alert("attention, you are being attacked now!");</script>
      """
  - クリックジャッキング
    - 悪意のあるボタンが出現
  - CSRF(Cross Site Request Forgeries)
  - SQL インジェクション -> DB 時
  - etc...
- 対策
  - サニタイジング(消毒)
    - 例)(XSS 対策)
      """
      function h($str)
      {
        return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
      }
      """
    - 例)(クリックジャッキング)
      - 重ねた表示を禁止にする
        """
        header("X-FRAME-OPTIONS:DENY");
        """
  - バリデーション(検証)
  - その他
    - 例)(CSRF)
      - GET/POST: 一回きり
      - SESSION: トークンを残す

## Bootstrap

- CSS フレームワーク
  - レイアウト、デザインがセットになっている
  - CSS + jQuery(JS)
- グリッドシステムが特徴
  - 画面を 12 分割で考え、画面幅によって表示を変える
- [Started Template](https://getbootstrap.com/docs/5.0/getting-started/introduction/#starter-template)

## 認証・・フレームワーク推奨

- 種類
  - Basic 認証 SSL/TSL 推奨
    - htaccess ファイルで指定
      - サーバー(Apache)の設定ファイル
    - ディレクトリごとに動作を制御できる
      - リダイレクト
      - アクセス切り替え(PC 版とスマホ版など)
      - 特定 IP アドレス・プロバイダからアクセス制御
      - Basic 認証 etc...
  - ダイジェスト認証
  - セッション認証
  - データベースを使った認証
  - JWT(Json Web Token)認証
  - OAuth2.0 認証(SNS 認証)
  - 2 段階認証(多要素認証)

## ファイル操作

- データを保存する方法
  - ファイル(テキストファイル)
    - 手軽・データのやり取り
  - データベース(MySQL, MariaDB)
    - 大量のデータを保管
- ファイル操作の方法
  - ファイル名型(ファイル丸ごと)
    - file_get_contents, file_put_contents
  - ストリーム型(1 行ごと)
    - fopen, fclose, fgets, fwrite
    - 手順
      - fopen: 開く
      - flock: 排他ロック
      - fgets/fwrite: 読み込み/書き込み/追記
      - fclose: 閉じる/ロック解除
  - オブジェクト型(オブジェクトとして)
    - SplFileObject

### [Return to Contents](#contents)

<a id="Section03"></a>

# Section03

## データベースとの接続

- PDO(PHP Data Object)
- ORM, OR/マッパー
  - SQL をラップ(SQL を PHP で書ける)

## DB 操作の基本 CRUD

- CRUD
  - Create
    - 新規作成
    - insert
  - Read
    - 表示
    - select
  - Update
    - 更新
    - update(上書き)
      - 履歴を残すか、完全に上書きするか
  - Delete
    - 削除
    - delete
      - 完全に消すか、非表示にするか
- データ量が膨大になる場合
  - パーティション(分割)
  - インデックス(索引)
  - レプリケーション(ミラーリング) etc...

## クラス

- クラスの考え方(ひとまとめ)
  - class
    - prop
      - 変数
      - 定数
    - method
      - 関数
- クラスの使い方(instance(実体化)の差)
  - new(動的&アロー演算子)
    - $pdo = new class
    - $pdo -> prop
    - $pdo -> method
  - static(静的&スコープ演算子)
    - PDO::ATTR_ERRMODE
    - PDO::ERRMODE_EXCEPTION

### [Return to Contents](#contents)

<a id="Section04"></a>

# Section04

## クッキーとセッション

- $\_COOKIE
  - パスワード保存は NG
  - 近年 GDPR(ヨーロッパ)などで利用が制限されつつある
- $\_SESSION
  - セッション認証

## 関数あれこれ

- 引数にデフォルト値（初期値）を設定可能
- タイプヒンティング（型を明示できる）
- 可変引数（ドット３つ）
- 無名関数、クロージャ、コールバック関数
- 引数にインスタンス（メソッドチェーン）

### [Return to Contents](#contents)
