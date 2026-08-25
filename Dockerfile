FROM php:8.4-apache

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libsqlite3-dev \
    && docker-php-ext-install \
    pdo_sqlite \
    mbstring \
    zip \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache rewrite module
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy Laravel project
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set Laravel permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Configure Apache to serve Laravel's public directory
RUN sed -i 's#DocumentRoot /var/www/html#DocumentRoot /var/www/html/public#' \
    /etc/apache2/sites-available/000-default.conf

# Allow Laravel .htaccess overrides
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' \
    /etc/apache2/apache2.conf

# Configure Apache to listen on Render's port
RUN sed -i 's/Listen 80/Listen 10000/' /etc/apache2/ports.conf

RUN sed -i 's/:80>/:10000>/' \
    /etc/apache2/sites-available/000-default.conf

# Expose Render port
EXPOSE 10000

# Create SQLite database, run migrations, then start Apache
CMD ["sh", "-c", "touch database/database.sqlite && php artisan migrate --force && apache2-foreground"]