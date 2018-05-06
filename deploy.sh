#!/usr/bin/env bash

function deploy() {
  echo "deploy:"
  curl -sL https://github.com/rancher/cli/releases/download/v0.6.1/rancher-linux-amd64-v0.6.1.tar.gz | tar -zx -C . && mv ./rancher-v0.6.1/rancher .

  ./rancher --debug --env Production restart cdn-medzoner
  ./rancher --debug --env Production restart app-medzoner
}

if [[ $# -ne 1 ]] ; then
  echo "Usage: $(basename $0) <VERSION>"
  echo "       $(basename $0) \"echo 'Custom' && <BASH COMMANDS>\""
  exit 1
else
  VERSION="$1"
  if [ `echo "$@" | cut -c1-4` == 'echo' ]; then
    bash -c "$@";
  else
    ./build.sh $1
    deploy
    exit 0
  fi
fi