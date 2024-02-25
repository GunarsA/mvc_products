FROM php:8.0-fpm
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY . /var/www/html
RUN composer update