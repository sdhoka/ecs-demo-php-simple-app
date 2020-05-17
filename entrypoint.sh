#!/bin/bash

trap "exit" SIGINT

echo "extracting environment variables"

if [ ! -z "$RDS_CONFIG" ]; then

	$(echo ${RDS_CONFIG} | jq -r 'keys[] as $k | "export \($k)=\(.[$k])"')
fi

echo "starting apache server"

httpd -D FOREGROUND -c "PassEnv RDS_PORT RDS_HOSTNAME RDS_DB_NAME RDS_USERNAME RDS_PASSWORD"