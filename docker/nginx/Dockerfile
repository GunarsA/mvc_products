FROM nginx

# Copy custom configuration file
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Copy the application files
COPY . /var/www/html