#!/bin/bash
sudo apt-get install composer -y
composer install
curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | sudo -E bash
echo "symfony-cli be install"
sudo apt install symfony-cli -y
symfony console make:migration
symfony console doctrine:database:create
symfony console doctrine:migrations:migrate
symfony serve
