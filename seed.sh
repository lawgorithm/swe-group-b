#!/bin/bash
php artisan migrate:refresh;
php artisan tinker < seed-data.in;
