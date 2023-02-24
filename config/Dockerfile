FROM php:8.2.2-apache-bullseye
RUN a2enmod rewrite && docker-php-ext-install mysqli pdo pdo_mysql
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer
