# Rese

飲食店予約アプリのバックエンドリポジトリです。  
Dockerを使用して構築した為、動作確認がしたい方はDockerをご使用ください。  
[フロントエンドリポジトリ](https://github.com/vamo-r/rese-nuxt)

## 構築環境
* Nginx:1.21-alpine
* PHP:8.0.5-fpm-alpine3.13
* Laravel:v8.6.9
* Postgres:13.5-alpine

## 機能一覧
* 新規登録
* ログイン
* ログアウト
* トークンリフレッシュ
* ユーザー情報取得
* 店舗一覧取得
* 店舗詳細取得
* お気に入り登録/削除
* 予約一覧取得
* 予約登録
* 予約削除

## 使い方

```bash
git clone https://github.com/vamo-r/rese-laravel.git
または
git clone git@github.com:vamo-r/rese-laravel.git
```
```bash
docker network create rese-docker
```
```bash
docker compose up --build
```
```bash
docker compose run --rm api php artisan migrate
```
```bash
docker compose run --rm api php artisan db:seed
```

## メモ

随時更新・修正していきます。

## 開発者 & ライセンス

* [vamo-r](https://twitter.com/vamo__r)