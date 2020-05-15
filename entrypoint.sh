#!/bin/bash

trap "exit" SIGINT

echo "extracting environment variables"
export RDS_PASSWORD= $RDS_PASSWORD|jq -r '.RDS_PASSWORD'

echo "starting apache server"
httpd -D FOREGROUND -c "PassEnv RDS_PORT RDS_HOSTNAME RDS_DB_NAME RDS_USERNAME RDS_PASSWORD"