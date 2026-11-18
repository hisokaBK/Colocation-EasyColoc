# EasyColoc — Shared Housing & Expense Management

A Laravel application for organizing shared housing, invitations, household expenses, and balances between members.

## Features in the existing routes and models

- User authentication and profile management.
- Creation and management of shared-housing groups.
- Member invitations, exits and removal.
- Expense categories and household expense recording.
- Balances and expense splits between members.
- Admin dashboard and user access moderation.
- Route-level middleware for authentication, roles, membership and active collocations.

## Stack

PHP, Laravel, Blade templates, Eloquent models, Tailwind CSS, and Docker Compose.

## Project structure

- `src/` — Laravel application.
- `src/routes/web.php` — routes and access-control middleware.
- `src/app/Models/` — `Colocation`, `Membership`, `Invitation`, `Expense`, `ExpenseSplit`, `Balance`, `Category`, and `User`.
- `src/app/Http/Controllers/` — admin and user controllers.
- `src/resources/` — views and other frontend resources.
- `docker/` and `docker-compose.yml` — container configuration.

## Local development

Set up the Docker services using the provided Compose file, or use a compatible local PHP environment. In the Laravel app, install Composer dependencies, copy `.env.example` to `.env`, configure the database, generate an application key, and run migrations.

~~~bash
cd src
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
~~~

Install Node.js dependencies and run the frontend build when needed. This README describes the existing project structure; it does not imply a deployed service.
