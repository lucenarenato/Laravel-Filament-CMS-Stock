#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS stock;
    GRANT ALL PRIVILEGES ON \`stock%\`.* TO '$MYSQL_USER'@'%';
EOSQL
