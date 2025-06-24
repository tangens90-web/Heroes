#!/bin/bash



set -e


git pull origin main

php8.1 composer.phar install --no-dev --optimize-autoloader

php8.1 artisan migrate --force

php8.1 artisan event:cache

php8.1 artisan view:cache
php8.1 artisan route:cache