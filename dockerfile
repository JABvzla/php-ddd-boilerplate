FROM php:7.2-fpm

WORKDIR /usr/src/app

RUN apt-get update -y

RUN apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY app .

# Expose port
EXPOSE 80

CMD  php -S 0.0.0.0:80  -t public
