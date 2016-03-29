#!/bin/bash

find ~/public_html/ -type d -exec chmod 0755 {} +
find ~/public_html/ -type f -exec chmod 0644 {} +

exit
