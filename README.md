# ec-cms-test
```
・require: Docker/Docker-Compose
・recommended: macOS
```

## install

・replace the filename of `.env.example` with `.env`<br>
・then, execute command shown below in terminal

```
> docker-compose up -d
> docker-compose exec php bash
> composer install
> php artisan migrate
> php artisan storage:link
```

## run

・@localhost:8080

```
docker-compose up -d
```