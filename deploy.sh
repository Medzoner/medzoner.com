#!/usr/bin/env bash

function deploy() {
  echo "deploy:"
  /usr/bin/rancher --debug up -d --stack "medzoner"
  /usr/bin/rancher --debug up -d --force-upgrade --pull --stack "medzoner" --confirm-upgrade app-medzoner
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