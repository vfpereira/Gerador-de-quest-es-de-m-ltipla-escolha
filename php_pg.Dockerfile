FROM php:7.2.2-apache

RUN apt-get update -y && apt-get install libpq-dev -y && docker-php-ext-install pdo pgsql pdo_pgsql 
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT=/var/www/html/
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN chmod -R o+rw /var/www/html




