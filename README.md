# DigitalMarket

Учебный проект команды №67: Борисов Анатолий Сергеевич, Ерофеев Андрей Николаевич, Ленгард Артем Александрович.

## Технологии

Чистый PHP 8.2+, MySQL 8, HTML5, CSS3 (БЭМ), JavaScript. Без фреймворков.

## Запуск в OpenServer

1. Скопируйте проект в папку домена OpenServer (путь зависит от версии, например `home/digitalmarket.local`).
2. Запустите веб-сервер и MySQL.
3. Через phpMyAdmin импортируйте `database/schema.sql` (он создаст базу `digitalmarket` и 3 демонстрационных товара).
4. Проверьте логин/пароль MySQL в `config/database.php`. При необходимости скопируйте `config/database.example.php` в `config/database.local.php` и измените значения там.
5. Откройте локальный домен в браузере.

**Альтернатива для VS Code с установленными PHP и MySQL:**

```bash
php -S localhost:8000
```

Затем откройте `http://localhost:8000`. Встроенный сервер PHP предназначен только для разработки.

Если MySQL ещё не настроен, главная страница откроется с предупреждением, а не с ошибкой PHP.

## БЭМ

- `header` — блок шапки; `header__logo` — элемент.
- `nav__link--active` — модификатор активной ссылки.
- `product-card` — блок карточки; `product-card__title` — элемент.
- `button--primary` — модификатор кнопки.

## Git

Для первой загрузки существующего репозитория с README сначала клонируйте его, затем скопируйте файлы проекта в клон. Не публикуйте пароли от БД.

```bash
git clone https://github.com/neadapex-coder/DigitalMarket.git
cd DigitalMarket
git status
git add .
git commit -m "Initial commit: BEM homepage and PHP MySQL connection"
git push origin HEAD
```

`git push origin HEAD` отправит коммит в текущую ветку (`main` или `master`). Если обязательно нужна `master`, сначала согласуйте смену ветки с командой и настройте её как основную в GitHub.

## Текущий функционал

- Рабочая главная страница с адаптивной БЭМ-вёрсткой.
- Чтение товаров из MySQL через PDO.
- Демонстрационные товары из SQL.
- Кнопка покупки пока отключена — корзина и оформление заказов будут реализованы позже.
