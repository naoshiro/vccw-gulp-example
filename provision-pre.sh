#!/usr/bin/env bash

set -ex

### wp content clean
rm -rf /vagrant/www/public/wp-content/plugins
rm -rf /vagrant/www/public/wp-content/uploads
