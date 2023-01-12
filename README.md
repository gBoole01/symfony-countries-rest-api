# Symfony Countries REST API

Simple REST API that uses Symfony and API Platform to provide data about Countries of the World.

## Usage

1. First, run `composer install` to install symfony and all dependencies
1. Then run `docker-compose up` to launch database container
1. In other terminal, run `symfony serve` to launch symfony development webserver
1. Finally, run `symfony console app:install-fixtures` to add Countries in database

Once everything is running, you can browse the documentation at `https://localhost:8000/api`
