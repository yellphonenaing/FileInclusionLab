#!/bin/bash

#Modify PHP configuration file for easy exploits
sed -i 's/^\s*allow_url_include\s*=.*/allow_url_include = On/' /etc/php/8.2/apache2/php.ini

# Start Apache in the foreground
apachectl -D FOREGROUND
