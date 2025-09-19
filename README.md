# Traitz Laravel Interns Todo App

A simple Todo application built with Laravel for learning purposes.

## Prerequisites

-   PHP >= 8.1
-   Composer
-   Node.js & npm
-   SQLite (or another supported database)
-   Git

## Getting Started

### 1. Clone the Repository

```sh
git clone https://github.com/JuniorDCoder/traitz-laravel-interns-todo-app.git
cd traitz-laravel-interns-todo-app
```

### 2. Install PHP Dependencies

```sh
composer install
```

### 3. Install JavaScript Dependencies

```sh
npm install
```

### 4. Copy Environment File

```sh
cp .env.example .env
```

### 5. Generate Application Key

```sh
php artisan key:generate
```

### 6. Configure Database

By default, the app uses SQLite. You can use the provided `database/database.sqlite` file or create a new one:

```sh
touch database/database.sqlite
```

Edit `.env` and set:

```
DB_CONNECTION=sqlite
```

Or configure for MySQL/Postgres as needed.

### 7. Run Migrations

```sh
php artisan migrate
```

### 8. Build Frontend Assets

```sh
npm run build
```

### 9. Start the Development Server

```sh
php artisan serve
```

Visit [http://localhost:8000](http://localhost:8000) in your browser.

## Authentication

Register a new user or log in to access the dashboard and manage your todos.

## Running Tests

```sh
php artisan test
```

## Troubleshooting

-   If you see permission errors, ensure `storage/` and `bootstrap/cache/` are writable.
-   If you change `.env`, restart the server.

## Contributing

Pull requests are welcome! For major changes, please open an issue first.

## License

This project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).
