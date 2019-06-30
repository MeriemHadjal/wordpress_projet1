
cd /var/www/html
sudo rm -rf index.html
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
wp cli check-update
wp cli update
wp cli cache clear

wp core download --locale=fr_FR

wp config create --dbname=test --dbuser=root --dbpass=online@2017 --locale=fr_FR
wp db create
wp core install --url=localhost:8080 --title=Example --admin_user=admin --admin_password=online@2017 --admin_email=info@example.com