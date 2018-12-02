FROM php:7.2.2-apache

RUN apt-get update -y && apt-get install libpq-dev -y && docker-php-ext-install pdo pgsql pdo_pgsql 

