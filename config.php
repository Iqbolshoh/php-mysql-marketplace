<?php

class Query
{
    private $conn;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "marketplace";

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function __destruct()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    // validate() bunda @#$%^ belgilarni html codega o'tkazadi
    function validate($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $value = mysqli_real_escape_string($this->conn, $value);
        return $value;
    }

    // executeQuery() so'rovni bajarish uchun
    public function executeQuery($sql)
    {
        $result = $this->conn->query($sql);
        if ($result === false) {
            die("Xatolik: " . $this->conn->error);
        }
        return $result;
    }

    // select(): Ma'lumotlarni ma'lumot bazasidan tanlash uchun.
    public function select($table, $columns = "*", $condition = "")
    {
        $sql = "SELECT $columns FROM $table $condition";
        return $this->executeQuery($sql)->fetch_all(MYSQLI_ASSOC);
    }

    // insert(): Ma'lumotlarni ma'lumot bazasiga qo'shish uchun.
    public function insert($table, $data)
    {
        $keys = implode(', ', array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $sql = "INSERT INTO $table ($keys) VALUES ($values)";
        return $this->executeQuery($sql);
    }

    // update(): Ma'lumotlarni ma'lumot bazasida yangilash uchun.
    public function update($table, $data, $condition = "")
    {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "$key = '$value', ";
        }
        $set = rtrim($set, ', ');
        $sql = "UPDATE $table SET $set $condition";
        return $this->executeQuery($sql);
    }

    // delete(): Ma'lumotlarni ma'lumot bazasidan o'chirish uchun.
    public function delete($table, $condition = "")
    {
        $sql = "DELETE FROM $table $condition";
        return $this->executeQuery($sql);
    }

    // Parolni heshlash
    function hashPassword($password)
    {
        $key = "AccountPassword";
        return hash_hmac('sha256', $password, $key);
    }

    // authenticate(): Foydalanuvchining kirish ma'lumotlarini tekshirish uchun.
    public function authenticate($username, $password, $table)
    {
        $username = $this->validate($username);
        $condition = "WHERE username = '" . $username . "' AND password = '" . $this->hashPassword($password) . "'";
        return $this->select($table, "*", $condition);
    }

    // registerUser(): Yangi foydalanuvchini ro'yxatdan o'tkazish uchun.
    public function registerUser($name, $number, $email, $username, $password, $profile_image, $role)
    {
        $name = $this->validate($name);
        $number = $this->validate($number);
        $email = $this->validate($email);
        $username = $this->validate($username);

        $password_hash = $this->hashPassword($password);

        $data = array(
            'name' => $name,
            'number' => $number,
            'email' => $email,
            'username' => $username,
            'password' => $password_hash,
            'profile_image' => $profile_image,
            'role' => $role
        );

        $user_id = $this->insert('accounts', $data);

        if ($user_id) {
            return $user_id;
        }
        return false;
    }

    // saveImage(): Rasm yulash uchun
    function saveImagesToDatabase($files, $path, $productId)
    {
        if (is_array($files['tmp_name'])) {
            $uploaded_files = array();
            foreach ($files['tmp_name'] as $index => $tmp_name) {
                $file_name = $files['name'][$index];
                $file_info = pathinfo($file_name);
                $file_extension = $file_info['extension'];
                $new_file_name = md5($tmp_name . date("Y-m-d_H-i-s") . $_SESSION['username'] . $productId) . "." . $file_extension;
                if (move_uploaded_file($tmp_name, $path . $new_file_name)) {
                    $uploaded_files[] = $new_file_name;
                    $this->insert('product_images', array('product_id' => $productId, 'image_url' => $new_file_name));
                }
            }
            return $uploaded_files;
        } else {
            $file_name = $files['name'];
            $file_tmp = $files['tmp_name'];

            $file_info = pathinfo($file_name);
            $file_format = $file_info['extension'];

            $new_file_name = md5($file_tmp . date("Y-m-d_H-i-s") . $_SESSION['username'] . $productId) . "." . $file_format;

            if (move_uploaded_file($file_tmp, $path . $new_file_name)) {
                $this->insert('product_images', array('product_id' => $productId, 'image_url' => $new_file_name));
                return $new_file_name;
            }
            return false;
        }
    }

    function saveImage($file, $path)
    {
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];

        $file_info = pathinfo($file_name);
        $file_format = $file_info['extension'];

        $new_file_name = md5($file_tmp . date("Y-m-d_H-i-s") . $_SESSION['username']) . "." . $file_format;

        if (move_uploaded_file($file_tmp, $path . $new_file_name)) {
            return $new_file_name;
        }
        return false;
    }

    // isBlocked(): bu block ekanligini tekshiradi
    public function isBlocked()
    {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true)
            return $this->select('accounts', 'status', 'WHERE id = "' . $_SESSION['id'] . '"')[0]['status'] === 'blocked';
        return false;
    }

    // checkAdminRole(): Faqatgina Admin kirishi uchun
    function checkAdminRole()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] !== 'admin' or !isset($_SESSION['loggedin'])) {
            header("Location: ../authentication.php");
            exit;
        }
    }

    // checkSellerRole(): Faqatgina Seller kirishi uchun
    function checkSellerRole()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] !== 'seller' or !isset($_SESSION['loggedin'])) {
            header("Location: ../authentication.php");
            exit;
        }
    }

    // checkUserRole(): Faqatgina user kirishi uchun
    function checkUserRole()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] !== 'user' or !isset($_SESSION['loggedin'])) {
            header("Location: ./authentication.php");
            exit;
        }
    }

    // getCategories(): Categoriyani tanlash uchun
    public function getCategories()
    {
        $categories = array();
        $result = $this->select('categories', 'id, category_name');
        foreach ($result as $row) {
            $categories[$row['id']] = $row['category_name'];
        }
        return $categories;
    }


    // getProduct(): mahsulotlarni qaytaradi
    public function getProduct($product_id)
    {
        $result = $this->select('products', '*', 'WHERE id = ' . $product_id);
        return $result[0];
    }

    // getProductImages(): Mahsulotning barcha rasm url-larini olish uchun
    public function getProductImageID($product_id)
    {
        $images = $this->select('product_images', 'id', 'WHERE product_id = ' . $product_id);
        $id = array();
        foreach ($images as $image) {
            $id[] = $image['id'];
        }
        return $id;
    }


    // getProductImages(): Mahsulotning barcha rasm url-larini olish uchun
    function getProductImage($id)
    {
        global $query;
        $result = $this->select('product_images', 'image_url', 'WHERE id = ' . $id);
        return $result[0]['image_url'];
    }

    public function getCartItems($user_id)
    {
        $sql = "SELECT 
        p.id,
        p.name,
        p.price_current,
        p.price_old,
        c.number_of_products,
        (p.price_current * c.number_of_products) AS total_price
    FROM 
        cart c
    JOIN
        products p ON c.product_id = p.id
    WHERE 
        c.user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $cartItems = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $cartItems;
    }

    // getProductImages(): Mahsulotning barcha rasm url-larini olish uchun
    public function getProductImages($product_id)
    {
        $sql = "SELECT image_url FROM product_images WHERE product_id = $product_id";
        $result = $this->executeQuery($sql)->fetch_all(MYSQLI_ASSOC);
        $imageUrls = array();
        foreach ($result as $row) {
            $imageUrls[] = $row['image_url'];
        }
        return $imageUrls;
    }

    public function getWishes($user_id)
    {
        $sql = "SELECT 
        p.name,
        p.price_current,
        p.price_old,
        w.product_id
    FROM 
        wishes w
    JOIN
        products p ON w.product_id = p.id
    WHERE 
        w.user_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $result = $stmt->get_result();

        $wishes = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

        return $wishes;
    }

    // Count(): element somini chiqaradi
    public function count($table)
    {
        $userId = $_SESSION['id'];
        $result = $this->executeQuery("SELECT COUNT(*) AS total_elements FROM $table WHERE user_id = $userId");
        $row = $result->fetch_assoc();
        return $row['total_elements'];
    }

    // lastInsertId(): Ma'lumotlarni ma'lumot bazasiga qo'shish uchun.
    public function lastInsertId($table, $data)
    {
        $keys = implode(', ', array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $sql = "INSERT INTO $table ($keys) VALUES ($values)";
        $insert_result = $this->executeQuery($sql);

        if ($insert_result) {
            return $this->conn->insert_id;
        } else {
            return false;
        }
    }
}
