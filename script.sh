#!/bin/bash

sudo apt update
sudo apt upgrade -y 
sudo apt install mysql-server phpmyadmin apache2 libapache2-mod-php8.1 -y

sudo systemctl start mysql.service
sudo systemctl enable mysql.service

sudo systemctl start apache2.service
sudo systemctl enable apache2.service

sudo wget -P /var/www/html https://raw.githubusercontent.com/rubenvizros/ESP01-to-BBDD/main/src/form.php
sudo wget -P /var/www/html https://raw.githubusercontent.com/rubenvizros/ESP01-to-BBDD/main/src/index.html
sudo wget https://raw.githubusercontent.com/rubenvizros/ESP01-to-BBDD/main/src/Arduino.sql
sudo mysql sys < Arduino.sql
