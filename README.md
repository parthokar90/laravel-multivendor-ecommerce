# Laravel Multi-Vendor E-commerce Platform

A complete **Multi-Vendor E-commerce Platform** built with **Laravel**, where multiple vendors can sell their products independently, customers can shop from different vendors, and admins can manage the entire system from a centralized dashboard.

This project follows clean architecture principles and is suitable for real-world, scalable e-commerce applications.

---

## Key Features

### Authentication & Authorization
- Admin, Vendor, and Customer authentication
- Role-based access control (RBAC)
- Secure login & registration system

---

### Vendor Management
- Vendor registration system
- Admin approval / rejection for vendors
- Vendor dashboard
- Vendor-wise product & order management
- Vendor earnings tracking

---

### Product Management
- Product CRUD (Create, Read, Update, Delete)
- Category & subcategory support
- Product images upload
- Vendor-specific products
- Product status control (active / inactive)

---

### Customer Features
- Browse products from multiple vendors
- Search & filter products
- Add to cart
- Checkout system
- Order history
- Customer profile management

---

### Order Management
- Cart system
- Order placement
- Order status tracking
- Vendor-wise order separation
- Admin order monitoring

---

### Admin Panel
- Dashboard with system overview
- Manage vendors, customers, and products
- Category management
- Order management
- Application settings control

---

## Tech Stack

- **Backend:** Laravel
- **Frontend:** Blade Template Engine
- **UI Framework:** Bootstrap
- **Database:** MySQL
- **Authentication:** Laravel Auth
- **ORM:** Eloquent ORM
- **Version Control:** Git & GitHub

---

## Project Structure

app/
├── Models
├── Http/
│ ├── Controllers/
│ │ ├── Admin/
│ │ ├── Vendor/
│ │ └── Frontend/
│ ├── Middleware
│ └── Requests
resources/
├── views/
│ ├── admin/
│ ├── vendor/
│ └── frontend/
├── css/
├── js/
routes/
├── web.php
├── admin.php
├── vendor.php
database/
├── migrations
└── seeders

## Install Dependencies

composer install
npm install
npm run dev

## Environment Configuration

cp .env.example .env
php artisan key:generate

## Run Migrations & Seeders

php artisan migrate --seed

## Run the Application

php artisan serve





