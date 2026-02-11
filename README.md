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
- Product status control (Active / Inactive)

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

# ⚙️ Installation & Setup

---

## 1️⃣ Clone the Repository

Clone the project from GitHub to your local machine.

```bash
git@github.com:parthokar90/laravel-multivendor-ecommerce.git
```

## 2️⃣ Navigate to Project Folder

Move into the project directory.

```bash
cd your-repository-name
```

3️⃣ Install PHP Dependencies
```bash
composer install
```

4️⃣ Install Frontend Dependencies
```bash
npm install
npm run dev
```

5️⃣ Configure Environment File

```bash
cp .env.example .env
```

6️⃣ Run Database Migration & Seeders
```bash
php artisan migrate --seed
```

7️⃣ Start the Development Server
```bash
php artisan serve
```








