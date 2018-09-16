#!/usr/bin/env bash

function build_and_push_images() {
  docker build -t "registry.medzoner.com/medzoner/cdn.medzoner.com:${VERSION}" -f ./DockerfileCdn .
  docker tag  "registry.medzoner.com/medzoner/cdn.medzoner.com:${VERSION}" "medzoner/cdn.medzoner.com"
  docker push "registry.medzoner.com/medzoner/cdn.medzoner.com:${VERSION}"
  docker push "registry.medzoner.com/medzoner/cdn.medzoner.com"

  docker build -t "registry.medzoner.com/medzoner/medzoner.com:${VERSION}" -f ./Dockerfile .
  docker tag  "registry.medzoner.com/medzoner/medzoner.com:${VERSION}" "medzoner/medzoner.com"
  docker push "registry.medzoner.com/medzoner/medzoner.com:${VERSION}"
  docker push "registry.medzoner.com/medzoner/medzoner.com"
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