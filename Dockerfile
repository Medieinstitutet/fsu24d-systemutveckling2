FROM php:8.2-apache
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql
RUN a2enmod rewrite
RUN apt-get -y update \
&& apt-get install -y libicu-dev \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl
EXPOSE 80