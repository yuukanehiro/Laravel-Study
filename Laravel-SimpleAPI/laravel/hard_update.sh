#!/bin/bash
set -e

# スクリプトディレクトリの取得
SCRIPT_DIR=`dirname $0`
cd $SCRIPT_DIR


# .envをローカル開発用に更新
rm -f ./.env &&
cp ../env/.env.local ./.env &&

# Schemaspy Clean
rm -rf ./schemaspy &&

# dockerの既存イメージ, コンテナの削除
#docker stop $(docker ps -q) &&
#docker rm $(docker ps -q -a) &&
#docker rmi $(docker images -q) &&

# docker-composeによるDockerコンテナの更新
docker-compose build --no-cache &&
docker-compose up -d &&

# composer installによるライブラリの追加
docker-compose exec php-fpm php artisan key:generate &&
docker-compose exec php-fpm composer install &&
docker-compose exec php-fpm composer dump-autoload &&

# DBマイグレーション, シーディング
docker-compose exec php-fpm php artisan migrate:refresh --seed

# キャッシュの削除
docker-compose exec php-fpm php artisan cache:clear &&
docker-compose exec php-fpm php artisan config:clear &&
docker-compose exec php-fpm php artisan route:clear &&
docker-compose exec php-fpm php artisan view:clear &&

# キーの作成
docker-compose exec php-fpm php artisan key:generate
