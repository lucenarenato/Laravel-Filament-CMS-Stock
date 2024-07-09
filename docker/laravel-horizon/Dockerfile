#--------------------------------------------------------------------------
# Image Setup
#--------------------------------------------------------------------------
#

FROM php:8.2-fpm-alpine

# Instalar pacotes necessários
RUN apk --update add --no-cache \
    wget \
    curl \
    git \
    build-base \
    libmemcached-dev \
    libmcrypt-dev \
    libxml2-dev \
    zlib-dev \
    autoconf \
    cyrus-sasl-dev \
    libgsasl-dev \
    supervisor \
    oniguruma-dev \
    procps \
    libzip-dev \
    postgresql-dev \
    gmp-dev \
    imagemagick-dev \
    libpng-dev \
    jpeg-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    linux-headers

# Instalar extensões PHP
RUN docker-php-ext-install -j$(nproc) \
    gmp \
    soap \
    exif \
    pcntl \
    zip \
    pdo_mysql \
    pdo_pgsql \
    bcmath \
    intl \
    sockets \
    gd

# Configurar GD
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

# Instalar extensões PECL
RUN pecl install redis imagick && \
    docker-php-ext-enable redis imagick

# Adicionar usuário não-root
ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN addgroup -g ${PGID} sail && \
    adduser -D -G sail -u ${PUID} sail

# Instalar BZ2 (opcional)
ARG INSTALL_BZ2=false
RUN if [ "$INSTALL_BZ2" = "true" ]; then \
    apk --update add bzip2-dev && \
    docker-php-ext-install bz2; \
    fi

# Instalar GnuPG (opcional)
ARG INSTALL_GNUPG=true
RUN if [ "$INSTALL_GNUPG" = "true" ]; then \
    apk add --no-cache gpgme-dev gpgme && \
    if [ "$(php -r 'echo PHP_MAJOR_VERSION;')" = "8" ]; then \
        pecl install gnupg-1.5.0RC2; \
    else \
        pecl install gnupg; \
    fi && \
    docker-php-ext-enable gnupg; \
    fi

#--------------------------------------------------------------------------
# Optional Supervisord Configuration
#--------------------------------------------------------------------------
#
# Modifique o arquivo ./supervisor.conf para atender aos requisitos do seu aplicativo.
# Certifique-se de reconstruir seu contêiner com cada mudança.
#

COPY supervisord.conf /etc/supervisord.conf

ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c",  "/etc/supervisord.conf"]

#--------------------------------------------------------------------------
# Check PHP version
#--------------------------------------------------------------------------
#

RUN php -v

#--------------------------------------------------------------------------
# Final Touch
#--------------------------------------------------------------------------
#

WORKDIR /etc/supervisor/conf.d/
