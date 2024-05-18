# フィボナッチ数REST API

このプロジェクトは、LaravelフレームワークでビルドされたシンプルなREST APIです。指定したインデックスのフィボナッチ数を返す1つのエンドポイントを提供します。

## プロジェクト情報
- PHP バージョン: 8.3.7
- Laravel バージョン: 10.48.10
- デプロイ環境: Heroku
- デプロイ先URL: https://infinite-retreat-29466-b58771f08bbf.herokuapp.com

## ディレクトリ構造

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

- `app/Http/Controllers/Api/FibonacciController.php`: フィボナッチ数の計算ロジックが含まれます。
- `app/Requests/FibonacciRequest.php`: フィボナッチ数の要求の検証ロジックが含まれます。
- `routes/api.php`: API エンドポイントのルートが定義されています。
- `tests/Unit/FibonacciTest.php`: フィボナッチ機能のユニットテストが含まれます。
- `Procfile`: Herokuでアプリケーションのプロセスの実行方法を指定するためのファイルです。
- その他の Laravel 標準ディレクトリとファイルもプロジェクトに含まれています。
  

## APIエンドポイント

```
GET /api/fib/?n={n}
```

n番目のフィボナッチ数を返します。

## 使い方

n番目のフィボナッチ数を取得するには、以下のGETリクエストを送信してください。

```
https://infinite-retreat-29466-b58771f08bbf.herokuapp.com/api/fib/?n={n}
```

`{n}`を取得したいフィボナッチ数のインデックスに置き換えてください。

## 実装

フィボナッチ数列は簡単な再帰関数で実装されています。ベースケースは`n`が0または1の場合で、その時はただちに`n`を返します。それ以外の`n`の場合は、関数を2回呼び出します。1回目は`n-1`で、2回目は`n-2`で、その2つの結果を足して返します。

## セキュリティに関する考慮事項

このフィボナッチ数生成APIはシンプルですが、Laravelは `/api/fib/?n={n}` エンドポイントへの入力が非負の整数であることを自動的に検証し、不正な入力に対しては適切なエラーレスポンスを返します。これにより、入力検証に関する潜在的な問題を防ぐことができます。
