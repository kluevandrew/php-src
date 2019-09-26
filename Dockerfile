FROM debian:9

RUN apt-get update \
    && apt-get install -y \
                autoconf \
                bison \
                build-essential \
                git-core \
                libbz2-dev \
                libcurl4-openssl-dev \
                libfreetype6-dev \
                libicu-dev \
                libjpeg-dev \
                libmcrypt-dev \
                libpng-dev \
                libpspell-dev \
                libreadline-dev \
                libssl-dev \
                libxml2-dev \
                libsqlite3-dev \
                libonig-dev \
                libzip-dev \
                pkg-config \
                re2c

COPY . /php-src
WORKDIR /php-src

RUN ./buildconf --force \
    && ./configure \
    --with-libxml \
    --with-openssl \
    --with-curl \
    --with-webp \
    --with-jpeg \
    --with-xpm \
    --with-zip \
    --enable-mbstring \
   && make \
   && make install