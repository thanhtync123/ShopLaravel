CREATE DATABASE IF NOT EXISTS shop_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE shop_db;

-- =========================
-- Bảng danh mục
-- =========================
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- =========================
-- Bảng sản phẩm
-- =========================
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(12,2) NOT NULL,
    quantity INT DEFAULT 0,
    description TEXT,
    image VARCHAR(255),
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,

    CONSTRAINT fk_product_category
    FOREIGN KEY (category_id)
    REFERENCES categories(id)
    ON DELETE CASCADE
);

-- =========================
-- Dữ liệu mẫu Categories
-- =========================
INSERT INTO categories (name) VALUES
('Điện thoại'),
('Laptop'),
('Phụ kiện');

-- =========================
-- Dữ liệu mẫu Products
-- =========================
INSERT INTO products
(category_id, name, price, quantity, description, image)
VALUES
(1, 'iPhone 15', 20990000, 10, 'Điện thoại Apple iPhone 15', 'iphone15.jpg'),

(1, 'Samsung Galaxy S25', 18990000, 15, 'Điện thoại Samsung Galaxy S25', 's25.jpg'),

(2, 'MacBook Air M4', 27990000, 5, 'Laptop Apple MacBook Air M4', 'macbook_air_m4.jpg'),

(2, 'Dell XPS 15', 32990000, 3, 'Laptop Dell XPS 15', 'dell_xps15.jpg'),

(3, 'Chuột Logitech G102', 399000, 50, 'Chuột gaming Logitech G102', 'g102.jpg'),

(3, 'Bàn phím AKKO 3068', 1299000, 20, 'Bàn phím cơ AKKO 3068', 'akko3068.jpg');

ALTER TABLE categories
ADD UNIQUE (name);