FROM php:7.4-apache

EXPOSE 80

WORKDIR /var/www/html/

RUN sed -ri -e 's!/var/www/html!/var/www/html/examples!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!/var/www/html/examples!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

RUN apt-get update
RUN apt-get install -y git mc vim

RUN apt-get install -y r-base \
    && Rscript -e 'install.packages("base64enc", repos="https://cloud.r-project.org")'

RUN rm -rf /var/lib/apt/lists/*