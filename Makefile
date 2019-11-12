env ?= .env
include $(env)

REMOTE_HOST := $(shell docker network inspect bridge -f '{{range .IPAM.Config}}{{.Gateway}}{{end}}')
export REMOTE_HOST
XDEBUG_CONFIG := remote_host=$(shell docker network inspect bridge -f '{{range .IPAM.Config}}{{.Gateway}}{{end}}') remote_port=9045
export XDEBUG_CONFIG

run:
	./docker/run.sh

bash:
	./docker/bash.sh

buildImg:
	./docker/build.sh test
