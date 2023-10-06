<?php
require_once("bd.php");

$monthSelect = $_POST['monthSelect'] ?? NULL; //select месяцов
$theСostOfOneDayHidden = $_POST['theСostOfOneDayHidden']; //стоимость одного дня
$childsName = $_POST['childsName']; //имя ребёнка
$numberOfDays = $_POST['numberOfDays']; //количество дней
$choosingService = $_POST['choosingService'] ?? NULL; //select доп услуг

$selectServices = mysqli_query($connect, "SELECT * FROM `additionalservices` WHERE `idservices` = '$choosingService'");
$selectServicesPrice = mysqli_fetch_assoc($selectServices);

if ($choosingService != NULL) {
    $selectServPrice = $selectServicesPrice['price'];
} else {
    $selectServPrice = 0;
}

if (!empty($monthSelect) && !empty($theСostOfOneDayHidden) && !empty($numberOfDays)) {
    if (
        ($monthSelect == '1' || $monthSelect == '3' || $monthSelect == '5' || $monthSelect == '7' || $monthSelect == '8' || $monthSelect == '10'
            || $monthSelect == '12')
    ) {
        if (!$numberOfDays < 0) {
            if ($numberOfDays <= 31) {
                $result = $theСostOfOneDayHidden * $numberOfDays + $selectServPrice;
                echo $result;
            } else {
                echo "Данный месяц не может быть больше 31-го дня!";
            }
        } else {
            echo "Данное поле не должно быть отрицательным значением!";
        }
    }

    if (($monthSelect == '4' || $monthSelect == '6' || $monthSelect == '9' || $monthSelect == '11' || $monthSelect == '8')) {
        if (!$numberOfDays < 0) {
            if ($numberOfDays <= 30) {
                $result = $theСostOfOneDayHidden * $numberOfDays + $selectServPrice;
                echo $result;
            } else {
                echo "Данный месяц не может быть больше 30-ти дней!";
            }
        } else {
            echo "Данное поле не должно быть отрицательным значением!";
        }
    }

    if ($monthSelect == '2') {
        if (!$numberOfDays < 0) {
            if ($numberOfDays <= 28) {
                $result = $theСostOfOneDayHidden * $numberOfDays + $selectServPrice;
                echo $result;
            } else {
                echo "Данный месяц не может быть больше 28-ми дней!";
            }
        } else {
            echo "Данное поле не должно быть отрицательным значением!";
        }
    }
} else {
    echo "Все поля обязательны для заполнения, кроме доп. услуг!";
}
