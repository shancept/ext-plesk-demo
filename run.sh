#!/bin/bash
echo "Running run.sh"
chmod a+rwx .env
ln -f .env ./src/plib/.env
chmod a+rwx ./src/plib/.env