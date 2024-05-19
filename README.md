# フィボナッチ数REST API

このプロジェクトは、Laravelで構成されたREST APIです。指定したn番目のフィボナッチ数を返すエンドポイントを提供します。

## プロジェクト情報
- PHP: 8.3
- Laravel: 10.x
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

n番目のフィボナッチ数を返します

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

