FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
libpq-dev \
zip \
unzip \
git \
curl \
nginx

RUN docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8080

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080

CMD php artisan config:clear && php artisan cache:clear && php artisan view:clear && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080

# Copy dependency files first
COPY composer.json composer.lock /var/www/html/

# Then copy the rest of your app code
COPY . /var/www/html/