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

# Run migrations
php artisan migrate --force || true

# Clear and cache configuration
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Optimize Laravel (only in production)
if [ "$APP_ENV" = "production" ]; then
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
fi

# Use PORT environment variable from Render.com, default to 8000
if [ -z "$PORT" ]; then
    export PORT=8000
fi

# Update Apache to use the PORT variable
sed -i "s/Listen 80/Listen $PORT/g" /etc/apache2/ports.conf
sed -i "s/:80/:$PORT/g" /etc/apache2/sites-available/000-default.conf

# Start Apache
exec apache2-foreground

