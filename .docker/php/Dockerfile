FROM php:8.4.5-fpm

# Instalar dependências do sistema e extensões do PHP necessárias para Laravel
RUN apt-get update && apt-get install -y \
    zip unzip libzip-dev \
    libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip

# Instalar Composer (vindo da imagem oficial)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www