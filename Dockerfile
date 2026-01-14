FROM debian:12

ENV DEBIAN_FRONTEND=noninteractive

RUN apt update && apt install -y \
    apache2 \
    php \
    libapache2-mod-php \
    php-cli \
    php-curl \
    php-gd \
    php-zip \
    php-xml \
    curl \
    && apt clean


RUN a2enmod php* rewrite
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

COPY start.sh /start.sh
RUN chmod +x /start.sh

RUN rm -rf /var/www/html/
COPY ./src/ /var/www/html

COPY flag.txt /etc/flag.txt


EXPOSE 80

CMD ["/start.sh"]
