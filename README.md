# Product Inventory API

## Setup Instructions

1. Clone repository
2. Run `composer install`
3. Copy `.env.example` to `.env`
4. Configure database
5. Run `php artisan migrate`
6. Start server:
   php artisan serve

## API Endpoints
- GET /api/products
- GET /api/products/{id}
- POST /api/products
- PUT /api/products/{id}
- DELETE /api/products/{id}


## Seeder 
- php artisan migrate

## Seeder 
- php artisan db:seed --class=RolePermissionSeeder

