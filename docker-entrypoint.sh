#!/bin/bash
set -e

# Wait for database if needed (for production databases)
# You can add database connection checks here if using external database

# Create .env file if it doesn't exist
if [ ! -f .env ]; then
    if [ -f .env.example ]; then
        cp .env.example .env
    else
        touch .env
    fi
fi

# Generate application key if not set
php artisan key:generate --force || true

# Run migrations (with error handling)
php artisan migrate --force || echo "Migration failed, continuing..."

# Clear and cache configuration (with error handling)
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Optimize Laravel (only in production)
if [ "$APP_ENV" = "production" ]; then
    php artisan config:cache || true
    php artisan route:cache || true
    php artisan view:cache || true
fi

# Use PORT environment variable from Render.com, default to 8000
if [ -z "$PORT" ]; then
    export PORT=8000
fi

# Update Apache ports.conf to listen on the PORT
echo "Listen $PORT" > /etc/apache2/ports.conf

# Create Apache virtual host configuration with dynamic PORT
cat > /etc/apache2/sites-available/000-default.conf <<EOF
<VirtualHost *:$PORT>
    ServerName localhost
    DocumentRoot /var/www/html/public

    <Directory /var/www/html/public>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog \${APACHE_LOG_DIR}/error.log
    CustomLog \${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF

# Start Apache
exec apache2-foreground

