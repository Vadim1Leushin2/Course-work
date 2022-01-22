<?php

$db_host = 'std-mysql.ist.mospolytech.ru';
$db_user = 'std_1593_test'; //имя пользователя совпадает с именем БД
$db_password = 'Vadim1928'; //пароль, указанный при создании БД
$database = 'std_1593_test';

$connect = mysqli_connect($db_host, $db_user, $db_password, $database);
// Запись с `id` = 1
$result = mysqli_query($connect, "SELECT `Location` FROM `database`");
$object = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">


    <title>Курсовая работа</title>
    </div>
</head>

<body>
    <header>
        <nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="menu">
                            <ul>
                                <li><a href="tesla.php">Tesla</a></li>
                                <li><a href="nissan.php">Nissan</a></li>
                                <li><a href="bmw.php">BMW</a></li>
                                <li><a href="audi.php">Audi</a></li>
                                <li><a href="porse.php">Porshe</a></li>
                            </ul>
                            <ul class="second-menu">

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </nav>
    </header>
    <k>
        <div class="map" id="map" style="width: 100%;
	height: 500px;"></div>
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&coordorder=longlat&apikey=50300eb5-6421-45cc-beb4-ebcfebe93e0d"></script>
        <?php
        // if (isset($_GET['Location'])){
        $sql_map = "SELECT `Location`,`name`,`AdminstrArea`,`Address` FROM `database`";
        $result_map = mysqli_query($connect, $sql_map);
        $number = 0;
        // $map_element = mysqli_fetch_assoc($result_map);
        ?>
        <script type="text/javascript">
            ymaps.ready(init);

            function init() {
                <?php
                while ($object = mysqli_fetch_assoc($result_map)) {
                    $number++;
                    if ($number == 1) {
                        print_r($object['Location'])

                ?>


                        var myMap = new ymaps.Map("map", {
                            center: [<?php echo $object['Location']; ?>],
                            zoom: 12

                        }, {
                            searchControlProvider: 'yandex#search'
                        });
                    <?php
                    }
                    ?>
                    var myCollection = new ymaps.GeoObjectCollection();

                    // Добавим метку красного цвета.
                    var myPlacemark = new ymaps.Placemark([
                        <?php echo $object['Location']; ?>
                    ], {}, {});
                    myCollection.add(myPlacemark);

                    myMap.geoObjects.add(myCollection);
                    // myMap.setBounds(myCollection.getBounds(),{checkZoomRange:false, zoomMargin:9});
                <?php
                }
                ?>
            }
            myMap.setBounds(myCollection.getBounds(), {
                checkZoomRange: true,
                zoomMargin: 9
            });
        </script>
        <?php
        // }
        ?>
    </k>
</body>
<footer>

</footer>

</html>