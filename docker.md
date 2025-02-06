# 📦 Deployment using Docker

This application can be deployed using Docker with `docker-compose.yml`.

## 1️⃣ Install Docker
Ensure you have Docker & Docker Compose installed:

- [Install Docker](https://docs.docker.com/get-docker/)
- [Install Docker Compose](https://docs.docker.com/compose/install/)

## 2️⃣ Setup Docker Containers
The `docker-compose.yml` file defines:

- **PHP Laravel App** (`app`)
- **Nginx Web Server** (`web`)
- **MySQL Database** (`db`)

## 3️⃣ Create `.env` for Docker
Modify the `.env` file for the Docker-based database:

```ini
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=trips_laravel_api
DB_USERNAME=trips_laravel_api
DB_PASSWORD=trips_laravel_api
```

## 4️⃣ Start Containers
Run the following command:

```sh
docker-compose up -d
```

This will:

- Start the Laravel application (`app`)
- Start MySQL (`db`) on port **3308**
- Start Nginx (`web`) on port **8000**

## 5️⃣ Run Migrations & Seeders
After the containers are running, execute:

```sh
docker exec -it trips_laravel_app php artisan migrate --seed
```

## 6️⃣ Access the Application

- **API:** [http://localhost:8000](http://localhost:8000)
- **Database:** `mysql://localhost:3308`

## 7️⃣ Stopping & Removing Containers

```sh
docker-compose down
```

