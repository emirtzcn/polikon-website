# Yerel geliştirme/test imajı (cPanel'e YÜKLENMEZ).
FROM php:8.2-apache

RUN docker-php-ext-install pdo_mysql mysqli \
    && a2enmod rewrite headers expires

# PHP upload limitleri (PDF/görsel için)
RUN { \
    echo 'upload_max_filesize=25M'; \
    echo 'post_max_size=30M'; \
    echo 'memory_limit=256M'; \
    } > /usr/local/etc/php/conf.d/uploads.ini

WORKDIR /var/www/html
