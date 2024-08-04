# PHP-MySQL Marketplace

👋 **Welcome to the PHP-MySQL Marketplace!**

![Marketplace Banner](https://github.com/Iqbolshoh/php-mysql-marketplace/blob/main/images/banner.png?raw=true)

## About This Project

This is a marketplace platform built using PHP and MySQL. It provides a user-friendly interface where users can buy and sell various products. The project showcases the use of PHP for server-side scripting and MySQL for database management.

- 🌐 **Project URL:** [Marketplace](http://iqbolshoh.uz/market)
- 📫 **Contact:** iilhomjonov777@gmail.com

### Features

- **User Registration and Login:** Users can create accounts, log in, and manage their profiles.
- **Product Listings:** Users can list products for sale with details such as price, description, and images.
- **Search and Filters:** Users can search for products and filter them based on various criteria.
- **Shopping Cart:** Users can add products to their shopping cart and proceed to checkout.
- **Order Management:** Admins can manage orders, view order details, and update order statuses.

### User Roles
![Roles](https://github.com/Iqbolshoh/php-mysql-marketplace/blob/main/images/roles.png?raw=true)

1. **Admin:**
![Admin](https://github.com/Iqbolshoh/php-mysql-marketplace/blob/main/images/admin.png?raw=true)
   - Manages the entire marketplace.
   - Can view and manage all users and their products.
   - Can update or delete any listings.
   - Oversees order management and resolves any issues.
   - Can also block users.


1. **Seller:**
![Seller](https://github.com/Iqbolshoh/php-mysql-marketplace/blob/main/images/seller.png?raw=true)
   - Can list products for sale and manage their own product listings.
   - Can view and update their orders and order statuses.
   - Manages their own profile and product details.

1. **User:**
![User](https://github.com/Iqbolshoh/php-mysql-marketplace/blob/main/images/user.png?raw=true)
   - Can browse products, add them to the shopping cart, and make purchases.
   - Can create and manage their own profile.
   - Can view their own order history and track orders.

### Technologies Used

- **Server-side Scripting:**
  - ![PHP](https://img.shields.io/badge/PHP-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)

- **Database Management:**
  - ![MySQL](https://img.shields.io/badge/MySQL-%2300f2d8.svg?style=for-the-badge&logo=mysql&logoColor=white)

- **Frontend Technologies:**
  - ![HTML](https://img.shields.io/badge/HTML-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
  - ![CSS](https://img.shields.io/badge/CSS-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
  - ![Bootstrap](https://img.shields.io/badge/Bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
  - ![JavaScript](https://img.shields.io/badge/JavaScript-%23F7DF1C.svg?style=for-the-badge&logo=javascript&logoColor=black)
  - ![jQuery](https://img.shields.io/badge/jQuery-%230e76a8.svg?style=for-the-badge&logo=jquery&logoColor=white)

### Installation

To get started with the PHP-MySQL Marketplace, follow these steps:

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/Iqbolshoh/php-mysql-marketplace.git
   ```

2. **Navigate to the Project Directory:**
   ```bash
   cd php-mysql-marketplace
   ```

3. **Set Up the Database:**
   - Create a new MySQL database:
     ```sql
     CREATE DATABASE marketplace_db;
     ```

   - Import the `database.sql` file located in the `db` directory to set up the initial database structure:
     ```bash
     mysql -u yourusername -p marketplace_db < db/database.sql
     ```

4. **Configure Database Connection:**
   - Open the `config.php` file in the root directory.
   - Update the database credentials to match your MySQL setup:
     ```php
     <?php

         public function __construct() {
             $servername = "localhost";
             $username = "your_username";
             $password = "password";
             $dbname = "marketplace_db";

             $this->conn = new mysqli($servername, $username, $password, $dbname);

             if ($this->conn->connect_error) {
                 die("Connection failed: " . $this->conn->connect_error);
             }
         }
     ```
   - Note: You should add the `class Database` in the `config.php` file and call the `getConnection` method to connect to the database.

5. **Run the Application:**
   - Deploy the application on a PHP-compatible server (e.g., Apache or Nginx).
   - Access the marketplace through your web browser at `http://localhost/php-mysql-marketplace`.

### Contributing

Contributions are welcome! If you have suggestions or find issues, please create a pull request or open an issue on GitHub.

## Connect with Me

Feel free to reach out or connect through the following platforms:

[![Instagram](https://img.shields.io/badge/Instagram-%23E4405F.svg?style=for-the-badge&logo=Instagram&logoColor=white)](https://www.instagram.com/iqbolshoh_777)
[![Thread](https://img.shields.io/badge/Thread-%2317B7B7.svg?style=for-the-badge&logo=thread&logoColor=white)](https://www.threads.net/Iqbolshoh_777)
[![Telegram](https://img.shields.io/badge/Telegram-%0088CC.svg?style=for-the-badge&logo=telegram&logoColor=white)](https://t.me/Iqbolshoh_777)
[![X](https://img.shields.io/badge/X-%23000000.svg?style=for-the-badge&logo=x&logoColor=white)](https://x.com/Iqbolshoh_777)

**Thank you for checking out the PHP-MySQL Marketplace!** 😊