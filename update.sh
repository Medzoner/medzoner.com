#!/bin/bash

export KUBE_CONFIG=$KUBE_CONFIG
kubectl -n default set image deployment/medzoner-php medzoner-php=registry.medzoner.com/medzoner/medzoner.com
