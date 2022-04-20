#!/bin/bash

# change these
DOCKERNAME=zip_slip
DOCKERFILE_NAME=Dockerfile
docker stop $DOCKERNAME
docker rm $DOCKERNAME
#docker rmi $DOCKERNAME
docker build -t $DOCKERNAME --file $DOCKERFILE_NAME .

docker run -d -p 127.0.0.1:8080:80 --name $DOCKERNAME $DOCKERNAME
