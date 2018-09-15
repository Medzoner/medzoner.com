#!/bin/bash

echo ${KUBERNETES_ADMIN_CONF} > admin.conf
export KUBE_CONFIG=$(pwd)/admin.conf

kubectl get pods

kubectl -n default set image deployment/medzoner-php medzoner-php=registry.medzoner.com/medzoner/medzoner.com
