FROM php:8.2.1-fpm

WORKDIR /var/www

ARG user
ARG uid

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash -

RUN apt-get update && apt-get install --no-install-recommends -y \
    libpq-dev libzip-dev libpng-dev libxml2-dev libonig-dev \
    wget curl nano cron nodejs unzip \
    && rm -rf /var/lib/apt/lists/*

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p  /home/$user/.composer && chown -R $user:$user /home/$user

RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_pgsql pgsql bcmath zip gd mbstring pcntl exif

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

USER $user
