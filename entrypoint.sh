#!/bin/bash

trap "exit" SIGINT


echo "starting apache server"
httpd -D FOREGROUND -c "PassEnv RDS_PORT RDS_HOSTNAME RDS_DB_NAME RDS_USERNAME RDS_PASSWORD"
