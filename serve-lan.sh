#!/bin/bash

# Get the local IP address
LOCAL_IP=$(ifconfig | grep "inet " | grep -v 127.0.0.1 | awk '{print $2}' | head -1)

if [ -z "$LOCAL_IP" ]; then
    echo "Error: Could not determine local IP address"
    exit 1
fi

echo "=========================================="
echo "  Laravel Server - LAN Access"
echo "=========================================="
echo ""
echo "Local IP Address: $LOCAL_IP"
echo "Server will be accessible at: http://$LOCAL_IP:8000"
echo ""
echo "Other devices on the same network can access:"
echo "  http://$LOCAL_IP:8000"
echo ""
echo "Press Ctrl+C to stop the server"
echo "=========================================="
echo ""

# Run Laravel server on all interfaces (0.0.0.0)
php artisan serve --host=0.0.0.0 --port=8000

