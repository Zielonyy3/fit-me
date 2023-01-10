FROM devilbox/php-fpm-8.1:latest

RUN apt-get update && \
    apt-get install libonig-dev libzip-dev libxml2-dev libfreetype6-dev libjpeg62-turbo-dev libmcrypt-dev zip unzip vim libcurl4-openssl-dev pkg-config libssl-dev libmagickwand-dev --no-install-recommends libpng-dev -y
RUN docker-php-ext-install -j$(nproc) iconv soap mysqli mbstring
RUN docker-php-ext-install pdo_mysql xml
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl
RUN docker-php-ext-install exif
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install zip
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Install Postgre PDO
RUN apt-get install -y libpq-dev
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-install pgsql
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis
# composer
RUN curl --silent --show-error https://getcomposer.org/composer.phar > composer.phar \
    && mv composer.phar /usr/bin/composer
RUN chmod +x /usr/bin/composer
# phpunit
RUN composer global require "phpunit/phpunit"
ENV PATH /root/.composer/vendor/bin:$PATH
RUN ln -s /root/.composer/vendor/bin/phpunit /usr/bin/phpunit
# xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
COPY ./docker/xdebug.ini "${PHP_INI_DIR}/conf.d"
# cron
RUN apt-get install -y cron
# node
RUN apt-get install -y gnupg2
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs
RUN apt-get install -y git
#RUN apt-get install -y npm
# permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod 755 /var/www/html

EXPOSE 9000
CMD ["crond", "-l 2", "-f"]
CMD ["php-fpm", "-F"]
