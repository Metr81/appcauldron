#!/bin/bash

docker volume ls -q | xargs docker volume rm -f
