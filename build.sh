#!/usr/bin/env bash

function build_and_push_images() {
  docker build -t "l24624j7.gra5.container-registry.ovh.net/medzoner/medzoner.com:${VERSION}" -f ./Dockerfile .
  docker tag  "l24624j7.gra5.container-registry.ovh.net/medzoner/medzoner.com:${VERSION}" "l24624j7.gra5.container-registry.ovh.net/medzoner/medzoner.com"
  docker push "l24624j7.gra5.container-registry.ovh.net/medzoner/medzoner.com:${VERSION}"
  docker push "l24624j7.gra5.container-registry.ovh.net/medzoner/medzoner.com"
}

function build_all() {
  for tag in $@; do
    build_and_push_images "$tag"
  done
  #docker rmi $(docker images -q -f dangling=true)
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
    build_all $1
    exit 0
  fi
fi
