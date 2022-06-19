#!/bin/bash
level=${1-8} #default level value is 8
src=${2-src} #default folder is src
php vendor/bin/phpstan analyse -l "$level" "$src"

#chmod +x ./phpstsan.sh
#./phpstsan.sh 8