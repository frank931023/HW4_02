## 環境安裝
我這邊是安裝laravel herd(內涵composer)
```bash
# clone GitHub 專案
git clone https://github.com/frank931023/HW4_02.git
cd HW4_02
# 安裝 Laravel 所需套件（用 Composer）
composer install
# 複製 .env.example 並建立 .env
cp .env.example .env
# 生成 Laravel 專案金鑰
php artisan key:generate
# 執行資料庫 migration（建表）
php artisan migrate

# 開啟專案(我是用 herd open)
herd open
# 如果沒有herd或著可以用以下試試，這laravel內建的，但我還在看看為什麼我用這個不行 >> 使用以下這指令需要將使用php版本中的php.ini的variables_order = "EGPCS" 改為 variables_order = "GPCS"
php artisan serve
```

## SQLite
1.安裝查看table的程式 [TablePlus](https://tableplus.com/)
- 開啟TablePlus
- 新增資料庫連結(介面空白區按右鍵，選擇"new"，再選擇"connection")
![新增資料庫連結(介面空白區按右鍵，選擇"new"，再選擇"connection")](./README-Image/TablePlus01.png)
- 選擇SQLite後按"create"
![選擇SQLite後按"create"](./README-Image/TablePlus02.png)
- 填寫name
- 選擇專案下HW4_02/database/database.sqlite作為資料庫路徑(選擇後會顯示絕對路徑)
![選擇專案下HW4_02/database/database.sqlite作為資料庫路徑](./README-Image/TablePlus03.png)
- 完成後按下"save"或"connect"皆可!

2.新增Table
```bash
# 如果沒有新增過資料
php artisan migrate
# 如果有新增過資料
php artisan migrate:fresh
```
3.新增假資料
```bash
# 進入交互式環境REPL
php artisan tinker
# 生成假資料
# Member 使用者會員
App\Models\Member::factory(10)->create()
# Page 討論版
App\Models\Page::factory(10)->create()
# Post 討論區
App\Models\Post::factory(10)->create()
# Comment 留言
App\Models\Comment::factory(10)->create()
```
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
