# Hosting on Office LAN/WiFi Network

This guide will help you host the Laravel application on your local network so other devices in the office can access it.

## Quick Start

### Option 1: Using the provided script (Recommended)

```bash
./serve-lan.sh
```

### Option 2: Manual command

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

## Finding Your IP Address

Your current local IP address is: **192.168.20.92**

To find it manually on macOS:
```bash
ifconfig | grep "inet " | grep -v 127.0.0.1
```

On Linux:
```bash
ip addr show | grep "inet " | grep -v 127.0.0.1
```

On Windows:
```bash
ipconfig
```
(Look for IPv4 Address under your active network adapter)

## Accessing from Other Devices

Once the server is running, other devices on the same network can access:

**http://192.168.20.92:8000**

Replace `192.168.20.92` with your actual IP address if different.

## Firewall Configuration

### macOS
If you get connection errors, you may need to allow incoming connections:

1. Go to **System Preferences** → **Security & Privacy** → **Firewall**
2. Click the lock to make changes
3. Click **Firewall Options**
4. Ensure PHP is allowed, or temporarily disable firewall for testing

Or via terminal:
```bash
sudo /usr/libexec/ApplicationFirewall/socketfilterfw --add /usr/bin/php
sudo /usr/libexec/ApplicationFirewall/socketfilterfw --unblockapp /usr/bin/php
```

### Linux
```bash
sudo ufw allow 8000/tcp
```

### Windows
1. Open **Windows Defender Firewall**
2. Click **Advanced settings**
3. Create a new **Inbound Rule** for port 8000

## Troubleshooting

### Cannot access from other devices

1. **Check IP address**: Make sure you're using the correct IP address
   ```bash
   ifconfig | grep "inet " | grep -v 127.0.0.1
   ```

2. **Check firewall**: Ensure port 8000 is not blocked

3. **Check network**: Ensure all devices are on the same network/WiFi

4. **Try different port**: If 8000 is busy, use another port:
   ```bash
   php artisan serve --host=0.0.0.0 --port=8080
   ```

### Server won't start

1. Make sure you're in the project directory
2. Ensure PHP is installed: `php -v`
3. Check if port is already in use:
   ```bash
   lsof -i :8000
   ```

## Production Deployment

For a more permanent solution, consider:
- Using a proper web server (Apache/Nginx)
- Setting up a reverse proxy
- Using Laravel's built-in production optimizations

## Notes

- The development server (`php artisan serve`) is for development only
- For production use, set up a proper web server
- Keep the server running while others need to access it
- The server will stop when you close the terminal (unless run in background)

