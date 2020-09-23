#!/bin/sh

FILE=.ddev/.init.txt
if [ ! -f $FILE ]; then
    date > $FILE
    composer install
else
    echo "Composer already installed. Skipping..."
fi
