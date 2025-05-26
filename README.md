# 🎁 GiftStore

**GiftStore** is a simple Laravel 10-based backend project developed as part of a university course.  
It focuses on learning and applying backend concepts such as database design, migrations, seeders, factories, and
Eloquent relationships.

---

## 🔄 Last Updates

- Added flash messages via [PHP Flasher - Noty](https://php-flasher.io/)
- Integrated responsive UI using Bootstrap 5 and Font Awesome
- Built modular layout components: navbar, sidebar, and footer

---

## 📚 Purpose

This project is created for educational purposes to practice Laravel fundamentals and database architecture in a
structured and clean way.

---

## ⚙️ Requirements

- PHP >= 8.1
- Composer
- MySQL
- Laravel 10.x

---

## 📦 Installation

```bash
# 1. Clone the repo
git clone https://github.com/themuhamed/giftstore-backend.git
cd giftstore-backend

# 2. Install dependencies
composer install

# 3. Setup environment file
cp .env.example .env

# 4. Generate app key
php artisan key:generate

# 5. Configure your database in .env

# 6. Run migrations and seeders
php artisan migrate --seed

# 7. Create storage symbolic link
php artisan storage:link
```

---

## 👨‍💻 Developer

Developed with ❤️ by [Muhamed](https://github.com/themuhamed)  
University College of Applied Sciences (UCAS)  
Software Development – Web Design & Development Course

---

## 📄 License

This project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).
EOF
