<a id="contents"></a>

# Contents

- [Section01](#Section01)
- [Section02](#Section02)

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

### [Return to Contents](#contents)
