FROM php:8.2-fpm

# 必要なパッケージをインストール
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev gnupg \
    && docker-php-ext-install pdo_mysql zip mbstring exif pcntl

# Node.js（v18系）をインストール
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Composer インストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 作業ディレクトリ
WORKDIR /var/www/html

# Laravelサーバーを起動
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]