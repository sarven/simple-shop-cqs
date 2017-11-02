FROM nginx:alpine

ADD nginx.conf /etc/nginx/
ADD symfony.conf /etc/nginx/conf.d/
RUN adduser -D -H -u 1000 -s /bin/bash www-data

RUN echo "upstream php-upstream { server php:9000; }" > /etc/nginx/conf.d/upstream.conf

CMD ["nginx"]

EXPOSE 80
EXPOSE 443