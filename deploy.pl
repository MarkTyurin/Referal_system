#!/bin/bash

echo -e "Content-type: text/plain\n";


cd /var/www/domains/m.refferal.qzo.su/ || exit > /dev/null

git reset --hard 07b2b8965b7840eff81926f0605e41c67f06faa8 > /dev/null


git pull https://github.com/MarkTyurin/Referal_system.git > /dev/null

chmod -R 755 /var/www/domains/m.refferal.qzo.su
 