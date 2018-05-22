#!/bin/sh

git config --global user.email "travis@travis-ci.org"
git config --global user.name "Travis CI"

git remote add upstream "https://${GH_TOKEN}@github.com/baethon/phln.git"

mkdocs gh-deploy -r upstream
