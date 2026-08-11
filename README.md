# Laravel Layout Template 🚀

A reusable Laravel starter template configured with:

- **Laravel**
- **MySQL**
- **Bootstrap**
- **Vite**
- **pnpm**
- **macOS environment**

The goal of this template is to speed up the initial project setup by avoiding repetitive configuration steps.

---

## Requirements

Make sure you have installed:

- PHP
- Composer
- Node.js
- pnpm
- MySQL (DBngin, XAMPP, Brew or Docker)

> **Important:** MySQL must be running before starting the application.  
> If you use XAMPP, start both **Apache** and **MySQL**.

---

# Installation

## 1. Create Laravel Project

Create a new project folder:

```bash
mkdir my-project
cd my-project
```

Initialize Laravel:

```bash
composer create-project laravel/laravel .
```

---

## 2. Configure Database

Open the `.env` file and update the database configuration:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=my_database
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations:

```bash
php artisan migrate
```

If Laravel asks to create the database automatically, confirm with:

```text
Yes
```

---

# Bootstrap Setup

## 3. Install Laravel UI

Install Laravel UI package:

```bash
composer require laravel/ui
```

Generate Bootstrap scaffolding:

```bash
php artisan ui bootstrap
```

Install frontend dependencies:

```bash
pnpm install
```

---

## 4. Configure JavaScript

Update:

```
resources/js/app.js
```

Add Bootstrap import:

```javascript
import './bootstrap';
import * as bootstrap from 'bootstrap';
```

This enables Bootstrap JavaScript components:

- Modal
- Dropdown
- Collapse
- Offcanvas
- Tooltip

---

## 5. Configure CSS

This project uses CSS instead of SCSS.

Update:

```
resources/css/app.css
```

Add Bootstrap import:

```css
@import 'bootstrap/dist/css/bootstrap.min.css';
```

Custom styles should be added **after** Bootstrap:

```css
@import 'bootstrap/dist/css/bootstrap.min.css';

body {
    background-color: #f8f9fa;
}
```

---

## 6. Configure Vite

Update:

```
vite.config.js
```

Make sure the input files are:

```javascript
input: [
    'resources/css/app.css',
    'resources/js/app.js',
],
```

---

# Create Homepage

## 7. Replace Default Laravel View

Rename the default welcome page:

```bash
mv resources/views/welcome.blade.php resources/views/home.blade.php
```

Update the main route:

```
routes/web.php
```

```php
Route::get('/', function () {
    return view('home');
});
```

---

## 8. Load Assets in Blade

Inside:

```
resources/views/home.blade.php
```

include Vite assets:

```blade
@vite([
    'resources/css/app.css',
    'resources/js/app.js'
])
```

This loads compiled CSS and JavaScript files.

---

# Run the Application

Open two terminal windows.

## Terminal 1 - Start Vite

```bash
pnpm dev
```

## Terminal 2 - Start Laravel Server

```bash
php artisan serve
```

Application available at:

```
http://127.0.0.1:8000
```

---

# Final Checklist

Before starting development, verify:

- [x] MySQL is running
- [x] Database configured in `.env`
- [x] Laravel migrations executed
- [x] Bootstrap installed
- [x] `app.js` configured
- [x] `app.css` configured
- [x] Vite entry points updated
- [x] `pnpm dev` running
- [x] Laravel server running

---

## Development Commands

### Frontend

```bash
pnpm dev
```

### Backend

```bash
php artisan serve
```

### Database migrations

```bash
php artisan migrate
```