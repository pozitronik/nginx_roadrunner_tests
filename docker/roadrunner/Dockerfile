FROM ghcr.io/roadrunner-server/roadrunner:2023.1.0 as rr
FROM php:8.2-cli

# Copy RoadRunner
COPY --from=rr /usr/bin/rr /usr/bin/rr

WORKDIR /var/www