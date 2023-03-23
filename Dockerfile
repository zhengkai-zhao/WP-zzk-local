FROM php:7.4-apache

# Install Homebrew
RUN /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install.sh)"

# Add Homebrew to PATH
RUN echo 'eval $(/opt/homebrew/bin/brew shellenv)' >> /root/.bashrc && \
    eval $(/opt/homebrew/bin/brew shellenv)

# Install required PHP extensions
RUN docker-php-ext-install pdo_mysql

# Copy and set up WordPress files
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html/

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
