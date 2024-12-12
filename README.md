## Deploy
- env файл
- `docker-compose up -d`
- `docker exec app composer install`
- `docker exec app php artisan key:generate`
- `docker exec app php artisan migrate`
- `docker exec app php db:fill-test-data }`

## Routes
- **_GET /api/v1/users?page=1&filter[name]=name&sort=-name - index_**
- **_GET /api/v1/users/1 - show_**
- **_POST /api/v1/users - store_**
- **_PUT/PATCH /api/v1/users/1 - update_**
- **_DELETE /api/v1/users/1 - destroy_**

### Потратил ~2.5 часа
