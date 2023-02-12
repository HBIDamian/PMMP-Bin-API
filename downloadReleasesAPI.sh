curl -s --request GET \
--url "https://api.github.com/repos/pmmp/PHP-Binaries/releases" \
--header "Accept: application/vnd.github+json" \
--header "User-Agent: PMMP-Bin-API" \
--header "Authorization: Bearer ghp_xxxxxxxxxxxxxxxxxxx" > /var/www/example.com/public_html/pmmp/bin/api/data.json
chmod 755 /var/www/example.com/public_html/pmmp/bin/api/data.json
