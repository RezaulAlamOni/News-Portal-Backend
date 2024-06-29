# News Portal Project

This project is a Laravel application running on PHP 8.1 using Docker.

## Prerequisites

Ensure you have the following installed on your local development machine:

- Docker
- Docker Compose

## Getting Started

### 1. Clone the repository

```bash
git https://github.com/RezaulAlamOni/News-Portal-Backend.git
cd News-Portal-Backend
```

### 2. Set up the environment variables
   Create a .env file in the root of your project and copy the content from the provided .env example:
```bash
cp .env.example .env
```
Ensure that the .env file is configured correctly.

### 3. Build and run the Docker containers

```bash
docker-compose up --build -d
```

### 4. Install PHP dependencies
Open a new terminal window and run the following command:
```bash
docker-compose exec app composer install
```

### 5. Generate the application key
Run the following command to generate the application key:
```bash
docker-compose exec app php artisan key:generate
```

### 6. Run the database migrations
Run the following command to run the database migrations:
```bash
docker-compose exec app php artisan migrate
```

### 7. Install laravel passport
Run the following command to install laravel passport:
```bash
docker-compose exec app php artisan passport:install
```

### 8. Access the application
   Open your web browser and navigate to http://localhost:8001


## Useful Docker Commands
Stop the containers:
```bash
docker-compose down
```
### Rebuild the containers:
```bash
docker-compose up --build
```
Access the app container:
```bash
docker-compose exec app bash
```

## Notes

#### The default MySQL database is news_artical with the username root and password root. Ensure ports 8001 and 3306 are not in use by other applications.


