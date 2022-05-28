init-first: docker-down-clear docker-pull docker-build docker-up docker-cli-install docker-npm-install restore-db npm-fix-permission docker-npm-prod
init: docker-down-clear docker-pull docker-build docker-up
up: docker-up
down: docker-down
restart: down up
rebuild: restore-db build-fix
sh:
	docker-compose run --rm php-cli bash
docker-cli-install:
	docker-compose run --rm php-cli composer install
docker-npm-prod:
	docker-compose run --rm php-cli --user 1000:1000 npm run prod
docker-npm-install:
	docker-compose run --rm php-cli npm i
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
restore-db:
	docker-compose run --rm php-cli php artisan migrate:refresh --seed
build-fix: #because artisan store:link does not work right (
	rm -Rf ./app/public/images
	chmod -R 777 ./app/storage/app/images
	mv -f ./app/storage/app/images ./app/public/images
	rm -Rf ./app/storage/app/images
watch:
	docker-compose run --rm php-cli npm run watch-poll
docker-fix-permission:
	docker-compose run --rm php-cli bash /scripts/fix_permissions.sh
npm-fix-permission:
	docker-compose run --rm php-cli chown -Rf cli-user ./node_modules/
