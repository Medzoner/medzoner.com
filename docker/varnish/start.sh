#!/usr/bin/env bash

# Start varnish and log
varnishd -f /etc/varnish/default.vcl -s malloc,512M -a 0.0.0.0:${VARNISH_PORT}
varnishlog
