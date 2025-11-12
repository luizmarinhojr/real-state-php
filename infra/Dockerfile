# Baseado na imagem PHP-FPM solicitada
FROM php:8.3-rc-fpm-alpine3.21

# Define o diretório de trabalho padrão
WORKDIR /var/www/html

# Instala dependências do sistema e extensões do PHP necessárias
# Correção: Use 'php83-pdo_mysql' e 'php83-mysqli' em vez de apenas 'pdo_mysql'
RUN apk update && apk add --no-cache \
    git \
    curl \
    bash \
    php83-mysqli \
    && rm -rf /var/cache/apk/*

RUN echo "extension=/usr/lib/php83/modules/mysqli.so" > /usr/local/etc/php/conf.d/mysqli.ini

# Instala o Composer Globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 9000