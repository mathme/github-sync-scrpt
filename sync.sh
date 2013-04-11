#!/bin/sh
repo=reponame
cd /var/www/html/github/$repo
sudo -u gitwrite git pull
sudo -u gitwrite cp -rfa /var/www/html/github/$repo /var/www/html/github/$repo
sudo -u gitwrite rm -rf /var/www/html/github/$repo/.git /var/www/html/github/$repo/sync.sh