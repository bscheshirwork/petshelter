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

#ENV TERM=xterm
#
#RUN echo '@testing http://nl.alpinelinux.org/alpine/edge/testing' >> /etc/apk/repositories && \
#    echo '@community http://nl.alpinelinux.org/alpine/edge/community' >> /etc/apk/repositories && \
#    apk add --update \
#        mc \
#        php5-zip \
#        php5-gd \
#        php5-geoip@testing \
#        php5-xdebug@community \
#        && \
#    rm -rf /var/cache/apk/* /tmp/* /usr/share/man \
#    && echo "short_open_tag = On" >> /etc/php5/php.ini \
#    && echo -e "\n\
#xdebug.remote_enable = On\n\
#xdebug.remote_autostart = Off\n\
#xdebug.remote_mode = req\n\
#xdebug.remote_handler = dbgp\n\
#xdebug.remote_port = 9001\n\
#xdebug.idekey = \"PHPSTORM\"\n\
#xdebug.remote_connect_back = Off\n\
#" >> /etc/php5/conf.d/xdebug.ini
