# Etapa 1: Build de assets con Node.js
FROM node:18 AS nodebuild
WORKDIR /app

COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build


# Etapa 2: PHP + Apache + Composer
FROM php:8.1-apache

# Instala dependencias
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    libpq-dev libcurl4-openssl-dev libssl-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Habilita mod_rewrite (para Laravel)
RUN a2enmod rewrite

# Copia Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define document root
ENV APACHE_DOCUMENT_ROOT /var/www/public

# Ajusta Apache config para Laravel
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

# Copia proyecto
WORKDIR /var/www
COPY . .

# Copia assets generados
COPY --from=nodebuild /app/public /var/www/public
COPY --from=nodebuild /app/resources /var/www/resources

# Instala dependencias PHP
#RUN composer install --no-dev --optimize-autoloader
RUN composer install --optimize-autoloader

# Asigna permisos correctos al directorio de logs y cache
RUN mkdir -p /var/www/storage/logs /var/www/storage/framework/sessions \
    && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Copiar script de inicio
COPY docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

CMD bash -C '/usr/local/bin/start.sh';'bash'