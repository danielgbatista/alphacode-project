# Use the image official of MySQL 5.7 as base
FROM mysql:5.7

# Define the environment variable MYSQL_ROOT_PASSWORD to 'root'
ENV MYSQL_ROOT_PASSWORD=root

# Copy the contents of the local 'sql' directory to '/docker-entrypoint-initdb.d/' inside the container
COPY ./db/ /docker-entrypoint-initdb.d/

# Expose port 3306
EXPOSE 3306