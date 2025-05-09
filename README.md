# Laravel Project Setup

To set up the Laravel project, follow the steps below:

## 1. Repository Cloning

Clone or download the project into your working directory. The Laravel project is located in the `WTECH_Laravel` folder.

```bash
git clone https://github.com/Izar22/WTECH_Goicoechea_Ripoll.git
```

## 2. Dependency Installation

Install all necessary PHP dependencies using Composer:

```bash
composer install
```

## 3. Environment Configuration

Copy `.env.example` to `.env` and update the database connection settings to match your local MySQL setup:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

## 4. Application Key Generation

Generate the application key:

```bash
php artisan key:generate
```

## 5. Database Preparation

Create the database specified in your `.env` file manually (using a MySQL client or command line), then run the migrations:

```bash
php artisan migrate
```

## 6. Seeding the Database

Populate the database with initial data using:

```bash
php artisan db:seed
```

## 7. Running the Development Server

Start the Laravel development server:

```bash
php artisan serve
```

The application will be accessible at: [http://127.0.0.1:8000](http://127.0.0.1:8000)
