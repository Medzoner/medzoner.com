#!/usr/bin/env bash

ARCHIVE_BUILD_FOLDER="/tmp/medzoner-builds"

# parameter: "platform-architecture"
function build_and_push_images() {
  docker build -t "medzoner/medzoner:$1-${VERSION}" -f build/linux/Dockerfile .
  docker tag  "medzoner/medzoner:$1-${VERSION}" "medzoner/medzoner:$1"
  docker push "medzoner/medzoner:$1-${VERSION}"
  docker push "medzoner/medzoner:$1"
}

# parameter: "platform-architecture"
function build_archive() {
  BUILD_FOLDER="${ARCHIVE_BUILD_FOLDER}/$1"
  rm -rf ${BUILD_FOLDER} && mkdir -pv ${BUILD_FOLDER}/medzoner
  mv dist/* ${BUILD_FOLDER}/medzoner/
  cd ${BUILD_FOLDER}
  tar cvpfz "medzoner-${VERSION}-$1.tar.gz" medzoner
  mv "medzoner-${VERSION}-$1.tar.gz" ${ARCHIVE_BUILD_FOLDER}/
  cd -
}

function build_all() {
  mkdir -pv "${ARCHIVE_BUILD_FOLDER}"
  for tag in $@; do
    grunt "release:`echo "$tag" | tr '-' ':'`"
    name="medzoner"; if [ "$(echo "$tag" | cut -c1)"  = "w" ]; then name="${name}.exe"; fi
    mv dist/medzoner-$tag* dist/$name
    if [ `echo $tag | cut -d \- -f 1` == 'linux' ]; then build_and_push_images "$tag"; fi
    build_archive "$tag"
  done
  docker rmi $(docker images -q -f dangling=true)
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
    build_all 'linux-amd64 linux-arm linux-arm64 linux-ppc64le linux-s390x darwin-amd64 windows-amd64'
    exit 0
  fi
fi