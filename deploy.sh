#!/usr/bin/env bash

function deploy() {
  echo "deploy:"
  curl -sL https://github.com/rancher/cli/releases/download/v0.6.1/rancher-linux-amd64-v0.6.1.tar.gz | tar -zx -C . && mv ./rancher-v0.6.1/rancher .

  ./rancher --debug up -d --stack "medzoner"
  ./rancher --debug up -d --force-upgrade --pull --stack "medzoner" --confirm-upgrade app-medzoner
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