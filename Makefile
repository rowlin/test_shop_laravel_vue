init: docker-down-clear docker-pull docker-build docker-up
up: docker-up
down: docker-down
restart: down up
sh:
	docker-compose run --rm php-cli bash
docker-cli-install:
	docker-compose run --rm php-cli composer install
docker-up:
	docker-compose up -d
docker-down:
	docker-compose down --remove-orphans
docker-down-clear:
	docker-compose down -v --remove-orphans
docker-pull:
	docker-compose pull
docker-build-nocache:
	docker-compose build --no-cache
docker-build:
	docker-compose build --pull
redis-cli:
	docker-compose exec redis redis-cli
tests:
	docker-compose run --rm php-cli ./vendor/bin/phpunit
