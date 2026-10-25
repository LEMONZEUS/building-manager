# Building Maintenance Tracker

A Laravel web app where residents submit maintenance requests for their building and admins manage them.

## Features

- Register and log in (resident or admin roles)
- Admins: create, edit and delete buildings; mark requests resolved
- Residents: view buildings and submit maintenance requests
- Validation on every form
- JSON REST API (`/api/buildings`) with token authentication (Laravel Sanctum)
- A page that loads building data with JavaScript `fetch()`

## Tech stack

PHP, Laravel, SQLite (MySQL-compatible SQL), Blade, REST APIs, JSON, JavaScript, Git

## Run it locally

1. `git clone` this repository
2. `composer install`
3. Copy `.env.example` to `.env`, then run `php artisan key:generate`
4. `php artisan migrate`
5. `php artisan serve` and open http://localhost:8000

## What I learned

Built to learn MVC, migrations, Eloquent relationships (one-to-many), authentication and authorization with middleware, and REST API design.