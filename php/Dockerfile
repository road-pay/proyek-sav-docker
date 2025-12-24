FROM php:8.2-fpm-alpine

# TAMBAHKAN BARIS INI (Install Ping):
RUN apk add --no-cache iputils

# Install ekstensi MySQL (yang sudah ada sebelumnya)
RUN docker-php-ext-install mysqli