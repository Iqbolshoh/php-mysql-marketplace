DROP DATABASE IF EXISTS Market;

CREATE DATABASE Market;

USE Market;

CREATE TABLE IF NOT EXISTS accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    number VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'user',
    profile_image VARCHAR(255) DEFAULT 'no_image.png',
    status ENUM('active', 'blocked') NOT NULL DEFAULT 'active',
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
 

CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255) NOT NULL UNIQUE
);
 

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30),
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    seller_id INT,
    FOREIGN KEY (seller_id) REFERENCES accounts(id),
    price_old INT,
    price_current INT,
    description VARCHAR(2000),
    rating DECIMAL(2, 1) CHECK (rating >= 1 AND rating <= 5),
    quantity INT,
    added_to_site TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

 
CREATE TABLE IF NOT EXISTS product_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    FOREIGN KEY (product_id) REFERENCES products(id),
    image_url VARCHAR(255)
);
 

CREATE TABLE IF NOT EXISTS cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES accounts(id),
    product_id INT,
    FOREIGN KEY (product_id) REFERENCES products(id),
    number_of_products VARCHAR(3) NOT NULL
);

CREATE TABLE IF NOT EXISTS wishes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES accounts(id),
    product_id INT,
    FOREIGN KEY (product_id) REFERENCES products(id)
);


-- accounts jadvaliga ma'lumot qo'shish
INSERT INTO accounts (name, number, email, username, password, role, status) VALUES
('Iqbolshoh', '997799333', 'Iqbolshoh@gmail.com', 'Iqbolshoh', '69b241e1e59cc71c1fe80720c0254c48e4397c4f3ac56c61f03879f13e29c765', 'admin', 'active'),
('seller', '997733999', 'seller@gmail.com', 'seller', '69b241e1e59cc71c1fe80720c0254c48e4397c4f3ac56c61f03879f13e29c765', 'seller', 'active'),
('user', '993399777', 'user@gmail.com', 'user', '69b241e1e59cc71c1fe80720c0254c48e4397c4f3ac56c61f03879f13e29c765', 'user', 'active'),
('userAKA', '993399177', 'userAKA@gmail.com', 'userAKA', '69b241e1e59cc71c1fe80720c0254c48e4397c4f3ac56c61f03879f13e29c765', 'user', 'blocked');


-- categories jadvaliga ma'lumot qo'shish
INSERT INTO categories (category_name)
VALUES 
('Electronics'),
('Clothing'),
('Books');


-- products jadvaliga ma'lumot qo'shish
INSERT INTO products (name, category_id, seller_id, price_old, price_current, description, rating, quantity)
VALUES 
('Laptop', 1, 1, 1500, 1200, 'High-performance laptop', 4.5, 10),
('T-shirt', 2, 2, 25, 20, 'Comfortable cotton T-shirt', 4.2, 50),
('Java Programming Book', 3, 3, 40, 30, 'Comprehensive guide to Java programming', 4.8, 20);


-- product_images jadvaliga ma'lumot qo'shish
INSERT INTO product_images (product_id, image_url)
VALUES 
(7, '1.jpg'),
(7, '2.jpg'),
(7, '3.jpg'),
(7, '4.jpg'),
(7, '5.jpg'),
(7, '6.jpg'),
(7, '7.jpg');

INSERT INTO product_images (product_id, image_url)
VALUES 
(2, 'tshirt_image1.jpg'),
(2, 'tshirt_image2.jpg'),
(2, 'tshirt_image3.jpg'),
(2, 'tshirt_image4.jpg'),
(2, 'tshirt_image5.jpg'),
(2, 'tshirt_image6.jpg'),
(2, 'tshirt_image7.jpg');

INSERT INTO product_images (product_id, image_url)
VALUES 
(3, 'book_image1.jpg'),
(3, 'book_image2.jpg'),
(3, 'book_image3.jpg'),
(3, 'book_image4.jpg'),
(3, 'book_image5.jpg'),
(3, 'book_image6.jpg'),
(3, 'book_image7.jpg');


-- cart jadvaliga ma'lumot qo'shish
INSERT INTO cart (user_id, product_id, number_of_products)
VALUES 
(1, 1, 5),
(2, 2, 1),
(3, 3, 7);

INSERT INTO wishes (user_id, product_id)
VALUES 
(1, 1),
(2, 2);


USE Market;