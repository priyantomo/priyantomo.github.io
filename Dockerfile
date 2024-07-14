# Use the official PHP image as the base image
FROM php:7.4-apache

# Install MySQLi extension
RUN docker-php-ext-install mysqli

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html/

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
