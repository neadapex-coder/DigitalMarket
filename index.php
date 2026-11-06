<?php
declare(strict_types=1);
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$products = [];
$dbError = false;
try {
    $pdo = database();
    $stmt = $pdo->query('SELECT id, name, description, price, category FROM products WHERE is_active = 1 ORDER BY id DESC LIMIT 12');
    $products = $stmt->fetchAll();
} catch (PDOException $exception) {
    // Homepage stays available while MySQL is being configured.
    $dbError = true;
    error_log('DigitalMarket database error: ' . $exception->getMessage());
}
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="DigitalMarket — учебный магазин цифровых товаров">
  <title>DigitalMarket — главная</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script defer src="assets/js/main.js"></script>
</head>
<body class="page">
  <header class="header">
    <div class="container header__inner">
      <a class="header__logo" href="index.php">DigitalMarket</a>
      <nav class="nav" aria-label="Главное меню">
        <a class="nav__link nav__link--active" href="index.php">Главная</a>
        <a class="nav__link" href="#catalog">Каталог</a>
        <a class="nav__link" href="#about">О проекте</a>
      </nav>
    </div>
  </header>
  <main class="container">
    <section class="hero">
      <h1 class="hero__title">Магазин цифровых товаров</h1>
      <p class="hero__description">Программы, цифровые ключи и другие товары в одном каталоге.</p>
      <a class="button button--primary" href="#catalog">Смотреть товары</a>
    </section>
    <section class="catalog" id="catalog" aria-labelledby="catalog-title">
      <div class="catalog__heading">
        <h2 class="catalog__title" id="catalog-title">Каталог товаров</h2>
        <span class="catalog__count">Найдено: <?= count($products) ?></span>
      </div>
      <?php if ($dbError): ?>
        <p class="notice notice--warning" role="status">Нет соединения с MySQL. Проверьте настройки в config/database.php, запустите MySQL и импортируйте database/schema.sql.</p>
      <?php elseif (!$products): ?>
        <p class="notice" role="status">Товаров пока нет. Добавьте их в базу данных.</p>
      <?php else: ?>
        <div class="catalog__grid">
          <?php foreach ($products as $product): ?>
            <article class="product-card">
              <div class="product-card__image" aria-hidden="true">DM</div>
              <div class="product-card__body">
                <span class="product-card__category"><?= e((string) $product['category']) ?></span>
                <h3 class="product-card__title"><?= e((string) $product['name']) ?></h3>
                <p class="product-card__description"><?= e((string) $product['description']) ?></p>
                <div class="product-card__footer">
                  <strong class="product-card__price"><?= formatPrice((float) $product['price']) ?></strong>
                  <button class="button button--disabled" type="button" disabled title="Корзина появится в следующей версии">Скоро</button>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </section>
    <section class="about" id="about">
      <h2 class="about__title">О проекте</h2>
      <p class="about__text">DigitalMarket — учебный командный проект №67 по серверному программированию. Версия 0.1: главная страница, БЭМ-стили и подключение MySQL на чистом PHP.</p>
    </section>
  </main>
  <footer class="footer"><div class="container footer__inner">© <?= date('Y') ?> DigitalMarket · Команда №67</div></footer>
</body>
</html>
