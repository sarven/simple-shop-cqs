FROM php:7.1-fpm

RUN apt-get update && buildDeps="libpq-dev libzip-dev libjpeg62-turbo libjpeg-dev libpng12-dev" \
    && apt-get install -y $buildDeps git nano wget cron libxrender1 libfontconfig1 libxext6 libicu-dev --no-install-recommends \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*z
RUN docker-php-ext-configure gd --with-jpeg-dir=/usr/lib/x86_64-linux-gnu --with-png-dir=/usr/lib/x86_64-linux-gnu
RUN docker-php-ext-install pdo mysqli pdo pdo_mysql zip gd intl
RUN pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini
RUN wget https://getcomposer.org/composer.phar && mv composer.phar /usr/bin/composer && chmod +x /usr/bin/composer