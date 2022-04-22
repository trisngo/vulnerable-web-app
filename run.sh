#!/bin/bash

# change these
DOCKERNAME=vuln_web
DOCKERFILE_NAME=Dockerfile
docker stop $DOCKERNAME
docker rm $DOCKERNAME
#docker rmi $DOCKERNAME
docker build -t $DOCKERNAME --file $DOCKERFILE_NAME .

docker run -d -p 127.0.0.1:8080:80 -v ./src/db:/var/www/html/db --name $DOCKERNAME $DOCKERNAME
