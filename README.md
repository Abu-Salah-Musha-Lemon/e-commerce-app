# eCommerce Single Admin WebApp

## Overview

The **eCommerce Single Admin WebApp** is a powerful platform tailored for small businesses, allowing administrators to manage products, categories, and orders with ease. This application simplifies the complexities of online store management, providing essential features for product handling and order processing.

## Features

- **User Authentication**: Secure login and logout functionalities.
- **Product Management**: Add, delete, edit, and update products effortlessly.
- **Category Management**: Organize and manage product categories and subcategories.
- **Sales Overview**: View total sales figures and current inventory levels.
- **Stock Alerts**: Notifications for products with low stock (below 5).
- **Order Management**: Users can place orders, while admins can complete or cancel them.

## Technology Stack

- **Frontend**: HTML, CSS, JavaScript, jQuery, Bootstrap, Toastr
- **Backend**: Laravel 11
- **Database**: MySQL
- **Authentication**: Breez
- **Roles and Permissions**: Laratrust

## Installation

### Prerequisites

- PHP >= 8.2.12
- Composer
- Node.js and npm
- MySQL

### Setup Steps

1. **Clone the repository**:

   ```bash
   git clone https://github.com/Abu-Salah-Musha-Lemon/ecommerce-single-admin-webapp.git
   cd ecommerce-single-admin-webapp
   ```

2. **Install Composer dependencies**:

   ```bash
   composer install
   ```

3. **Create a new MySQL database**:

   ```sql
   CREATE DATABASE ecommerce_db;
   ```

4. **Configure your `.env` file**:

   Update the database connection settings in your `.env` file:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ecommerce_db
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Generate application key**:

   ```bash
   php artisan key:generate
   ```

6. **Cache the configuration**:

   ```bash
   php artisan config:cache
   ```

7. **Install npm packages**:

   ```bash
   npm install
   ```

8. **Run Laravel migrations**:

   ```bash
   php artisan migrate
   ```

9. **Run the development server**:

   ```bash
   php artisan serve
   ```

### Additional Configuration

#### `php.ini` Configuration

Ensure the following extension is enabled in your `php.ini` file:

```ini
extension=zip
```

#### Pagination System

To enable the pagination system, modify the `AppServiceProvider`:

```php
namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
```

## Laratrust User Configuration

Ensure your `User` model is configured for Laratrust:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\HasRolesAndPermissions;
use Laratrust\Contracts\LaratrustUser;

class User extends Authenticatable implements LaratrustUser 
{
    use HasFactory, Notifiable, HasRolesAndPermissions;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
```

## Usage

Access the application in your browser at `http://localhost:8000` (or the URL provided by the `php artisan serve` command).

1. **User Login**: Users can log in using their credentials.
2. **User Logout**: Users can log out to secure their accounts.
3. **Order Products**: Users can browse products and place orders.
4. **Admin Actions**: Admins can manage products, categories, view sales, and process or cancel orders.

## License

This project is licensed under the MIT License.

## Acknowledgments

- **Laravel**: For backend development.
- **Bootstrap** and **jQuery**: For frontend design.
- **Laratrust**: For role and permission management.

