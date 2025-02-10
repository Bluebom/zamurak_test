# Rode o projeto com Laravel Sail

```shell
cp .env.example .env
```

```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

```shell
./vendor/bin/sail up -d
```

```shell
./vendor/bin/sail artisan key:generate
```

```shell
./vendor/bin/sail artisan storage:link
```

```shell
./vendor/bin/sail artisan migrate:fresh --seed
```