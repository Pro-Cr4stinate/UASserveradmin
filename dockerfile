#pull image php:7-4+webserver(apache)
FROM php:7.4-apache
#terjadi error saat restart webserver, sumber :https://stackoverflow.com/questions/47864581/apache-couldnt-determine-servername-on-docker-container
RUN echo "Servername localhost" >> /etc/apache2/apache2.conf
#ubah user ke root
USER root
#lakukan apt-getupdate
RUN apt-get update
#untuk menginstall extension container mysqli dari php+webserver sumber :https://stackoverflow.com/questions/46879196/mysqli-not-found-dockerized-php
RUN docker-php-ext-install mysqli
#restart apache service setelah menginstall plugin
RUN service apache2 restart
#copy file .php ke destinasi
COPY index.php /var/www/html
#ubah kepimilikan /var/www/hmtml ke www-data
RUN chown -R www-data:www-data /var/www/html
#beri permission rwxrwxr- ke /var/www/html
RUN chmod 774 /var/www/html
