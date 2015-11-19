<VirtualHost *:80>
	ServerAdmin webmaster@localhost
	ServerName shuju.bossgoo2015.com
	DocumentRoot /var/www/bossgoo_shuju/

	<Directory /var/www/bossgoo_shuju/>
		Options Indexes FollowSymLinks MultiViews
		AllowOverride ALL
		Order allow,deny
		allow from all
	</Directory>

	#ErrorLog ${APACHE_LOG_DIR}/error.log

	# Possible values include: debug, info, notice, warn, error, crit,
	# alert, emerg.
	LogLevel warn

	CustomLog ${APACHE_LOG_DIR}/access.log combined

</VirtualHost>

