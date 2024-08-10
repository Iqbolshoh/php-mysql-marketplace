# PHP-MySQL Marketplace

This is a marketplace platform built using PHP and MySQL. It provides a user-friendly interface where users can buy and sell various products. The project showcases the use of PHP for server-side scripting and MySQL for database management.

![Marketplace Banner](https://github.com/Iqbolshoh/php-mysql-marketplace/blob/main/images/banner.png?raw=true)

## About This Project

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
  - ![MySQL](https://img.shields.io/badge/MySQL-%234479A1.svg?style=for-the-badge&logo=mysql&logoColor=white)

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

## Contributing

Contributions are welcome! If you have suggestions or want to enhance the project, feel free to fork the repository and submit a pull request.


## Connect with Me

I love connecting with new people and exploring new opportunities. Feel free to reach out to me through any of the
platforms below:

<table>
    <tr>
        <td>
            <a href="https://t.me/iqbolshoh_777">
                <img src="https://github.com/gayanvoice/github-active-users-monitor/blob/master/public/images/icons/telegram.svg"
                    height="48" width="48" alt="Telegram" />
            </a>
        </td>
        <td>
            <a href="https://instagram.com/iqbolshoh_777" target="blank"><img align="center"
                    src="https://raw.githubusercontent.com/rahuldkjain/github-profile-readme-generator/master/src/images/icons/Social/instagram.svg"
                    alt="instagram" height="48" width="48" /></a>
        </td>
        <td>
            <a href="https://wa.me/qr/22PVFQSMQQX4F1">
                <img src="https://github.com/gayanvoice/github-active-users-monitor/blob/master/public/images/icons/whatsapp.svg"
                    height="48" width="48" alt="WhatsApp" />
            </a>
        </td>
        <td>
            <a href="https://x.com/iqbolshoh_777">
                <img src="https://img.shields.io/badge/X-000000?style=for-the-badge&logo=x&logoColor=white" height="48"
                    width="48" alt="Twitter" />
            </a>
        </td>
        <td>
            <a href="https://www.linkedin.com/in/iqbolshoh/">
                <img src="https://github.com/gayanvoice/github-active-users-monitor/blob/master/public/images/icons/linkedin.svg"
                    height="48" width="48" alt="LinkedIn" />
            </a>
        </td>
        <td>
            <a href="mailto:iilhomjonov777@gmail.com">
                <img src="https://github.com/gayanvoice/github-active-users-monitor/blob/master/public/images/icons/gmail.svg"
                    height="48" width="48" alt="Email" />
            </a>
        </td>
    </tr>
</table>
