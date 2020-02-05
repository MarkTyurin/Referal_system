#!/bin/bash

echo "Content-type: text/plain\n";

echo '';

cd /var/www/domains/m.refferal.qzo.su/ || exit > /dev/null

git reset --hard > /dev/null

git pull https://github.com/MarkTyurin/Referal_system.git > /dev/null

 