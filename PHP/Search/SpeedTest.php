<?php

include_once 'BinarySearch.php';
include_once 'InterpolationSearch.php';
include_once 'LinearSearch.php';


function __randSortedArray(int $n, int $percent = 100): array
{
    $result = [];
    for ($i = 1; $i <= $n; $i++) {
        if (random_int(0, 100) <= $percent) {
            $result[] = $i;
        }
    }
    return $result;
}


function __time($start, $end = null): float
{
    if ($end == 0) {
        $end = microtime(true);
    }
    return $end - $start;
}


$n = 1000000;
$loops = 100;
$list = __randSortedArray($n, 77);
$count = count($list);
$rand = random_int(0,  floor($count * 0.1));
$item_0_10 = $list[$rand];
$rand = random_int(floor($count * 0.4),  floor($count * 0.6));
$item_40_60 = $list[$rand];
$rand = random_int(floor($count * 0.9),  $count - 1);
$rand_90_100 = $list[$rand];


echo 'Интерполяционный поиск:           ';

echo '    1. Начало: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $start = microtime(true);
    interpolationSearch($item_0_10, $list);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));

echo '    2. Середина: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $start = microtime(true);
    interpolationSearch($item_40_60, $list);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));

echo '    3. Конец: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $start = microtime(true);
    interpolationSearch($rand_90_100, $list);
    $times[] = __time($start);
}
printf('%10f сек.' . PHP_EOL, min($times));


echo 'Двоичный поиск:                   ';

echo '    1. Начало: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $start = microtime(true);
    binarySearch($item_0_10, $list);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));

echo '    2. Середина: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $start = microtime(true);
    binarySearch($item_40_60, $list);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));

echo '    3. Конец: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $start = microtime(true);
    binarySearch($rand_90_100, $list);
    $times[] = __time($start);
}
printf('%10f сек.' . PHP_EOL, min($times));


echo 'Линейный (оптимизированный) поиск:';

echo '    1. Начало: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $start = microtime(true);
    linearSearchOptimized($item_0_10, $list);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));

echo '    2. Середина: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $start = microtime(true);
    linearSearchOptimized($item_40_60, $list);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));

echo '    3. Конец: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $start = microtime(true);
    linearSearchOptimized($rand_90_100, $list);
    $times[] = __time($start);
}
printf('%10f сек.' . PHP_EOL, min($times));


echo 'Линейный поиск:                   ';

echo '    1. Начало: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $start = microtime(true);
    linearSearch($item_0_10, $list);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));

echo '    2. Середина: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $start = microtime(true);
    linearSearch($item_40_60, $list);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));

echo '    3. Конец: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $start = microtime(true);
    linearSearch($rand_90_100, $list);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));
