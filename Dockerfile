FROM php:8.2-fpm

# Instalar dependências do sistema (inclui netcat-openbsd para aguardar MySQL)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    default-mysql-client \
    netcat-openbsd \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensões PHP necessárias para o Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instalar Composer (copiado da imagem oficial)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Criar usuário 'www' para evitar problemas de permissão
RUN groupadd -g 1000 www \
 && useradd -u 1000 -ms /bin/bash -g www www

# Definir diretório de trabalho
WORKDIR /var/www/html

# Mudar para o usuário 'www'
USER www

# Expor porta do PHP-FPM
EXPOSE 9000

# Comando padrão
CMD ["php-fpm"]
