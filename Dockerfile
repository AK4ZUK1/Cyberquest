FROM php:8.2-fpm

# Install system dependencies, Git, Curl, and Node.js (Node 20.x)
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip \
    unzip \
    git \
    curl \
    nginx \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy all project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies and build Vite assets (Fixes Vite manifest error)
RUN npm install && npm run build

# Set permissions for storage and bootstrap cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8080

# Run migrations and start the server
CMD php artisan config:clear && php artisan cache:clear && php artisan view:clear && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080