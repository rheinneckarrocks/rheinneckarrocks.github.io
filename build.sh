#!/usr/bin/env bash

EMAIL="$1"
USERNAME="$2"

# Configuring Git
if [ -n "${EMAIL}" ]; then
    git config user.email "${EMAIL}"
fi

if [ -n "${USERNAME}" ]; then
    git config user.name "${USERNAME}"
fi

git config --global push.default matching

# Running sculpin build
./vendor/bin/sculpin generate --env=prod

# Checking in changes to master branch
git checkout master
cp -r output_prod/* . && rm -rf output_prod

# Remove not needed directories
rm -rf _events

git add -A
git commit -m "Regenerated site."
git push;
