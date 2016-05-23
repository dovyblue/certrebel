#!/bin/bash

# Database credentials
user='root'
password='$lice0fBread@123'
db_name='CertRebel'
beta_host='beta.certrebel.com'
live_host='certrebel.com'

echo "Now dumping beta mysql tables"
umask 177
declare -a arr=("courses" "single_course_info")

for table in "${arr[@]}"
do
	mysqldump --host=$beta_host --user=$user --password=$password $db_name $table > /usr/share/php/sql_tables/$table.sql
done

echo "Now writing into live db"

for table in "${arr[@]}"
do
	mysql --host=$live_host --user=$user --password=$password $db_name < /usr/share/php/sql_tables/$table.sql
done

echo "done";
