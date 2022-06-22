FROM php:8.0-apache
#FROM docker.io/library/php:8.0-apache

MAINTAINER Olha Kharabet

RUN apt-get update \
    && apt-get -y install vim nano wget git zip unzip default-mysql-client curl libpng-dev freetype* libjpeg62-turbo-dev libfreetype6-dev libwebp-dev libzip-dev libonig-dev libxml2-dev

#RUN apt-get update \
#    && apt-get install -y zlib1g-dev libcurl4-openssl-dev

RUN docker-php-ext-install pdo mysqli pdo_mysql zip soap bcmath opcache
#RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/ --with-webp-dir=/usr/include/
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp
RUN #docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-install gd
RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
RUN HASH=`curl -sS https://composer.github.io/installer.sig`
RUN echo $HASH
RUN php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer && composer -V

RUN pecl install xdebug-3.1.3 \
    && docker-php-ext-enable xdebug

#RUN chmod -R 777 /var/www/html/laravel9
# run once manually from docker-container
#RUN cd /var/www/html && find ./ -type d -exec chmod a+rwx {} \; && find ./ -type f -exec chmod a+rw {} \; && chown -R www-data:www-data ./

RUN a2enmod rewrite

COPY laravel9.conf /etc/apache2/sites-available/laravel9.conf
RUN a2ensite laravel9.conf

#RUN mkdir -m 0777 /var/www
#RUN ln -s /var/www /var/www/laravel9
RUN a2enmod headers
RUN a2enmod include

RUN apt-get install nodejs npm -y && apt-get install npm

#CMD "/bin/bash"

EXPOSE 80