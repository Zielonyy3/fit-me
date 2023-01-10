include .env

init:
	git add --all
	git reset --hard
	git pull
	docker-compose --env-file .env down
	docker-compose --env-file .env up -d
	docker exec -ti fit_me sh -c "composer install;php artisan migrate:refresh --force --seed -v;npm install;npm run dev"
prod-update:
	git add --all
	git reset --hard
	git pull
	docker exec -ti fit_me sh -c "composer install;php artisan migrate --force;php artisan db:seed --class=PermissionsAndRolesSeeder --force;npm install;npm run prod"
	make chmod
update:
	git pull
	docker exec -ti fit_me sh -c "composer install;php artisan migrate; php artisan db:seed --class=PermissionsAndRolesSeeder --force;npm install;npm run dev"
	make chmod
up:
	docker-compose --env-file .env up -d
	docker exec -ti fit_me sh -c "composer install;php artisan migrate; php artisan db:seed --class=PermissionsAndRolesSeeder --force;npm install;npm run dev"
prod-up:
	docker-compose --env-file .env up -d
	docker exec -ti fit_me sh -c "composer install;php artisan migrate --force;npm install;npm run prod"
down:
	docker-compose down
bash:
	docker exec -it fit_me /bin/bash
horizon:
	docker exec fit_me sh -c "php artisan horizon"
schedule:
	docker exec fit_me sh -c "php artisan schedule:run"
db-dump:
	/usr/local/bin/docker-compose exec -T fit_me_db pg_dump -U ${DB_USERNAME} ${DB_DATABASE} --no-owner | gzip -9  > storage/app/dump/db-backup-$(shell date +%F).sql.gz
	find storage/app/dump -mtime +30 -exec rm -rf {} \;
chmod:
	docker exec -ti -u root fit_me sh -c "chmod -R 777 storage"
