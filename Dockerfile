# Use a PHP and OpenSwoole-compatible image
FROM openswoole/swoole:latest

# Copy the server script into the container
COPY server.php /var/www/server.php

# Run the server script
CMD ["php", "/var/www/server.php"]
