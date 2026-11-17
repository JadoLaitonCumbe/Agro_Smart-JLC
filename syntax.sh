#!/bin/sh
set -eu
find . -name '*.php' -print0 | xargs -0 -n1 php -l >/dev/null
echo 'PHP syntax: OK'
