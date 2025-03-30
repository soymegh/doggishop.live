FROM php:8.2-fpm

# Instalar dependencias y extensiones
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Copiar certificado SSL de Azure MySQL
COPY docker/ssl/BaltimoreCyberTrustRoot.crt.pem /etc/ssl/certs/
RUN update-ca-certificates

# Configurar Composer y usuario no-root
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN useradd -G www-data -u 1000 doggiuser && mkdir -p /home/doggiuser/.composer
RUN chown -R doggiuser:doggiuser /home/doggiuser

WORKDIR /var/www/html
COPY --chown=doggiuser:doggiuser . .

USER doggiuser
RUN composer install --no-dev --optimize-autoloader \
    && php artisan config:cache \
    && php artisan view:cache