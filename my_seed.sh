#!/bin/bash

#seed the DB

php artisan db:seed --class=UsersTableSeeder
php artisan db:seed --class=FilesTableSeeder
php artisan db:seed --class=FileVersionsTableSeeder
php artisan db:seed --class=MetadataTableSeeder
