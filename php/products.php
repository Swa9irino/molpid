<?php
// Подключение к базе данных
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "products_db";

// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверяем соединение
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Выбираем все товары из таблицы products
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

// Если есть результаты, то выводим их на страницу
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"] . " - Name: " . $row["name"] . " - Price: руб" . $row["price"] . "<br>";
    }
} else {
    echo "0 results";
}

// Закрываем соединение
mysqli_close($conn);
?>