# Use the PHP OpenSwoole image
FROM openswoole/swoole:latest

# Set the working directory
WORKDIR /app

# Copy the PHP code into the container
COPY . .

# Expose port 9501
EXPOSE 9501

# Run the OpenSwoole server
CMD ["php", "server.php"]
