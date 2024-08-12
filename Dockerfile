FROM dunglas/frankenphp:latest-php8.3-alpine

# Force to disable HTTPS and only run on port 80.
ENV SERVER_NAME=:80

COPY --link .docker/php.ini $PHP_INI_DIR/conf.d/
COPY --link .docker/Caddyfile /etc/caddy/Caddyfile

COPY . /app
