// .htaccess

# Make the URLS look pretty
RewriteEngine On
RewriteBase /

# To externally redirect /dir/foo.php to /dir/foo
RewriteCond %{THE_REQUEST} ^[A-Z]{3,}\s([^.]+)\.php [NC]
RewriteRule ^ %1 [R,L]

# To internally forward /dir/foo to /dir/foo.php
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^(.*?)/?$ $1.php [L]


// In the HEAD of every file

<base href="/">

// e.g.

<title>Services | Meridian Financial</title>
<base href="/">
<meta name="keywords" content="">