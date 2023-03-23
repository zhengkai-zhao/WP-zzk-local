FROM php:7.4-apache
RUN brew update && \
    brew install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libzip-dev \
        zip \
        unzip \
        curl && \
    docker-php-ext-install -j$(nproc) iconv mysqli pdo_mysql zip && \
    docker-php-ext-configure gd --with-freetype --with