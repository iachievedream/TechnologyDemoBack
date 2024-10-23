FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    && docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY . .

# RUN composer install

EXPOSE 9000

CMD ["php-fpm"]

