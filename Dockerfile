FROM docker.io/vinik/web:latest

MAINTAINER Vinícius Kirst <vinicius@versul.com.br>

RUN a2ensite default

COPY . /var/www/html

EXPOSE 80

CMD apachectl -D FOREGROUND
