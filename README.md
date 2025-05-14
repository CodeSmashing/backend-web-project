# Backend Web project

Final project for Backend Web course

___

## Project Overview

This repository contains the final project for the the **Backend Web** course.
It is built using the [Laravel](https://laravel.com/) framework and tries to follow modern PHP and Laravel best practices.

___

## Getting Started

### Requirements

- **PHP 8.x**
- **Composer**
- **PHPUnit**

___

### Setup

```bash
# Clone the repository
git clone https://github.com/CodeSmashing/backend-web-project.git
cd BackendWeb

# Install PHP dependencies
composer install

# Copy and configure environment variables
cp .env.example .env
php artisan key:generate

# Run migrations (if needed)
php artisan migrate

# Start the development server
php artisan serve
```

___

## Usage

- Access the application at [http://localhost:8000](http://localhost:8000) after running `php artisan serve`.
- API endpoints are available under `/api`.

___

## Structure

```bash
app/             # Application logic (controllers, models, services, helpers)
routes/          # Route definitions (web.php for web, api.php for API)
resources/views/ # Blade templates
public/          # Publicly accessible files (entry point, assets)
```

___

## Contributing

Pull requests are welcome for improvements or fixes!
Feel free to fork the repository and submit your changes.

___

## License

This project is open-source and available under the [MIT license](LICENSE).
