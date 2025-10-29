#!/bin/sh

echo " Aguardando MySQL..."
until nc -z mysql 3306; do
  sleep 2
done

echo " MySQL disponível, executando migrations..."
php artisan migrate --force

php-fpm
