FROM php:8.0-apache

# Use the default development php.ini configuration
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN pecl install xdebug-3.0.0 \
    && apt-get update \
    && apt-get install -y libzip-dev zip \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer