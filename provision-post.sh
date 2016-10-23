#!/usr/bin/env bash

set -ex

### Plugin
/usr/local/bin/wp --path=/var/www/public plugin delete akismet hello
/usr/local/bin/wp --path=/var/www/public plugin activate vccw-gulp-example-plugin disable-comments vccw-gulp-example-plugin

### Theme
/usr/local/bin/wp --path=/var/www/public theme activate vgex
/usr/local/bin/wp --path=/var/www/public theme delete twentyfifteen twentyfourteen twentysixteen
