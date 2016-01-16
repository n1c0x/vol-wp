#!/bin/sh
/Applications/MAMP/Library/bin/mysqldump --add-drop-table -hlocalhost -uroot -proot vol-wp > ~/Sites/vol-wp/SaveBDD/vol-wp_`date +"%Y-%m-%d".sql
