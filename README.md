# Laravel Task Manager

A simple Task Manager application built with Laravel 13, MySQL, Bootstrap, jQuery, and AJAX.

Repository: https://github.com/antonbroker/todo-app

## Features

- View all tasks
- Create a new task
- Toggle task status (Pending / Completed)
- Delete a task
- AJAX-based interactions without page reload

## Tech Stack

- PHP 8.3+
- Laravel 13
- MySQL
- Bootstrap
- jQuery
- AJAX

## Project Structure

```
Controller -> TaskService -> Eloquent Model -> MySQL

```

Business logic is separated into a dedicated service layer.

## Installation

### Clone the repository

```bash
git clone https://github.com/antonbroker/todo-app.git
cd todo-app
```

### Install dependencies

```bash
composer install
```
Frontend libraries are loaded through CDN, so no Node.js or npm installation is required.
### Create environment file

```bash
cp .env.example .env
```

Configure your MySQL connection inside `.env`.

### Generate application key

```bash
php artisan key:generate
```

### Run migrations

```bash
php artisan migrate
```

### Start the server

```bash
php artisan serve
```

Open:

```
http://127.0.0.1:8000
```

## Routes

| Method | Endpoint | Description |
|---------|----------|-------------|
| GET | `/` | Display all tasks |
| POST | `/tasks` | Create a task |
| POST | `/tasks/{id}/toggle` | Toggle task status |
| DELETE | `/tasks/{id}` | Delete a task |

## Notes

- AJAX is implemented using jQuery.
- CSRF protection is enabled.
- Business logic is handled by `TaskService`.
- Eloquent is used for database operations.

## Architecture

The application follows a layered architecture:

- Controller - handles HTTP requests and responses
- Service - contains business logic
- Model - interacts with the database through Eloquent

This separation improves maintainability and keeps controllers lightweight
