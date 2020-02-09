cli:
	docker run --rm -v ${PWD}/manager:/app --workdir=/app php:7.2-cli php bin/app.php


dev-build:
	docker build --file=manager/docker/development/php-cli.docker --tag manager-php-cli manager/docker/development

dev-cli:
	docker run --rm manager-php-cli php bin/app.php

prod-build:
	docker build --file=manager/docker/production/php-cli.docker --tag manager-php-cli manager

prod-cli:
	docker run --rm manager-php-cli php bin/app.php