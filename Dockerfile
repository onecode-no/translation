FROM php:8.2-fpm-alpine
# Update package list
RUN apk update
RUN apk upgrade -q -U -a

RUN curl -s https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    composer self-update

