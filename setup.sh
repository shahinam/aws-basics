#!/usr/bin/env bash

# Install webserver with PHP.
apt-get update
apt-get install apache2
apt-get install php libapache2-mod-php php-mcrypt php-mysql php-cli

# Install this to emulate system load, so we can test autoscaling.
apt-get install stress

# install composer
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer