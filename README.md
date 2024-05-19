# フィボナッチ数REST API

このプロジェクトは、Laravelで構成されたREST APIです。指定したn番目のフィボナッチ数を返すエンドポイントを提供します。

## フィボナッチ数について
ここでは説明を省きます。<br>
フィボナッチ数を知らない方向けに[ここ](https://ja.wikipedia.org/wiki/%E3%83%95%E3%82%A3%E3%83%9C%E3%83%8A%E3%83%83%E3%83%81%E6%95%B0)からウィキペディアに飛べるようにしておきます。

## プロジェクト情報
- PHP: 8.3
- Laravel: 10.x
- CI/CD: GitHub Actions
- デプロイ環境: Heroku
- デプロイ先URL: https://infinite-retreat-29466-b58771f08bbf.herokuapp.com

## ディレクトリ構成

```
.
├── app
│   ├── Http
│   │   └── Controllers
│   │       └── Api
│   │           └── FibonacciController.php
│   ├── Requests
│   │   └── FibonacciRequest.php
│   │ 
│   └── ...
├── routes
│   ├── api.php
│   │       
│   └── ...
├── tests
│   ├── Unit
│   │   └── FibonacciTest.php
│   └── ...
├── ...
├── .env
├── .env.example
├── .gitignore
├── Procfile
├── composer.json
├── package.json
└── README.md
```

- `app/Http/Controllers/Api/FibonacciController.php`: フィボナッチ数の計算ロジック
- `app/Requests/FibonacciRequest.php`: フィボナッチ数の要求の検証ロジック
- `routes/api.php`: API エンドポイントのルートの定義ファイル
- `tests/Unit/FibonacciTest.php`: フィボナッチAPIのユニットテスト
- `Procfile`: Herokuでアプリケーションのプロセスの実行方法を指定するためのファイル
  
- その他の Laravel 標準ディレクトリとファイルもプロジェクトに含まれています。
  

## APIエンドポイント

```
GET /api/fib/?n={n}
```

n番目のフィボナッチ数を返します。
詳細なAPIの仕様については[API仕様書](./openapi.yaml)を見てください。<br>


## 使い方

n番目のフィボナッチ数を取得するには、以下のGETリクエストを送信してください。
```
https://infinite-retreat-29466-b58771f08bbf.herokuapp.com/api/fib/?n={n}
```
`{n}`を取得したいフィボナッチ数のインデックスに置き換えてください。
# 環境構築と実行方法

## 手順
### リポジトリをクローン
```
git clone https://github.com/f-yusei/fib_api.git
cd fib_api
```

### 依存関係をインストール

```
composer install
```

### 環境ファイルを設定

```
cp .env.example .env
```

### アプリケーションキーを生成

```
php artisan key:generate
```

### ローカルサーバーを起動
```
php artisan serve
```
curlコマンドでサーバーが起動していることを確認できたら環境構築成功です
```
curl -X GET -H "Content-Type: application/json" "http://127.0.0.1:8000/api/fib?n=8"
```

## テストの実行方法
#### PHPUnitを使用したユニットテスト
### テストを実行
```
php artisan test
```

# コミットルール
### コミットメッセージの基本形
```
[Prefix] コミット内容
```
### コミットメッセージの例
```
feat 〇〇なため、△△を追加
```

## Prefixの種類
```
feat: 新しい機能
fix: バグの修正
docs: ドキュメントのみの変更
style: 空白、フォーマット、セミコロン追加など
refactor: 仕様に影響がないコード改善(リファクタ)
perf: パフォーマンス向上関連
test: テスト関連
chore: ビルド、補助ツール、ライブラリ関連
```
