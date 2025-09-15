# Utilise une image officielle PHP avec FPM
FROM php:8.2-fpm
# Installe les extensions nécessaires
RUN docker-php-ext-install pdo pdo_mysql
# Configure le timezone sur Europe/Paris
RUN ln -snf /usr/share/zoneinfo/Europe/Paris /etc/localtime && echo "Europe/Paris" > /etc/timezone \
    && dpkg-reconfigure -f noninteractive tzdata
# Copie ton code dans le conteneur
WORKDIR /var/www/html
COPY . /var/www/html