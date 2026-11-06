CREATE DATABASE IF NOT EXISTS digitalmarket CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE digitalmarket;
CREATE TABLE IF NOT EXISTS products (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  description TEXT NOT NULL,
  category VARCHAR(100) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO products (name, description, category, price) VALUES
('Графический редактор', 'Учебный цифровой продукт: программа для работы с изображениями.', 'Программы', 490.00),
('Набор иконок', 'Комплект графических элементов для интерфейсов.', 'Дизайн', 199.00),
('Шаблон сайта', 'Готовая основа для учебного веб-проекта.', 'Шаблоны', 350.00);
