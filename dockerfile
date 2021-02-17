FROM php:7.4-apache
RUN echo "Servername localhost" >> /etc/apache2/apache2.conf
USER root
RUN apt-get update
RUN docker-php-ext-install mysqli
RUN service apache2 restart
RUN chown -R www-data:www-data /var/www/html
RUN chmod 774 /var/www/html
COPY index.php /var/www/html
