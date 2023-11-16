<?php

$dateStart = "2023-11-06";
$dateEnd = "2023-11-15";
$date = $dateStart;
$findDay = 2; // вторник
$count = 0;

$date = New DateTime($dateStart);
$dateStart = New DateTime($dateStart);
$dateEnd = New DateTime($dateEnd);


if ($dateStart < $dateEnd)
{
    //пытаемся найти первый вторник
    while ($dateStart < $dateEnd && $dateStart->format("N") != $findDay){
        $dateStart->modify("+1 day");
    }
    if($dateStart->format("N") == $findDay){
        //если нашли вторник, то проверяем,что он не является концами промежутка
        if($dateStart != $date && $dateStart != $dateEnd){
            $count++;
        }
        //следующий вторник
        $dateStart->modify("+7 day");
        //и продолжаем искать все вторники
        while ($dateStart < $dateEnd){
            $count++;
            $dateStart->modify("+7 day");
        }
    }
    else{
        $count = 0;
    }

}

echo "Количество вторников = ".$count;
