#!/bin/sh

git config --global user.email "travis@travis-ci.org"
git config --global user.name "Travis CI"

git remote add upstream "https://${GH_TOKEN}@github.com/baethon/phln.git"
git fetch upstream

git checkout upstream/gh-pages
git checkout -

docker run --rm -v "$PWD:/docs" squidfunk/mkdocs-material build
docker run --rm -v "$PWD:/docs" squidfunk/mkdocs-material gh-deploy -r upstream
