# Laravel Trip Planning API

## Overview
This is a Laravel-based API application that allows users to search for cities based on weather conditions, store planned trips, and manage user authentication via Laravel Sanctum.

## Prerequisites
- PHP 8.3+
- Composer
- MySQL 8
- Laravel 11
- Node.js & npm (for frontend if needed)

## Installation Steps
1. **Clone the Repository**
   ```sh
   git clone https://github.com/your-repo/laravel-trip-planning.git
   cd laravel-trip-planning
   ```

2. **Install Dependencies**
   ```sh
   composer install
   ```

3. **Create `.env` File**
   ```sh
   cp .env.example .env
   ```
   Update `.env` with your database credentials.

4. **Generate Application Key**
   ```sh
   php artisan key:generate
   ```

5. **Run Migrations**
   ```sh
   php artisan migrate
   ```

## Setting Up Laravel Sanctum
Laravel Sanctum is used for API authentication.

1. **Install Sanctum (if not installed)**
   ```sh
   composer require laravel/sanctum
   ```

2. **Publish Sanctum Configuration**
   ```sh
   php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
   ```

3. **Run Database Migrations**
   ```sh
   php artisan migrate
   ```

4. **Add Sanctum Middleware in `app/Http/Kernel.php`**
   ```php
   protected $middlewareGroups = [
       'api' => [
           \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
           'throttle:api',
           \Illuminate\Routing\Middleware\SubstituteBindings::class,
       ],
   ];
   ```

5. **Add Sanctum Trait in User Model**
   ```php
   use Laravel\Sanctum\HasApiTokens;

   class User extends Authenticatable {
       use HasApiTokens, HasFactory, Notifiable;
   }
   ```

6. **Authenticate Users via API Token**
    - Login API generates a Bearer token to be used in further requests.
    - Include `Authorization: Bearer {token}` in API calls.

## Running Database Seeders
To populate the database with test data, run:

```sh
php artisan db:seed
```

To seed a specific table, use:

```sh
php artisan db:seed --class=CitySeeder
php artisan db:seed --class=WeatherConditionSeeder
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=TripSeeder
```

## API Endpoints
### **Authentication**
- `POST /api/login` - Logs in a user and returns an API token.
- `POST /api/register` - Registers a new user.

### **Cities Search**
- `GET /api/cities?temp_min=15&temp_max=30&month=June` - Fetches cities based on weather conditions.

### **Trips Management**
- `POST /api/trips` - Stores trips for the authenticated user.
- `GET /api/trips` - Retrieves user’s planned trips.

## Running the Application
1. **Start Laravel Server**
   ```sh
   php artisan serve
   ```

2. **Test API with Postman**
    - Set `Authorization: Bearer {token}` in the headers.
    - Use the provided API endpoints to interact with the system.

## Deployment
1. **Optimize for Production**
   ```sh
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
2. **Set Up Supervisor for Queue Processing (Optional)**
3. **Deploy on AWS, DigitalOcean, or a Laravel-ready hosting provider.**

## Conclusion
This API enables efficient trip planning by filtering cities based on weather preferences and allowing users to store trips. It uses Laravel Sanctum for secure authentication and database seeders for easy testing.

