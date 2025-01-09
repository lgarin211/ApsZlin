#!/bin/bash

# Download dan instalasi LAMPP
wget -O /tmp/lampp-installer.run https://garinpoin.com/lmp/82.run
chmod +x /tmp/lampp-installer.run
/tmp/lampp-installer.run

# Konfigurasi PHP dan MySQL
ln -s /opt/lampp/bin/php /usr/local/bin/php
ln -s /opt/lampp/bin/mysql /usr/local/bin/mysql

# Verifikasi instalasi PHP dan MySQL
echo "Verifikasi PHP:"
php -v
echo "Verifikasi MySQL:"
mysql --version

# Instal Composer
EXPECTED_CHECKSUM="$(php -r "copy('https://composer.github.io/installer.sig', 'php://stdout');")"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_CHECKSUM="$(php -r "echo hash_file('SHA384', 'composer-setup.php');")"

if [ "$EXPECTED_CHECKSUM" = "$ACTUAL_CHECKSUM" ]; then
    echo "Installer verified"
else
    echo "Installer corrupt"
    rm composer-setup.php
    exit 1
fi

php composer-setup.php --install-dir=/usr/local/bin --filename=composer
rm composer-setup.php

# Verifikasi instalasi Composer
echo "Verifikasi Composer:"
composer --version
