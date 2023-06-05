build:
    docker compose up --build -d

setup:
	cp .env.example .env
	chmod -R a+w .env
	chmod -R a+w storage/
	chmod -R a+w bootstrap/cache/
	docker compose up -d
	docker compose exec app sh -c 'composer install --ignore-platform-reqs --no-scripts && php artisan key:generate && npm install && npm run dev'

up:
	docker compose up -d

down:
	docker compose down -v

migrate:
	docker compose exec app bash -c "php artisan migrate --seed"

.PHONY: setup run down migrate build
