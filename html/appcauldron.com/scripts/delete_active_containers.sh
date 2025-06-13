#!/bin/bash

docker ps -q | xargs docker rm -f
