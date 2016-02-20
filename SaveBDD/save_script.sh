#!/bin/sh
mysqldump --add-drop-table -hlocalhost -uroot -ptoor vol-wp > ./vol-wp_`date +"%Y-%m-%d"`.sql
