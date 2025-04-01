FROM php:8.2-fpm

RUN apt update && apt install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev
RUN apt clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN useradd -G www-data -u 1000 doggiuser && mkdir -p /home/doggiuser/.composer
RUN chown -R doggiuser:doggiuser /home/doggiuser

WORKDIR /var/www
COPY --chown=doggiuser:doggiuser . .

USER doggiuser

RUN composer install --no-dev --optimize-autoloader \
    && php artisan config:cache \
    && php artisan view:cache