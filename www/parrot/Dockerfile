FROM alpine:latest
RUN apk update
RUN apk add nginx
RUN apk add supervisor
RUN apk add php7-fpm
RUN mkdir /run/nginx
RUN adduser -g 'www' -h /www -D www
RUN chown -R www:www /var/lib/nginx
COPY supervisord.conf /etc/supervisord.conf
COPY default.conf /etc/nginx/conf.d/default.conf
COPY www.conf /etc/php7/php-fpm.d/www.conf
COPY php.ini /etc/php7/php.ini
COPY --chown=www:www index.php /www/index.php
CMD [ "/usr/bin/supervisord", "-c", "/etc/supervisord.conf" ]
EXPOSE 80

