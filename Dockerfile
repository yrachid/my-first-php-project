FROM php:5.3-apache

RUN mkdir /etc/locadora

COPY ./php.ini /etc/locadora

ENV PHP_INI_SCAN_DIR /etc/locadora

RUN echo "LogLevel: debug" >> /etc/apache2/httpd.conf && \
  cd /etc/apache2/mods-enabled && \
  ln -s ../mods-available/rewrite.load rewrite.load
