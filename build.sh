#!/usr/bin/env bash

function build_and_push_images() {
  docker build -t "medzoner/cdn.medzoner.com:${VERSION}" -f ./DockerfileCdn .
  docker tag  "medzoner/cdn.medzoner.com:${VERSION}" "medzoner/cdn.medzoner.com"
  docker push "medzoner/cdn.medzoner.com:${VERSION}"
  docker push "medzoner/cdn.medzoner.com"

  docker build -t "medzoner/medzoner.com:${VERSION}" -f ./Dockerfile .
  docker tag  "medzoner/medzoner.com:${VERSION}" "medzoner/medzoner.com"
  docker push "medzoner/medzoner.com:${VERSION}"
  docker push "medzoner/medzoner.com"
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
    build_all 'linux-amd64'
    exit 0
  fi
fi