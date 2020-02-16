#!/bin/sh

sudo python3 -m pip install --upgrade pip setuptools
sudo python3 -m pip install --upgrade pyopenssl ndg-httpsclient pyasn1
sudo python3 -m pip install -r ./pip_requirements.txt

git config --global user.email "travis@travis-ci.org"
git config --global user.name "Travis CI"

git remote add upstream "https://${GH_TOKEN}@github.com/baethon/phln.git"
git fetch upstream

git checkout upstream/gh-pages
git checkout -

mkdocs gh-deploy -r upstream
