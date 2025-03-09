# PHP MySQL Marketplace

This is a marketplace platform built using PHP and MySQL. It provides a user-friendly interface where users can buy and sell various products. The project showcases the use of PHP for server-side scripting and MySQL for database management.

![Marketplace Banner](./src/images/banner.png?raw=true)

### Features

- **User Registration and Login:** Users can create accounts, log in, and manage their profiles.
- **Product Listings:** Users can list products for sale with details such as price, description, and images.
- **Search and Filters:** Users can search for products and filter them based on various criteria.
- **Shopping Cart:** Users can add products to their shopping cart and proceed to checkout.
- **Order Management:** Admins can manage orders, view order details, and update order statuses.

### Login Page

![Roles](./src/images/roles.png?raw=true)
- **🖥 Admin Login:** `iqbolshoh`  
- **👤 Seller Login:** `user`  
- **👤 User Login:** `user`  
- **🔑 Password:** `IQBOLSHOH`  

## User Roles

### Admin
![Admin](./src/images/admin.png?raw=true)
   - Manages the entire marketplace.
   - Can view and manage all users and their products.
   - Can update or delete any listings.
   - Oversees order management and resolves any issues.
   - Can also block users.


### Seller
![Seller](./src/images/seller.png?raw=true)
   - Can list products for sale and manage their own product listings.
   - Can view and update their orders and order statuses.
   - Manages their own profile and product details.

### User
![User](./src/images/user.png?raw=true)
   - Can browse products, add them to the shopping cart, and make purchases.
   - Can create and manage their own profile.
   - Can view their own order history and track orders.

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


---

## 🖥 Technologies Used
<div style="display: flex; flex-wrap: wrap; gap: 5px;">
    <img src="https://img.shields.io/badge/HTML-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white" alt="HTML">
    <img src="https://img.shields.io/badge/CSS-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white" alt="CSS">
    <img src="https://img.shields.io/badge/Bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
    <img src="https://img.shields.io/badge/JavaScript-%23F7DF1C.svg?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
    <img src="https://img.shields.io/badge/jQuery-%230e76a8.svg?style=for-the-badge&logo=jquery&logoColor=white" alt="jQuery">
    <img src="https://img.shields.io/badge/PHP-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
    <img src="https://img.shields.io/badge/MySQL-%234479A1.svg?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
</div>


---

## 🤝 Contributing  

🎯 Contributions are welcome! If you have suggestions or want to enhance the project, feel free to fork the repository and submit a pull request.

## 📬 Connect with Me  

💬 I love meeting new people and discussing tech, business, and creative ideas. Let’s connect! You can reach me on these platforms:

<div align="center">
    <table>
        <tr>
            <td>
                <a href="https://github.com/iqbolshoh">
                    <img src="https://raw.githubusercontent.com/rahuldkjain/github-profile-readme-generator/master/src/images/icons/Social/github.svg"
                        height="40" width="40" alt="GitHub" />
                </a>
            </td>
            <td>
                <a href="https://t.me/iqbolshoh_777">
                    <img src="https://github.com/gayanvoice/github-active-users-monitor/blob/master/public/images/icons/telegram.svg"
                        height="40" width="40" alt="Telegram" />
                </a>
            </td>
            <td>
                <a href="https://www.linkedin.com/in/iiqbolshoh/">
                    <img src="https://github.com/gayanvoice/github-active-users-monitor/blob/master/public/images/icons/linkedin.svg"
                        height="40" width="40" alt="LinkedIn" />
                </a>
            </td>
            <td>
                <a href="https://instagram.com/iqbolshoh_777" target="blank">
                    <img src="https://raw.githubusercontent.com/rahuldkjain/github-profile-readme-generator/master/src/images/icons/Social/instagram.svg"
                        alt="Instagram" height="40" width="40" />
                </a>
            </td>
            <td>
                <a href="https://wa.me/qr/22PVFQSMQQX4F1">
                    <img src="https://github.com/gayanvoice/github-active-users-monitor/blob/master/public/images/icons/whatsapp.svg"
                        height="40" width="40" alt="WhatsApp" />
                </a>
            </td>
            <td>
                <a href="https://x.com/iqbolshoh_777">
                    <img src="https://img.shields.io/badge/X-000000?style=for-the-badge&logo=x&logoColor=white" height="40"
                        width="40" alt="Twitter" />
                </a>
            </td>
            <td>
                <a href="mailto:iilhomjonov777@gmail.com">
                    <img src="https://github.com/gayanvoice/github-active-users-monitor/blob/master/public/images/icons/gmail.svg"
                        height="40" width="40" alt="Email" />
                </a>
            </td>
        </tr>
    </table>
</div>
