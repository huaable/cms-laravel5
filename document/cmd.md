mysql -uroot -proot;

create database tefun charset utf8;

exit;


/usr/local/php/bin/php artisan migrate

chmod -R 777 /var/www//tefun.cn/storage/logs/
chmod -R 777 /var/www/tefun.cn/storage/framework/views/