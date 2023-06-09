<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'products_db';
$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

$sql1 = 'SELECT id, name, price,img FROM phone';
$result1 = mysqli_query($conn, $sql1);

$sql2 = 'SELECT id, name, price,img FROM cpu';
$result2 = mysqli_query($conn, $sql2);

$sql3 = 'SELECT id, name, price,img FROM powerbank';
$result3 = mysqli_query($conn, $sql3);

$sql4 = 'SELECT id, name, price,img FROM gpu';
$result4 = mysqli_query($conn, $sql4);

$sql5 = 'SELECT id, name, price,img FROM phonecase';
$result5 = mysqli_query($conn, $sql5);

$sql6 = 'SELECT id, name, price,img FROM bike';
$result6 = mysqli_query($conn, $sql6);

$popular = 'SELECT id, name, price,img FROM popular';
$populars = mysqli_query($conn, $popular);



// Закрытие соединения с базой данных
mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>CheapFinder</title>
    <link rel="stylesheet" href="css/style.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,300;0,400;0,500;1,200;1,300;1,400&display=swap"
        rel="stylesheet">

</head>
<body>
<div class="app" id="app">


    <!-------------------------------------------------------БУРГЕР------------------------------------------------------------------------------->
    <div class="burger">
        <button class="burger-btn" @click="showMenu = !showMenu">
            <span class="burger-icon" :class="{ 'open': showMenu }"></span>
        </button>
        <nav class="menu" :class="{ 'open': showMenu }">
            <ul>
                <li v-on:mouseover="() => { hideElements(); hideElementss(); }"><a href="#" @mouseover="showElement">Гаджеты</a>
                </li>
                <li v-on:mouseover="() => { hideElement(); hideElementss(); }"><a href="#" @mouseover="showElements">Компьютеры</a>
                </li>
                <li v-on:mouseover="() => { hideElement(); hideElements(); }"><a href="#" @mouseover="showElementss">Спорт</a>
                </li>
            </ul>
        </nav>
    </div>
    <!---------------------------------------------------------ХЭДЭР------------------------------------------------------------------------>
    <section>
        <div class="header container">
            <div class="header__container">
                <div class="header__logo" @click.prevent="currentPage='home'">
                    <span class="header__log_title">CHEAPFINDER</span>
                    <div class="header__logo-container">
                        <img src="assets/logo.png" alt="">
                    </div>
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
            <div class="under__header">
                <div class="assortment">
                    <ul class="assortment__list">
                        <li v-on:mouseover="() => { hideElements(); hideElementss(); }"><a @mouseover="showElement"
                                                                                           class="hover__title"
                                                                                           href="#">Гаджеты</a></li>
                        <li v-on:mouseover="() => { hideElement(); hideElementss(); }"><a @mouseover="showElements"
                                                                                          class="hover__title" href="#">Компьютеры</a>
                        </li>
                        <li v-on:mouseover="() => { hideElement(); hideElements(); }"><a @mouseover="showElementss"
                                                                                         class="hover__title" href="#">Спорт</a>
                        </li>


                    </ul>
                </div>
            </div>
            <div class="line">
                <hr>
            </div>
            <div class="hover__items" @mouseleave="hideElement">
                <transition></transition>
                <div class="links" v-if="isVisible===true">
                    <div v-for="link in links.slice(0,3)" :key="link.id" @click="handlers[link.id]">
                        <a href="#"><img :src="'assets/' + link.img" alt="" class=""></a>
                        <a href="#"><h3>{{ link.name }}</h3></a>
                    </div>
                </div>
                <div class="links" v-if="isVisiblee===true" @mouseleave="hideElements">
                    <div v-for="link in links.slice(3,5)" :key="link.id" @click="handlers[link.id]">
                        <a href="#"><img :src="'assets/' + link.img" alt=""></a>
                        <a href="#"><h3>{{ link.name }}</h3></a>
                    </div>
                </div>
                <div class="links" v-if="isVisibleee===true" @mouseleave="hideElementss">
                    <div v-for="link in links.slice(5,6)" :key="link.id" @click="handlers[link.id]">
                        <a href="#"><img :src="'assets/' + link.img" alt=""></a>
                        <a href="#"><h3>{{ link.name }}</h3></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------------------------------------------------------------------------------------------------------------------------->
    <section>


        <div class="slider container" v-if="currentPage==='home'">
            <transition name="fade" mode="out-in">
                <a href="#" @click="showProduct(index);"><img :src="currentImage" :key="currentImage" class="image"
                                                              style="cursor: pointer;z-index: 10"></a>

            </transition>
            <div class="title__container">

                <p v-if="currentImageIndex===0" class="title__container-first"><span> MSI GeForce GTX 1660 SUPER <br> Gaming X 6gb <br>Тип памяти GDDR6 <br> Разрядность  памяти 192 бит</span>
                </p>
                <p v-if="currentImageIndex===1" class="title__container-second"><span style="position: relative"><img
                            src="assets/applelogo.png" style="width: 18px;position: absolute;left: -13px;top: -1px;"> iPhone 14 Теперь Розовый <br> Встроенная память 8/126 <br> ГБЗаряд батареи 3095 мА·ч <br>Основная камера (Мп)12 + 12</span>
                </p>
                <p v-if="currentImageIndex===2" class="title__container-third"><span>Горный велосипед Trinx <br> M116 Рама:Alum 6061 <br>Special-shaped <br>Цепь:KMC 7S</span>
                </p>
            </div>

            <div class="buttons" style="z-index: 1">
                <button class="button-left" @click="previousImage">&#10094;</button>
                <button class="button-right" @click="nextImage">&#10095;</button>
            </div>
            <div class="pagination">
                        <span v-for="(slide, index) in images" :key="index" @click="goToSlide(index)"
                              :class="{ active: currentImageIndex === index }">
                            <p>{{ index + 1 }}</p>
                         </span>
            </div>
        </div>


    </section>
    <!---------------------------------------------------------------------------------------------------------------------------------------------->

    <section v-if="currentPage==='home'" class="popular__section container">
        <div class="popular__title">
            <h2>Популярные модели</h2>
        </div>
        <div class="popular__container">
            <div class="popular__items">
                <div class="popular__img">
                    <?php
                    if (mysqli_num_rows($populars) > 0) {
                        // Вывод списка товаров
                        while ($famous = mysqli_fetch_assoc($populars)) {
                            echo '<div><a href="product.php?id=' . $famous['id'] . '"><img src="' . $famous['img'] . '"><p>' . $famous['name'] .'<br>'. ' Price: ' . $famous["price"] . '</p></a></div><br>';
                        }
                    } else {
                        echo 'No products found';
                    }
                    ?>

                </div>
                <div class="popular__name">

                </div>
            </div>

        </div>
    </section>
    <!---------------------------------------------------------------------------------------------------------------------------------------------->
    <section v-if="currentPage==='conf'">
        <div class="conf">
            <p>
                1. Обрабатываемые данные <br>
                1.1. Мы не осуществляем сбор ваших персональных данных с использованием Сайта <br>

                1.2. Все данные, собираемые на Сайте, предоставляются и принимаются в обезличенной форме (далее –
                «Обезличенные данные»).<br>


                1.3. Обезличенные данные включают следующие сведения, которые не позволяют вас идентифицировать:<br>

                1.3.1. Информацию, которую вы предоставляете о себе самостоятельно с использованием онлайн-форм и
                программных модулей Сайта, включая имя и номер телефона и/или адрес электронной почты.<br>

                1.3.2. Данные, которые передаются в обезличенном виде в автоматическом режиме в зависимости от настроек
                используемого вами программного обеспечения.<br>

                1.4. Администрация вправе устанавливать требования к составу Обезличенных данных Пользователя, которые
                собираются использованием Сайта.<br>

                1.5. Если определенная информация не помечена как обязательная, ее предоставление или раскрытие
                осуществляется Пользователем на свое усмотрение. Одновременно вы даете информированное согласие на
                доступ неограниченного круга лиц к таким данным. Указанные данные становится общедоступными с момента
                предоставления и/или раскрытия в иной форме.<br>

                1.6. Администрация не осуществляет проверку достоверности предоставляемых данных и наличия у
                Пользователя необходимого согласия на их обработку в соответствии с настоящей Политикой, полагая, что
                Пользователь действует добросовестно, осмотрительно и прилагает все необходимые усилия к поддержанию
                такой информации в актуальном состоянии и получению всех необходимых согласий на ее использование.<br>

                1.7. Вы осознаете и принимаете возможность использования на Сайте программного обеспечения третьих лиц,
                в результате чего такие лица могут получать и передавать указанные в п.1.3 данные в обезличенном
                виде.<br>

                Пример! К указанному программному обеспечению третьих лиц относятся системы сбора статистики посещений
                Google Analytics и Яндекс.Метрика.<br>
                1.8. Состав и условия сбора обезличенных данных с использованием программного обеспечения третьих лиц
                определяются непосредственно их правообладателями и могут включать:<br>

                данные браузера (тип, версия, cookie);
                данные устройства и место его положения;
                данные операционной системы (тип, версия, разрешение экрана);
                данные запроса (время, источник перехода, IP-адрес).<br>
                1.9. Администрация не несет ответственность за порядок использования Обезличенных данных Пользователя
                третьими лицами.<br>
                2. Цели обработки данных<br>
                2.1. Администрация использует данные в следующих целях:<br>

                2.1.1. Обработка поступающих запросов и связи с Пользователем;<br>

                2.1.2. Информационное обслуживание, включая рассылку рекламно-информационных материалов;<br>

                2.1.3. Проведение маркетинговых, статистических и иных исследований;<br>

                2.1.4. Таргетирование рекламных материалов на Сайте.<br>

                3. Требования к защите данных<br>
                3.1. Администрация осуществляет хранение данных и обеспечивает их охрану от несанкционированного доступа
                и распространения в соответствии с внутренними правилами и регламентами.<br>

                3.2. В отношении полученных данных сохраняется конфиденциальность, за исключением случаев, когда они
                сделаны Пользователем общедоступными, а также когда используемые на Сайте технологии и программное
                обеспечение третьих лиц либо настройки используемого Пользователем программного обеспечения
                предусматривают открытый обмен с данными лицами и/или иными участниками и пользователями сети
                Интернет.<br>

                3.3. В целях повышения качества работы Администрация вправе хранить лог-файлы о действиях, совершенных
                Пользователем в рамках использования Сайта в течение 1 (Одного) года.<br>

                4. Передача данных<br>
                4.1. Администрация вправе передать данные третьим лицам в следующих случаях:<br>

                Пользователь выразил свое согласие на такие действия, включая случаи применения Пользователем настроек
                используемого программного обеспечения, не ограничивающих предоставление определенной информации;<br>
                Передача необходима в рамках использования Пользователем функциональных возможностей Сайта;<br>
                Передача требуется в соответствии с целями обработки данных;<br>
                В связи с передачей Сайта во владение, пользование или собственность такого третьего лица;<br>
                По запросу суда или иного уполномоченного государственного органа в рамках установленной
                законодательством процедуры;<br>
                Для защиты прав и законных интересов Администрации в связи с допущенными Пользователем нарушениями.<br>
                5. Изменение Политики конфиденциальности<br>
                5.1. Настоящая Политика может быть изменена или прекращена Администрацией в одностороннем порядке без
                предварительного уведомления Пользователя. Новая редакция Политики вступает в силу с момента ее
                размещения на Сайте, если иное не предусмотрено новой редакцией Политики.<br>

            </p>
        </div>
    </section>
    <!---------------------------------------------------------------------------------------------------------------------------------------------->
    <!---------------------------------------------------------------------------------------------------------------------------------------------->
    <section>
        <div class="sort" style="font-family: 'second';" v-if="currentPage==='phone'">
            <div class="sort__select">
                <label>Мобильные телефоны</label>
                <select v-model="filter.sort">
                    <option value="popular">По популярности</option>
                    <option value="price">По цене</option>
                </select>
            </div>

            <div class="sort__items">
                <div class="sort__items-container">
                    <div class="sort__img">
                        <?php
                        if (mysqli_num_rows($result1) > 0) {
                            // Вывод списка товаров
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                echo '<div class="sort__item"><a href="product.php?id=' . $row1['id'] . '"><img src="' . $row1['img'] . '"><p>' . $row1['name'] .'<br>'. ' Price: ' . $row1["price"] . '</p></a></div><br>';
//
                            }
                        } else {
                            echo 'No products found';
                        }

                        ?>

                    </div>

                </div>


            </div>

        </div>


        <div class="sort" style="font-family: 'second';" v-if="currentPage==='cpu'">
            <div class="sort__select">
                <label>Процессоры</label>
                <select v-model="filter.sort">
                    <option value="popular">По популярности</option>
                    <option value="price">По цене</option>
                </select>
            </div>

            <div class="sort__items">
                <div class="sort__items-container" >
                    <div class="sort__img" >
                        <?php
                        if (mysqli_num_rows($result2) > 0) {
                            // Вывод списка товаров
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo ' <div class="sort__item"><a href="product.php?id=' . $row2['id'] . '">'  . "<img  src=\"{$row2['img']}\">". "<p>{$row2['name']}</p>".'</a></div><br>';
//
                            }
                        } else {
                            echo 'No products found';
                        }
                        ?>
                    </div>
                </div>



            </div>
        </div>
<!---->
        <div class="sort" style="font-family: 'second';" v-if="currentPage==='powerbanks'">

            <div class="sort__select">
                <label>Портативный аккумуляторы</label>
                <select v-model="filter.sort">
                    <option value="popular">По популярности</option>
                    <option value="price">По цене</option>
                </select>
            </div>

            <div class="sort__items">
                <div class="sort__items-container" >
                    <div class="sort__img" >

                        <?php
                        if (mysqli_num_rows($result3) > 0) {
                            // Вывод списка товаров
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                echo ' <div class="sort__item"><a href="product.php?id=' . $row3['id'] . '">'  . "<img  src=\"{$row3['img']}\">". "<p>". nl2br($row3['name']) . "</p>".'</a></div><br>';
//
                            }
                        } else {
                            echo 'No products found';
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>


        <div class="sort" style="font-family: 'second';" v-if="currentPage==='phonecase'">

            <div class="sort__select">
                <label>Чехлы для телефона</label>
                <select v-model="filter.sort">
                    <option value="popular">По популярности</option>
                    <option value="price">По цене</option>
                </select>
            </div>

            <div class="sort__items">
                <div class="sort__items-container" >
                    <div class="sort__img" >

                        <?php
                        if (mysqli_num_rows($result5) > 0) {
                            // Вывод списка товаров
                            while ($row5 = mysqli_fetch_assoc($result5)) {
                                echo ' <div class="sort__item"><a href="product.php?id=' . $row5['id'] . '">'  . "<img  src=\"{$row5['img']}\">". "<p>". nl2br($row5['name']) . "</p>".'</a></div><br>';
//
                            }
                        } else {
                            echo 'No products found';
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>



        <div class="sort" style="font-family: 'second';" v-if="currentPage==='gpu'">

            <div class="sort__select">
                <label>Видеокарты</label>
                <select v-model="filter.sort">
                    <option value="popular">По популярности</option>
                    <option value="price">По цене</option>
                </select>
            </div>

            <div class="sort__items">
                <div class="sort__items-container" >
                    <div class="sort__img" >

                        <?php
                        if (mysqli_num_rows($result4) > 0) {
                            // Вывод списка товаров
                            while ($row4 = mysqli_fetch_assoc($result4)) {
                                echo ' <div class="sort__item"><a href="product.php?id=' . $row4['id'] . '">'  . "<img  src=\"{$row4['img']}\">". "<p>". nl2br($row4['name']) . "</p>".'</a></div><br>';
//
                            }
                        } else {
                            echo 'No products found';
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="sort" style="font-family: 'second';" v-if="currentPage==='bikes'">

            <div class="sort__select">
                <label>Велосипеды</label>
                <select v-model="filter.sort">
                    <option value="popular">По популярности</option>
                    <option value="price">По цене</option>
                </select>
            </div>

            <div class="sort__items">
                <div class="sort__items-container" >
                    <div class="sort__img" >

                        <?php
                        if (mysqli_num_rows($result6) > 0) {
                            // Вывод списка товаров
                            while ($row6 = mysqli_fetch_assoc($result6)) {
                                echo ' <div class="sort__item"><a href="product.php?id=' . $row6['id'] . '">'  . "<img  src=\"{$row6['img']}\">". "<p>". nl2br($row6['name']) . "</p>".'</a></div><br>';
//
                            }
                        } else {
                            echo 'No products found';
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>






    </section>
    <!---------------------------------------------------------------------------------------------------------------------------------------------->
    <section>
        <div class="detail" v-if="currentPage==='test'">
            <h2>Список продуктов:</h2>
            <ul>
                <li v-for="(product, id) in productss" :key="id" @click="showProduct(id); currentPage='detail'"
                    class="detail__list">
                    <img :src="'assets/'+product.img" alt="">
                    <p>{{ product.name }}</p>
                </li>
            </ul>
        </div>
        <div v-if="selectedProduct !== null">
            <div class="detail__page" v-if="currentPage==='detail'">
                <img :src="'assets/'+ selectedProduct.img" alt="">
                <div class="detail__text">
                    <h3>{{ selectedProduct.name }}</h3>
                    <p>{{ selectedProduct.description }}</p>
                    <p>Минимальная цена: {{ selectedProduct.price }}</p>
                </div>
            </div>
        </div>
    </section>
    <!---------------------------------------------------------------------------------------------------------------------------------------------->
    <section>
        <div class="map">
            <div class="map__container">
                <div class="stores" v-if="currentPage==='map'">
                    <span style="font-size: 25px;font-weight: bold">Список магазинов</span>
                    <p @click="currentPage='dns'">Днс</p>
                    <p @click="currentPage='mVideo'">Мвидео</p>
                    <p @click="currentPage='citylink'">Ситилинк</p>
                </div>
                <div class="local__store" v-if="currentPage==='dns'">
                    <div style="width:560px;height:800px;overflow:hidden;position:relative;">
                        <iframe
                            style="width:100%;height:100%;border:1px solid #e6e6e6;border-radius:8px;box-sizing:border-box"
                            src="https://yandex.ru/maps-reviews-widget/1186130568?comments"></iframe>
                        <a href="https://yandex.ru/maps/org/dns/1186130568/" target="_blank"
                           style="box-sizing:border-box;text-decoration:none;color:#b3b3b3;font-size:10px;font-family:YS Text,sans-serif;padding:0 20px;position:absolute;bottom:8px;width:100%;text-align:center;left:0;overflow:hidden;text-overflow:ellipsis;display:block;max-height:14px;white-space:nowrap;padding:0 16px;box-sizing:border-box">DNS
                            на карте Владикавказа — Яндекс Карты</a></div>

                    <div style="position:relative;overflow:hidden;"><a
                            href="https://yandex.ru/maps/org/dns/149720902982/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:0px;">DNS</a><a
                            href="https://yandex.ru/maps/33/vladikavkaz/category/computer_store/184105760/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:14px;">Компьютерный магазин во
                            Владикавказе</a><a
                            href="https://yandex.ru/maps/33/vladikavkaz/category/electronics_store/184107835/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:28px;">Магазин электроники во
                            Владикавказе</a>
                        <iframe
                            src="https://yandex.ru/map-widget/v1/?display-text=DNS&ll=44.660495%2C43.030189&mode=search&oid=149720902982&ol=biz&sll=44.660256%2C43.018599&sspn=0.102654%2C0.049565&text=%7B%22text%22%3A%22DNS%22%2C%22what%22%3A%5B%7B%22attr_name%22%3A%22chain_id%22%2C%22attr_values%22%3A%5B%221996262835%22%5D%7D%5D%7D&utm_content=more-reviews&utm_medium=reviews&utm_source=maps-reviews-widget&z=13"
                            width="560" height="400" frameborder="1" allowfullscreen="true"
                            style="position:relative;"></iframe>
                    </div>
                    <div style="position:relative;overflow:hidden;"><a
                            href="https://yandex.ru/maps/org/dns/106280907253/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:0px;">DNS</a><a
                            href="https://yandex.ru/maps/33/vladikavkaz/category/computer_store/184105760/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:14px;">Компьютерный магазин во
                            Владикавказе</a><a
                            href="https://yandex.ru/maps/33/vladikavkaz/category/electronics_store/184107835/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:28px;">Магазин электроники во
                            Владикавказе</a>
                        <iframe
                            src="https://yandex.ru/map-widget/v1/?display-text=DNS&ll=44.660495%2C43.030189&mode=search&oid=106280907253&ol=biz&sll=44.660256%2C43.018599&sspn=0.102654%2C0.049565&text=%7B%22text%22%3A%22DNS%22%2C%22what%22%3A%5B%7B%22attr_name%22%3A%22chain_id%22%2C%22attr_values%22%3A%5B%221996262835%22%5D%7D%5D%7D&utm_content=more-reviews&utm_medium=reviews&utm_source=maps-reviews-widget&z=13"
                            width="560" height="400" frameborder="1" allowfullscreen="true"
                            style="position:relative;"></iframe>
                    </div>
                    <div style="position:relative;overflow:hidden;"><a
                            href="https://yandex.ru/maps/org/dns/195396448890/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:0px;">DNS</a><a
                            href="https://yandex.ru/maps/33/vladikavkaz/category/computer_store/184105760/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:14px;">Компьютерный магазин во
                            Владикавказе</a><a
                            href="https://yandex.ru/maps/33/vladikavkaz/category/electronics_store/184107835/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:28px;">Магазин электроники во
                            Владикавказе</a>
                        <iframe
                            src="https://yandex.ru/map-widget/v1/?display-text=DNS&ll=44.660495%2C43.030189&mode=search&oid=195396448890&ol=biz&sll=44.660256%2C43.018599&sspn=0.102654%2C0.049565&text=%7B%22text%22%3A%22DNS%22%2C%22what%22%3A%5B%7B%22attr_name%22%3A%22chain_id%22%2C%22attr_values%22%3A%5B%221996262835%22%5D%7D%5D%7D&utm_content=more-reviews&utm_medium=reviews&utm_source=maps-reviews-widget&z=13"
                            width="560" height="400" frameborder="1" allowfullscreen="true"
                            style="position:relative;"></iframe>
                    </div>
                    <!--                        <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/org/dns/31186023309/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">DNS</a><a href="https://yandex.ru/maps/33/vladikavkaz/category/computer_store/184105760/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Компьютерный магазин во Владикавказе</a><a href="https://yandex.ru/maps/33/vladikavkaz/category/electronics_store/184107835/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:28px;">Магазин электроники во Владикавказе</a><iframe src="https://yandex.ru/map-widget/v1/?display-text=DNS&ll=44.660495%2C43.030189&mode=search&oid=31186023309&ol=biz&sll=44.660256%2C43.018599&sspn=0.102654%2C0.049565&text=%7B%22text%22%3A%22DNS%22%2C%22what%22%3A%5B%7B%22attr_name%22%3A%22chain_id%22%2C%22attr_values%22%3A%5B%221996262835%22%5D%7D%5D%7D&utm_content=more-reviews&utm_medium=reviews&utm_source=maps-reviews-widget&z=13" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>-->
                    <div style="position:relative;overflow:hidden;"><a
                            href="https://yandex.ru/maps/org/dns/1186130568/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:0px;">DNS</a><a
                            href="https://yandex.ru/maps/33/vladikavkaz/category/computer_store/184105760/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:14px;">Компьютерный магазин во
                            Владикавказе</a><a
                            href="https://yandex.ru/maps/33/vladikavkaz/category/electronics_store/184107835/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:28px;">Магазин электроники во
                            Владикавказе</a>
                        <iframe
                            src="https://yandex.ru/map-widget/v1/?display-text=DNS&ll=44.660495%2C43.030189&mode=search&oid=1186130568&ol=biz&sll=44.660256%2C43.018599&sspn=0.102654%2C0.049565&text=%7B%22text%22%3A%22DNS%22%2C%22what%22%3A%5B%7B%22attr_name%22%3A%22chain_id%22%2C%22attr_values%22%3A%5B%221996262835%22%5D%7D%5D%7D&utm_content=more-reviews&utm_medium=reviews&utm_source=maps-reviews-widget&z=13"
                            width="560" height="400" frameborder="1" allowfullscreen="true"
                            style="position:relative;"></iframe>
                    </div>


                </div>
                <div class="local__store" v-if="currentPage==='citylink'">
                    <div style="width:560px;height:800px;overflow:hidden;position:relative;">
                        <iframe
                            style="width:100%;height:100%;border:1px solid #e6e6e6;border-radius:8px;box-sizing:border-box"
                            src="https://yandex.ru/maps-reviews-widget/89678460353?comments"></iframe>
                        <a href="https://yandex.ru/maps/org/sitilink_mini_punkt_vydachi/89678460353/" target="_blank"
                           style="box-sizing:border-box;text-decoration:none;color:#b3b3b3;font-size:10px;font-family:YS Text,sans-serif;padding:0 20px;position:absolute;bottom:8px;width:100%;text-align:center;left:0;overflow:hidden;text-overflow:ellipsis;display:block;max-height:14px;white-space:nowrap;padding:0 16px;box-sizing:border-box">Ситилинк
                            мини, пункт выдачи на карте Владикавказа — Яндекс Карты</a></div>
                    <div style="position:relative;overflow:hidden;"><a
                            href="https://yandex.ru/maps/org/sitilink_mini_punkt_vydachi/89678460353/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:0px;">Ситилинк мини, пункт выдачи</a><a
                            href="https://yandex.ru/maps/33/vladikavkaz/category/point_of_delivery/18955887118/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:1px;">Пункт выдачи во
                            Владикавказе</a>
                        <iframe
                            src="https://yandex.ru/map-widget/v1/?ll=44.638204%2C43.053228&mode=search&oid=89678460353&ol=biz&sctx=ZAAAAAgBEAAaKAoSCbWJk%2FsdUkZAEXhjQWFQhkVAEhIJQnbexmZHmj8RzAuwj05diT8iBgABAgMEBSgKOABA%2Fp8NSABqAnJ1nQHNzEw9oAEAqAEAvQGtBJljwgEGweuCis4C6gEA8gEA%2BAEAggIQ0YHQuNGC0LjQu9C40L3QuooCAJICAJoCDGRlc2t0b3AtbWFwcw%3D%3D&sll=44.638204%2C43.053228&sspn=0.013284%2C0.006410&text=cbnbkbyr&z=16.95"
                            width="550" height="540" frameborder="1" allowfullscreen="true"
                            style="position:relative;"></iframe>
                    </div>
                </div>
                <div class="local__store" v-if="currentPage==='mVideo'">
                    <div style="width:560px;height:800px;overflow:hidden;position:relative;">
                        <iframe
                            style="width:100%;height:100%;border:1px solid #e6e6e6;border-radius:8px;box-sizing:border-box"
                            src="https://yandex.ru/maps-reviews-widget/1253380903?comments"></iframe>
                        <a href="https://yandex.ru/maps/org/m_video/1253380903/" target="_blank"
                           style="box-sizing:border-box;text-decoration:none;color:#b3b3b3;font-size:10px;font-family:YS Text,sans-serif;padding:0 20px;position:absolute;bottom:8px;width:100%;text-align:center;left:0;overflow:hidden;text-overflow:ellipsis;display:block;max-height:14px;white-space:nowrap;padding:0 16px;box-sizing:border-box">М.Видео
                            на карте Владикавказа — Яндекс Карты</a></div>

                    <div style="position:relative;overflow:hidden;"><a
                            href="https://yandex.ru/maps/org/m_video/170013641508/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:0px;">М.Видео</a><a
                            href="https://yandex.ru/maps/33/vladikavkaz/category/electronics_store/184107835/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:14px;">Магазин электроники во
                            Владикавказе</a><a
                            href="https://yandex.ru/maps/33/vladikavkaz/category/items_for_mobile_phones/52984923455/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:28px;">Товары для мобильных телефонов
                            во Владикавказе</a>
                        <iframe
                            src="https://yandex.ru/map-widget/v1/?display-text=%D0%9C.%D0%92%D0%B8%D0%B4%D0%B5%D0%BE&ll=44.660256%2C43.018599&mode=search&oid=170013641508&ol=biz&sll=44.638293%2C43.053320&sspn=0.033474%2C0.024768&text=%7B%22text%22%3A%22%D0%9C.%D0%92%D0%B8%D0%B4%D0%B5%D0%BE%22%2C%22what%22%3A%5B%7B%22attr_name%22%3A%22chain_id%22%2C%22attr_values%22%3A%5B%226002372%22%5D%7D%5D%7D&utm_content=more-reviews&utm_medium=reviews&utm_source=maps-reviews-widget&z=14"
                            width="560" height="400" frameborder="1" allowfullscreen="true"
                            style="position:relative;"></iframe>
                    </div>
                    <div style="position:relative;overflow:hidden;"><a
                            href="https://yandex.ru/maps/org/m_video/120497686796/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:0px;">М.Видео</a><a
                            href="https://yandex.ru/maps/33/vladikavkaz/category/electronics_store/184107835/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:14px;">Магазин электроники во
                            Владикавказе</a><a
                            href="https://yandex.ru/maps/33/vladikavkaz/category/items_for_mobile_phones/52984923455/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:28px;">Товары для мобильных телефонов
                            во Владикавказе</a>
                        <iframe
                            src="https://yandex.ru/map-widget/v1/?display-text=%D0%9C.%D0%92%D0%B8%D0%B4%D0%B5%D0%BE&ll=44.660256%2C43.018599&mode=search&oid=120497686796&ol=biz&sll=44.638293%2C43.053320&sspn=0.033474%2C0.024768&text=%7B%22text%22%3A%22%D0%9C.%D0%92%D0%B8%D0%B4%D0%B5%D0%BE%22%2C%22what%22%3A%5B%7B%22attr_name%22%3A%22chain_id%22%2C%22attr_values%22%3A%5B%226002372%22%5D%7D%5D%7D&utm_content=more-reviews&utm_medium=reviews&utm_source=maps-reviews-widget&z=14"
                            width="560" height="400" frameborder="1" allowfullscreen="true"
                            style="position:relative;"></iframe>
                    </div>
                    <div style="position:relative;overflow:hidden;"><a
                            href="https://yandex.ru/maps/org/m_video/1253380903/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:0px;">М.Видео</a><a
                            href="https://yandex.ru/maps/33/vladikavkaz/category/electronics_store/184107835/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:14px;">Магазин электроники во
                            Владикавказе</a><a
                            href="https://yandex.ru/maps/33/vladikavkaz/category/items_for_mobile_phones/52984923455/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:28px;">Товары для мобильных телефонов
                            во Владикавказе</a>
                        <iframe
                            src="https://yandex.ru/map-widget/v1/?display-text=%D0%9C.%D0%92%D0%B8%D0%B4%D0%B5%D0%BE&ll=44.660256%2C43.018599&mode=search&oid=1253380903&ol=biz&sll=44.638293%2C43.053320&sspn=0.033474%2C0.024768&text=%7B%22text%22%3A%22%D0%9C.%D0%92%D0%B8%D0%B4%D0%B5%D0%BE%22%2C%22what%22%3A%5B%7B%22attr_name%22%3A%22chain_id%22%2C%22attr_values%22%3A%5B%226002372%22%5D%7D%5D%7D&utm_content=more-reviews&utm_medium=reviews&utm_source=maps-reviews-widget&z=14"
                            width="560" height="400" frameborder="1" allowfullscreen="true"
                            style="position:relative;"></iframe>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!---------------------------------------------------------------------------------------------------------------------------------------------->
    <section v-if="currentPage==='compare-block'">
        <div class="compare__container">
            <div v-for="item in compareProducts" :key="item">
                <div class="compare__item" class="compare__product">
                    <a href=""><img :src="'assets/' +item.img" alt=""></a>
                    <div class="compare__item-info">
                        <p><span>Название:</span> <span>{{item.name}}</span></p>
                        <p><span>Цена:</span> <span>{{item.price}}p.</span></p>
                        <button class="compare__btn" @click="deleteFromCompare(item.id)">Х</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!---------------------------------------------------------------------------------------------------------------------------------------------->

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