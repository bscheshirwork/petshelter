FROM php:7.0.13-fpm-alpine
#!!!under construction!!!
MAINTAINER BSCheshir <bscheshir.work@gmail.com>

# Environments
ENV TIMEZONE            Europe/Moscow
#ENV TERM=xterm

RUN  \
#    echo 'http://alpine.gliderlabs.com/alpine/edge/main' > /etc/apk/repositories && \
#    echo 'http://alpine.gliderlabs.com/alpine/edge/community' >> /etc/apk/repositories && \
#    echo 'http://alpine.gliderlabs.com/alpine/edge/testing' >> /etc/apk/repositories && \

    echo '@testing http://nl.alpinelinux.org/alpine/edge/testing' >> /etc/apk/repositories && \
    echo '@community http://nl.alpinelinux.org/alpine/edge/community' >> /etc/apk/repositories && \

    # Install common packages
    apk add --update \
#        mc \
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
	    php7-common@community \
	    php7-session@community \
        php7-memcached@testing \
        php7-pdo_mysql@community \
        php7-pdo_pgsql@community \
        php7-intl@community \
        php7-gd@community \
        php7-xdebug@community #\
        && \
        docker-php-ext-enable memcached pdo_mysql pdo_pgsql intl gd xdebug &&\
    echo -e "\n\
expose_php = off\n\
cgi.fix_pathinfo = 0" >> /usr/local/etc/php/php.ini && \
    echo -e "\n\
xdebug.remote_enable = On\n\
xdebug.remote_autostart = Off\n\
xdebug.remote_mode = req\n\
xdebug.remote_handler = dbgp\n\
xdebug.remote_port = 9001\n\
xdebug.idekey = \"PHPSTORM\"\n\
xdebug.remote_connect_back = Off\n\
" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini


#RUN \
#    pear config-set temp_dir /tmp && \
#    pecl install imagick && \
#    docker-php-ext-enable imagick

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer global require "fxp/composer-asset-plugin:^1.2.0"


#RUN apk add --no-cache php7-dev autoconf imagemagick-dev imagemagick-c++ libtool gcc make build-base \
#&& wget -O /media/imagick.tgz http://pecl.php.net/get/imagick-3.4.3RC1.tgz \
#&& tar xf /media/imagick.tgz -C /media \
#&& cd /media/imagick-3.4.3RC1 && phpize7 \
#&& ./configure --with-php-config=$(which php-config7) --prefix=/usr \
#&& make install \
#&& echo "extension=imagick.so" > /etc/php7/conf.d/imagick.ini \
#&& rm -r /media/imagick* /usr/include/php7 /media/package.xml /usr/share/doc \
#&& apk del --no-cache gcc make build-base php7-dev autoconf imagemagick-dev libtool

# memcached, pdo_mysql, pdo_pgsql, intl, gd, imagick
