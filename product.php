<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,300;0,400;0,500;1,200;1,300;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="app" id="app" >

    <section>

    <div class="header container">
            <div class="header__container">
                <div class="header__logo" >
                    <a href="index.php">
                    <span class="header__log_title">CHEAPFINDER</span>
                    <div class="header__logo-container">
                        <img src="assets/logo.png" alt="">
                    </div>
                    </a>
                </div>
                <div class="header__items">
                    <div class="search__items">
                        <input type="search" placeholder="Поиск товаров" v-model="query" @click="showList">
                        <ul v-if="inputVisible===true">
                            <li @click="hideList" v-for="(product, id) in filteredProducts" :key="id"><a href="#"
                                                                                                         @click="showProduct(id);currentPage='detail';">{{product.name}}</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="line">
                <hr>
            </div>

        </div>
    </section>

    <?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'products_db';
    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    $id = $_GET['id'];
    $sql = 'SELECT name, price,img FROM phone WHERE id = ' . $id;
    $sql2 = 'SELECT name, price,img FROM cpu WHERE id = ' . $id;
    $sql3 = 'SELECT name, price,img FROM powerbank WHERE id = ' . $id;
    $sql4 = 'SELECT name, price,img FROM gpu WHERE id = ' . $id;
    $sql5 = 'SELECT name, price,img FROM phonecase WHERE id = ' . $id;
    $sql6 = 'SELECT name, price,img FROM bike WHERE id = ' . $id;
    $popular = 'SELECT id, name, price,img FROM popular WHERE id = ' . $id;



    $result = mysqli_query($conn,$sql);
    $result2 = mysqli_query($conn,$sql2);
    $result3 = mysqli_query($conn,$sql3);
    $result4 = mysqli_query($conn,$sql4);
    $result5 = mysqli_query($conn,$sql5);
    $result6 = mysqli_query($conn,$sql6);
    $populars = mysqli_query($conn, $popular);


    if (mysqli_num_rows($result) > 0) {
        $row1 = mysqli_fetch_assoc($result);
        // Вывод информации о товаре
        echo '<div class="detail__page"><img src="' . $row1["img"] . '"><div class="detail_text">name: ' . $row1["name"] . '.<br>' . 'Price: ' . $row1["price"] . ' руб</div></div><br>';
    }

    if (mysqli_num_rows($result2) > 0) {
        $row2 = mysqli_fetch_assoc($result2);
        // Вывод информации о товаре
        echo '<div class="detail__page"><img src="' . $row2["img"] . '"><div class="detail_text">name: ' . $row2["name"] . '.<br>' . 'Price: ' . $row2["price"] . ' руб</div></div><br>';    }

    if (mysqli_num_rows($result3) > 0) {
        $row3 = mysqli_fetch_assoc($result3);
        // Вывод информации о товаре
        echo '<div class="detail__page"><img src="' . $row3["img"] . '"><div class="detail_text">name: ' . $row3["name"] . '.<br>' . 'Price: ' . $row3["price"] . ' руб</div></div><br>';    }

    if (mysqli_num_rows($result4) > 0) {
        $row4 = mysqli_fetch_assoc($result4);
        // Вывод информации о товаре
        echo '<div class="detail__page"><img src="' . $row4["img"] . '"><div class="detail_text">name: ' . $row4["name"] . '.<br>' . 'Price: ' . $row4["price"] . ' руб</div></div><br>';    }
    if (mysqli_num_rows($result5) > 0) {
        $row5 = mysqli_fetch_assoc($result5);
        // Вывод информации о товаре
        echo '<div class="detail__page"><img src="' . $row5["img"] . '"><div class="detail_text">name: ' . $row5["name"] . '.<br>' . 'Price: ' . $row5["price"] . ' руб</div></div><br>';   }
    if (mysqli_num_rows($result6) > 0) {
        $row6 = mysqli_fetch_assoc($result6);
        // Вывод информации о товаре
        echo '<div class="detail__page"><img src="' . $row6["img"] . '"><div class="detail_text">name: ' . $row6["name"] . '.<br>' . 'Price: ' . $row6["price"] . ' руб</div></div><br>';   }

    if (mysqli_num_rows($populars) > 0) {
        $famous = mysqli_fetch_assoc($populars);
        // Вывод информации о товаре
        echo '<div class="detail__page"><img src="' . $famous["img"] . '"><div class="detail_text">name: ' . $famous["name"] . '.<br>' . 'Price: ' . $famous["price"] .' руб</div></div><br>';   }


    // Закрытие соединения с базой данных
    mysqli_close($conn);
    ?>
    <section>
        <footer class="footer container" style="margin: 0 auto">
            <hr style="width: 100%;height: 2px;margin-bottom: 50px;opacity: .5;">
            <div class="about__container">
                <div class="about">
                    <h2>О проекте</h2>
                    <a href="https://www.donationalerts.com/r/cheapfinder" target="_blank"><h3>Помощь проекту</h3></a>
                    <a href="#" @click.prevent="currentPage='conf'"><h3>Конфиденциальность</h3></a>
                </div>

                <div class="market">
                    <h2>Локальные магазины</h2>
                    <a href="#" @click="currentPage='map'"><h3>Карта</h3></a>
                </div>
                <div class="where">
                    <h2>Где нас найти</h2>
                    <div class="where__img">

                        <a href="https://vk.com/public220675923" target="_blank"><img src="assets/VK.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="cheapfiner">
                <div class="cheapfiner__title"><p>© CHEAPFINDER 2023-2023</p></div>
            </div>
        </footer>
    </section>
</div>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="js/app.js"></script>



</body>
</html>



