<?php

include_once 'Search.php';


$testSearch = true;


if ($testSearch) {

    $n = 9999999;
    $list = [];
    for ($i = 1; $i <= $n; $i++) {
        $list[] = $i;
    }
    $item = random_int( (int)(1 - $n / 10) ,  (int)($n + $n / 10) );

    $time = microtime(true);
    $find = Search::binarySearch($list, $item);
    $time = microtime(true) - $time;
    echo "Бинарный поиск выполнен за {$time} сек." . PHP_EOL;

    $time = microtime(true);
    $find = Search::simpleSearch($list, $item);
    $time = microtime(true) - $time;
    echo "Поиск по порядку выполнен за {$time} сек." . PHP_EOL;

    if ($find >= 0) {
        echo "Число {$item} в массиве [1, {$n}] находится на позиции {$find}" . PHP_EOL;
    } else {
        echo "Число {$item} отсутствует в массиве [1, {$n}]" . PHP_EOL;
    }

}
