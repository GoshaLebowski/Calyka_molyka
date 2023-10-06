<?php
require_once("bd.php");

$monthSelect = $_POST['monthSelect'] ?? NULL; //select месяцов
$theСostOfOneDayHidden = $_POST['theСostOfOneDayHidden']; //стоимость одного дня
$childsName = $_POST['childsName']; //имя ребёнка
$numberOfDays = $_POST['numberOfDays']; //количество дней
$choosingService = $_POST['choosingService'] ?? NULL; //select доп услуг
$resultHidden = $_POST['resultHidden']; //результат расчета

if ($choosingService != NULL) {
    $selectServPrice = $choosingService;
} else {
    $selectServPrice = "NULL";
}

if (!empty($monthSelect) && !empty($theСostOfOneDayHidden) && !empty($childsName) && !empty($numberOfDays) && !empty($resultHidden)) {
    $paternChildsName = '/[\S]{2,} [\S]{2,} [\S]{2,}( [\S]{2,})*/';
    if (preg_match($paternChildsName, $childsName)) {
        $selectAttendance = mysqli_query($connect, "SELECT * FROM `attendance` WHERE `idmonth` = '$monthSelect' 
        AND`Fullnameofthechild` = '$childsName' AND `VisitedDays` = '$numberOfDays' AND `Cost` = '$resultHidden'");
        if (mysqli_num_rows($selectAttendance) > 0) {
            echo "Данные об этом ребёнке уже имеются у нас!";
        } else {
            $insertInto = mysqli_query(
                $connect,
                "INSERT INTO `attendance` (`idChild's`, `idmonth`, `Fullnameofthechild`, `VisitedDays`, `idservices`, `Cost`)
                VALUES (NULL, '$monthSelect', '$childsName', '$numberOfDays', $selectServPrice, '$resultHidden')"
            );
            if ($insertInto) {
                echo "success";
            } else {
                echo "Что-то пошло не так!";
            }
        }
    } else {
        echo "Введите корректно имя ребёнка!";
    }
} else {
    echo "Все поля обязательны для заполнения, кроме доп. услуг!";
}
?>