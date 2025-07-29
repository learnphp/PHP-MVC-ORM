# 🛠️ PHP Mini Project - MVC + ORM mini project

A lightweight PHP project following the **[SOLID](https://en.wikipedia.org/wiki/SOLID) principles** with PSR-4 autoloading and a basic routing system - similar to micro-frameworks like Slim or Laravel, but without using any full-stack framework.

---
## ✅ What is SOLID?
**SOLID** is an acronym for five design principles in object-oriented programming that help you write maintainable, scalable, and robust code.


---
## 🚀 Features

This is a minimal PHP MVC framework-style project that demonstrates:
- Custom **ORM**
- PSR-4 **Autoloading**
- **SOLID Principles**
- **Custom Routing**
- Basic **Authentication** (Register/Login)
- Layout & View rendering system
  
## ⚙️ Project Setup Highlights

- ✅ Custom Router with Controller@method support
- ✅ PSR-4 Autoloading via Composer
- ✅ Basic ORM to interact with DB
- ✅ MVC pattern with views/layouts
- ✅ Form validation and error handling
- ✅ Registration and login system (using PHP Sessions or simple logic)
---
## ⚙️ Requirements

- PHP 8+
- Composer
- MySQL or SQLite
- Apache/Nginx (or use PHP's built-in server)

---

## 📁 Project Directory Structure
```bash
PHP-MVC-ORM/
├── app/
│   ├── controllers/
│   │   └── UserController.php
│   ├── models/
│   │   └── User.php
│   ├── services/
│   │   └── Auth.php
├── config/
│   └── database.php
├── core/
│   ├── Database.php
│   ├── Router.php
│   ├── Model.php
│   │── View.php
├── public/
│   └── index.php
├── routes/
│   └── web.php
├── composer.json
```


---

## ⚙️ Installation

```bash
git clone https://github.com/learnphp/PHP-MVC-ORM.git
cd PHP-MVC-ORM
composer install
composer dump-autoload
```

_If Composer is not installed or your PHP version has compatibility issues, you can install dependencies using the command below:_
```bash
cd PHP-MVC-ORM
php composer.phar install # or update
```

> 💡 Make sure you have `composer.phar` in your project root if Composer is not globally installed. Attached composer compatibility for PHP 7.2+ users
---

## 🌐 Access in Browser

Start PHP's built-in server:
```bash
php -S localhost:8000 -t public
```

Then open in browser:

- [`http://localhost:8000/register`](http://localhost:8000/register) → Shows registration form 
- [`http://localhost:8000/login`](http://localhost:8000/login) → Show the login page

-- Above two just for demostartion proposes.

---

## 🔁 Routing (routes/web.php)

```php
$router->post('/register', 'UserController@register');
$router->post('/login', 'UserController@login');

```
## 🧪 8. Sample Requests via Postman

```bash
POST /register
Content-Type: application/json
{
  "name": "Chinmay",
  "email": "chinmay235@example.com",
  "password": "secret123"
}
```

```bash
POST /login
Content-Type: application/json
{
  "email": "chinmay235@example.com",
  "password": "secret123"
}

```

## 🙋‍♂️ Need Help?

Feel free to reach out:

**Chinmay Kumar Sahu**  
📧 chinmay235@gmail.com  
💬 GitHub: [@chinmay235](https://github.com/chinmay235)

## License

This project is licensed under the [MIT License](LICENSE).

