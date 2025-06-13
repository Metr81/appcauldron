#!/bin/bash

docker container ls -f status=exited -aq | xargs docker rm -f
