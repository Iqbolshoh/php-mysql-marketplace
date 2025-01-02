<?php
include 'check.php';

$user_id = $_SESSION['id'];

$user = $query->executeQuery("SELECT * FROM accounts WHERE id = $user_id")->fetch_assoc();
$cart = $query->executeQuery("SELECT * FROM cart WHERE user_id = $user_id");

$price_old_Sum = 0;
$price_current_Sum = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 90%;
            overflow-x: auto;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
            font-size: 2.5em;
            font-weight: bold;
        }

        h3 {
            color: #333;
            font-size: 1.5em;
            margin-bottom: 15px;
            text-decoration: underline;
        }

        .user-information,
        .cart-summary {
            margin-bottom: 40px;
        }

        .user-information ul {
            list-style-type: none;
            padding: 0;
            font-size: 1.1em;
            color: #555;
        }

        .user-information li {
            margin-bottom: 12px;
        }

        .user-information li strong {
            color: #7fad39;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th,
        td {
            padding: 15px 20px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 1.1em;
        }

        th {
            background-color: #f1f1f1;
            color: #7fad39;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e0f7fa;
            transition: background-color 0.3s ease;
        }

        .total {
            font-size: 1.4em;
            font-weight: bold;
            color: #333;
            margin-top: 25px;
            text-align: right;
        }

        .total p {
            margin: 15px 0;
        }

        .total span {
            color: rgb(255, 51, 0);
        }

        .price del {
            color: rgb(255, 0, 0);
            font-size: 14px;
        }

        .price {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .price span {
            color: #7fad39;
            font-weight: bold;
        }

        .cart-summary {
            border-top: 2px solid #f1f1f1;
            padding-top: 20px;
        }

        del {
            font-weight: bold;
        }


        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 20px;
            }

            h2 {
                font-size: 2em;
            }

            h3 {
                font-size: 1.2em;
            }

            table th,
            table td {
                font-size: 1em;
                padding: 10px;
            }

            .total p {
                font-size: 1.2em;
            }

            .user-information ul {
                font-size: 1em;
            }

            .price span {
                font-size: 1em;
            }

            .price del {
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {

            .container {
                width: 100%;
                padding: 10px;
            }

            h2 {
                font-size: 1.8em;
            }

            h3 {
                font-size: 1.1em;
            }

            .user-information ul {
                font-size: 0.9em;
            }

            table th,
            table td {
                font-size: 0.9em;
                padding: 8px;
            }

            .price span {
                font-size: 0.9em;
            }

            .total p {
                font-size: 1em;
            }

            .cart-summary {
                padding-top: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Checkout Summary</h2>

        <div class="user-information">
            <h3>User Information</h3>
            <ul>
                <li><strong>Name:</strong> <?= htmlspecialchars($user['name']); ?></li>
                <li><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></li>
                <li><strong>Phone Number:</strong> <?= htmlspecialchars($user['number']); ?></li>
            </ul>
        </div>

        <div class="cart-summary">
            <h3>Cart Items</h3>
            <table>
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($cart as $index => $item) {
                        $product_id = $item["product_id"];
                        $product = $query->executeQuery("SELECT * FROM products WHERE id = $product_id")->fetch_assoc();
                        $price_old = $product['price_old'];
                        $price_current = $product['price_current'];

                        $price_old_Sum += $price_old * $item['number_of_products'];
                        $price_current_Sum += $price_current * $item['number_of_products'];
                    ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($product['name']); ?></td>

                            <td>
                                <div class="price">
                                    <del>$<?= number_format($price_old, 2); ?></del>
                                    <span>$<?= number_format($price_current, 2); ?></span>
                                </div>
                            </td>

                            <td><?= $item['number_of_products']; ?></td>

                            <td>
                                <div class="price">
                                    <del>$<?= number_format($price_old * $item['number_of_products'], 2); ?></del>
                                    <span>$<?= number_format($price_current * $item['number_of_products'], 2); ?></span>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="total">
            <p>Total (Old Price): <span><del>$<?= number_format($price_old_Sum, 2); ?></del></span></p>
            <p>Total (Current Price): <span style="color: #7fad39">$<?= number_format($price_current_Sum, 2); ?></span>
            </p>
        </div>
    </div>

</body>

</html>