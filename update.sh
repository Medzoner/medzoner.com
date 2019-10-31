#!/bin/bash

kubectl -n default set image deployment/medzoner-php medzoner-php=registry.medzoner.com/medzoner/medzoner.com
