FROM php:7.0.13-fpm-alpine

MAINTAINER BSCheshir <bscheshir.work@gmail.com>

# Environments
ENV TIMEZONE            Europe/Moscow

RUN  \
    echo '@testing http://nl.alpinelinux.org/alpine/edge/testing' >> /etc/apk/repositories && \
    echo '@community http://nl.alpinelinux.org/alpine/edge/community' >> /etc/apk/repositories && \

    # Install common packages
    apk add --update \
        git \
        grep \
        gzip \
        patch \
        patchutils \
        diffutils \
        && \

	apk add --update tzdata && \
	cp /usr/share/zoneinfo/${TIMEZONE} /etc/localtime && \
	echo "${TIMEZONE}" > /etc/timezone && \
	apk add --update \
        php7-memcached \
        php7-pdo_mysql \
        php7-pdo_pgsql \
        php7-intl \
        php7-gd \
        php7-xdebug \
        && \

    pecl install imagick && \
    docker-php-ext-enable imagick && \

    echo -e "expose_php = off\n\
cgi.fix_pathinfo = 0" >> /usr/local/etc/php/php.ini && \
    echo -e "xdebug.remote_port = 9001\n\
xdebug.idekey = \"PHPSTORM\"\n\
xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer global require "fxp/composer-asset-plugin:^1.2.0"

# memcached, pdo_mysql, pdo_pgsql, intl, gd, imagick