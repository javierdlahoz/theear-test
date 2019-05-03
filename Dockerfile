FROM 1and1internet/ubuntu-16-apache-php-7.2

WORKDIR /var/www/html

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update -y && apt-get install php7.2-curl -y
RUN a2enmod headers && a2enmod rewrite
RUN composer global require "laravel/lumen-installer"