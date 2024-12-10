#Imagem padrao debian 10 do repositorio oficial
FROM iuripetrola/apache-php:7.1

# Copiar app
WORKDIR /var/www/html/
RUN rm /var/www/html/*
ADD . .