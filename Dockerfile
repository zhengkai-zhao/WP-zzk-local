FROM php:7.4-apache

# Install required packages using Homebrew
RUN /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)" \
    && echo 'eval "$(/opt/homebrew/bin/brew shellenv)"' >> /root/.zprofile \
    && eval "$(/opt/homebrew/bin/brew shellenv)" \
    && brew install freetype jpeg libpng mcrypt zip unzip curl

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo_mysql zip gd iconv \
    && a2enmod rewrite

# Copy application files to container
COPY . /var/www/html

# Start Apache web server
CMD ["apache2-foreground"]
