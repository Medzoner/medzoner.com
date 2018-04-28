#!/usr/bin/env bash

ARCHIVE_BUILD_FOLDER="/tmp/medzoner-builds"

# parameter: "platform-architecture"
function build_and_push_images() {
  docker build -t "medzoner/medzoner.com:${VERSION}" -f ./Dockerfile .
  docker tag  "medzoner/medzoner.com:${VERSION}" "medzoner/medzoner.com"
  docker push "medzoner/medzoner.com:${VERSION}"
  docker push "medzoner/medzoner.com"

  docker build -t "medzoner/cdn.medzoner.com:${VERSION}" -f ./Dockerfile .
  docker tag  "medzoner/cdn.medzoner.com:${VERSION}" "medzoner/cdn.medzoner.com"
  docker push "medzoner/cdn.medzoner.com:${VERSION}"
  docker push "medzoner/cdn.medzoner.com"
}

# parameter: "platform-architecture"
function build_archive() {
  BUILD_FOLDER="${ARCHIVE_BUILD_FOLDER}/$1"
  rm -rf ${BUILD_FOLDER} && mkdir -pv ${BUILD_FOLDER}/medzoner
  cp -r ./* ${BUILD_FOLDER}/medzoner/
  cd ${BUILD_FOLDER}
  tar cvpfz "medzoner.com-${VERSION}.tar.gz" medzoner
  cp -r "medzoner.com-${VERSION}.tar.gz" ${ARCHIVE_BUILD_FOLDER}/
  cd -
}

function build_all() {
  mkdir -pv "${ARCHIVE_BUILD_FOLDER}"
  for tag in $@; do
    name="medzoner"; if [ "$(echo "$tag" | cut -c1)"  = "w" ]; then name="${name}.exe"; fi
    cp -r ./medzoner-$tag* ./$name
    if [ `echo $tag | cut -d \- -f 1` == 'linux' ]; then build_and_push_images "$tag"; fi
    build_archive "$tag"
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