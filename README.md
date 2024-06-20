# Deloitte Case Study

## Requirements
- Docker
- Docker Compose
- Any SQL Client Software - To display your mysql database - optional

## Setup
- Copy .env-example as .env
    - macOS/Linux: `cp .env.example .env`
    - Windows: `cp .\.env.example .\.env`

- Run the commands below to initialize the docker containers 

```
docker-compose build
docker-compose run app composer install
```

- To deploy the development server

```
docker-compose up -d
```

- After this is completed, your services should look like below
    - app: main application service
        - host -> http://127.0.0.1
        - port -> 8000
    - queue: queue worker currently for elastic search indexing
        - host -> http://127.0.0.1
    - mysql: main database service
        - host -> http://127.0.0.1
        - port -> 3306
    - redis: caching
        - host -> http://127.0.0.1
        - port -> 6379
    - elasticsearch:
        - host -> http://127.0.0.1
        - port -> 9200
    - kibana:
        - host -> http://127.0.0.1
        - port -> 5601

- To connect to your application service, run the command below.
```
docker exec -it app sh
```

- Run the command below to generate the application key
```
php artisan key:generate
```

- While you are still connected to your application service via sh, run the command below to run the migrations.
```
php artisan migrate
```

- While you are still connected to your application service via sh, run the command below to generate categories and products.
```
 php artisan db:seed
```
