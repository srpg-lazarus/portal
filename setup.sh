if [ ! -e ./composer.phar ]; then
curl -sS https://getcomposer.org/installer | php
./composer.phar install
fi

php vendor/kenjis/codeigniter-cli/install.php
sed -i -e 's/vendor\/codeigniter\/framework\/system/system/g' ./ci_instance.php
sed -i -e 's/public//g' ./ci_instance.php
