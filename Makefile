container_name = test_container
run: up-and-build-container composer-install
up-and-build-container:
	docker compose up -d --build
composer-install:
	docker exec -it $(container_name) composer install

cli:
	docker exec -it $(container_name) php src/cli.php

test:
	docker exec -it $(container_name) vendor/bin/pest