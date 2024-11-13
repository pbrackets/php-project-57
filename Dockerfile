FROM richarvey/nginx-php-fpm:3.1.6

#RUN apt-get update && apt-get install -y \
#    libpq-dev \
#    libzip-dev
#RUN docker-php-ext-install pdo pdo_pgsql zip


#RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
#    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
#    && php -r "unlink('composer-setup.php');"

RUN apk add --update nodejs npm

WORKDIR /app

COPY . .
RUN composer install
RUN npm ci
RUN npm run build


# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]
