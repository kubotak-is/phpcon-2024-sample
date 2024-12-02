FROM php:8.4.1-apache-bullseye

# Apache のモジュールを有効化
RUN a2enmod deflate expires rewrite

RUN apt-get update -y && \
   apt-get upgrade -y && \
   apt-get install -y \
   vim \
   zip \
   unzip \
   g++ \
   git \
   zlib1g-dev \
   libpng-dev \
   libjpeg-dev \
   libmemcached-dev

# Install Composer
COPY --from=composer:2.8.2 /usr/bin/composer /usr/bin/composer
