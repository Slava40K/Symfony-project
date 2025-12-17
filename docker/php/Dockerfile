FROM php:8.4-fpm

# System-Abhängigkeiten installieren (inklusive Build-Tools)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libicu-dev \
    libxml2-dev \
    libpng-dev \
    libonig-dev \
    libpq-dev \
    libssl-dev \
    librabbitmq-dev \
    gcc \
    make \
    autoconf \
    pkg-config \
    libxslt1-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# GD-Abhängigkeiten installieren
RUN apt-get update && apt-get install -y \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Node.js & npm installieren (Node 20 LTS)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# PHP-Erweiterungen installieren
RUN docker-php-ext-install mysqli \
    && docker-php-ext-install pdo pdo_mysql intl zip opcache \
    && docker-php-ext-install xsl

# Redis und AMQP (RabbitMQ) Erweiterungen installieren
RUN pecl install redis amqp \
    && docker-php-ext-enable redis amqp

# Symfony CLI installieren
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

# Composer installieren
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
