#FROM php:8.0.2-fpm
#
#ENV PATH="/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/mnt/c/Program Files/nodejs"
#
#RUN apt-get update && apt-get install -y \
#      apt-utils \
#      libpq-dev \
#      libpng-dev \
#      libzip-dev \
#      zip unzip \
#      git && \
#      docker-php-ext-install pdo_mysql && \
#      docker-php-ext-install bcmath && \
#      docker-php-ext-install gd && \
#      docker-php-ext-install zip && \
#      apt-get clean && \
#      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
#
#COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini
#
#
## Install composer
#ENV COMPOSER_ALLOW_SUPERUSER=1
#RUN curl -sS https://getcomposer.org/installer | php -- \
#    --filename=composer \
#    --install-dir=/usr/local/bin
#
#WORKDIR /var/www
#
## Install Postgre PDO
#RUN apt-get install -y libpq-dev \
#    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
#    && docker-php-ext-install pdo pdo_pgsql pgsql
#
#RUN curl -fsSL https://deb.nodesource.com/setup_14.x | bash -
#RUN apt-get update && apt-get install -y nodejs
#
#RUN apt-get install -f
#RUN npm install -g npm@latest
#RUN docker-php-ext-install sockets



FROM php:8.0.2-fpm

ENV PATH="/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/mnt/c/Program Files/nodejs"

RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      git && \
      docker-php-ext-install pdo_mysql && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip && \
      apt-get clean && \
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# Install composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

WORKDIR /var/www

# Install Postgre PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

RUN apt-get install -f
RUN npm install -g npm@latest
RUN docker-php-ext-install sockets
