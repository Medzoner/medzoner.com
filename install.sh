#!/usr/bin/env bash

#is ssh agent set ?
if [ -z "$SSH_AUTH_SOCK" ] ; then
  eval `ssh-agent -s`
  ssh-add
fi

##retrive submodules
git submodule update --init --recursive --remote
