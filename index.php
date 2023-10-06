<?php
require_once("bd.php");

$selectMonth = mysqli_query($connect, "SELECT * FROM `month`");
$selectAdditionalServices = mysqli_query($connect, "SELECT * FROM `additionalservices`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/main.css">
    <title>Коляка моляка</title>
</head>

<body>
    <main class="mainForm">
        <form method="post">
            <h3 class="header">Расчёт стоимости</h3>
            <label class="ml-lm">Месяц: </label>
            <select name="monthSelect" onchange="run()" class="months ml-mb-sm" id="monthSelect">
                <option value="0" hidden disabled selected>Выберите месяц</option>
                <?php foreach($selectMonth as $month): ?>
                    <option value="<?php echo $month['idmonth'] ?>"><?php echo $month['name'] ?></option>
                <?php endforeach; ?>
            </select><br>
            <!-- $month['name'] переменная возращает таблицу из бд через цикл foreach. Foreach прогоняет всю таблицу, аналогично и с select name="choosingService" -->

            <label>Стоимость 1 дня: </label>
            <input name="theСostOfOneDay" type="text" id="idtheСostOfOneDay" class="theСostOfOneDay ml-mb-c" disabled>
            <!-- echo $pricePerQuarter; сохраняет value после перезагрузки, аналогично и во всех инпутах -->
            <input name="theСostOfOneDayHidden" type="hidden" id="idtheСostOfOneDayHidden" class="theСostOfOneDay ml-mb-c"><br>
            <!-- Я сделал type="hidden" так как метод $_POST не берёт данные из отключенного инпута, аналогично и с name="result" он тоже отключён -->
            <label>ФИО ребенка </label>
            <input name="childsName" type="text" class="childsName ml-mb-n"><br>

            <label>Количество дней </label>
            <input name="numberOfDays" type="number" class="numberOfDays ml-mb-nod" id="idnumberOfDays"><br>

            <label>Дополнительная</label>
            <select name="choosingService" id="idchoosingService" class="choosingService ml-a">
                <option value="0" hidden disabled selected>Выберите доп. услугу</option>
                <?php foreach($selectAdditionalServices as $additionalServices): ?>
                    <option value="<?php echo $additionalServices['idservices'] ?>"><?php echo $additionalServices['name'] ?></option>
                <?php endforeach; ?>
            </select><br>
            <label>услуга</label><br>

            <label>Сумма к оплате</label>
            <input type="text" name="result" id="result" class="result ml-s" disabled>
            <input type="hidden" name="resultHidden" id="resultHidden" class="result ml-s"><br>
            <label>за месяц</label><br>

            <input type="submit" class="calc" value="Расcчитать">
            <input type="submit" class="save" value="Сохранить">
        </form>

    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="script/calculate.js"></script>
    <script src="script/script.js"></script>
    <script src="script/outputToDb.js"></script>
</body>

</html>