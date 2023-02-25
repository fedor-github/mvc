FROM php:8.2.2-apache-bullseye
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer
RUN a2enmod rewrite && docker-php-ext-install mysqli pdo pdo_mysql
RUN yes | pecl install xdebug-3.2.0 \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.log_level=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
