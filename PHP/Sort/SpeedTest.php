<?php

include_once 'BubbleSort.php';
include_once 'HeapSort.php';
include_once 'InsertSort.php';
include_once 'MergeSort.php';
include_once 'QuickSort.php';
include_once 'SelectSort.php';


function __randArray(int $n, int $min, int $max): array
{
    if ($max < $min) {
        $min +=$max;
        $max = $min - $max;
    }
    $result = [];
    for ($i = 0; $i < $n; $i++) {
        $result[] = random_int($min, $max);
    }
    return $result;
}


function __worseArray(int $n): array
{
    $result = [];
    for ($i = 0; $i < $n; $i++) {
        $result[] = $n - $i;
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


$n = 1000;
$loops = 1;
$randList = __randArray($n, 1, $n * $n);
$worseList = __worseArray($n);


echo 'Встроенная сортировка:   ';

echo '    1. Случайный массив: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $temp = $randList;
    $start = microtime(true);
    sort($temp);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));

echo '    2. Худший массив: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $temp = $worseList;
    $start = microtime(true);
    sort($temp);
    $times[] = __time($start);
}
printf('%10f сек.' . PHP_EOL, min($times));


echo 'Быстрая сортировка:      ';

echo '    1. Случайный массив: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $temp = $randList;
    $start = microtime(true);
    quickSort($temp);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));

echo '    2. Худший массив: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $temp = $worseList;
    $start = microtime(true);
    quickSort($temp);
    $times[] = __time($start);
}
printf('%10f сек.' . PHP_EOL, min($times));


echo 'Сортировка слиянием:     ';

echo '    1. Случайный массив: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $start = microtime(true);
    mergeSort($randList);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));

echo '    2. Худший массив: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $start = microtime(true);
    mergeSort($worseList);
    $times[] = __time($start);
}
printf('%10f сек.' . PHP_EOL, min($times));


echo 'Пирамидальная сортировка:';

echo '    1. Случайный массив: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $temp = $randList;
    $start = microtime(true);
    heapSort($temp);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));

echo '    2. Худший массив: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $temp = $worseList;
    $start = microtime(true);
    heapSort($temp);
    $times[] = __time($start);
}
printf('%10f сек.' . PHP_EOL, min($times));


echo 'Сортировка выбором:      ';

echo '    1. Случайный массив: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $temp = $randList;
    $start = microtime(true);
    selectSort($temp);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));

echo '    2. Худший массив: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $temp = $worseList;
    $start = microtime(true);
    selectSort($temp);
    $times[] = __time($start);
}
printf('%10f сек.' . PHP_EOL, min($times));


echo 'Сортировка вставками:    ';

echo '    1. Случайный массив: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $temp = $randList;
    $start = microtime(true);
    insertSort($temp);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));

echo '    2. Худший массив: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $temp = $worseList;
    $start = microtime(true);
    insertSort($temp);
    $times[] = __time($start);
}
printf('%10f сек.' . PHP_EOL, min($times));


echo 'Пузырьковая сортировка:  ';

echo '    1. Случайный массив: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $temp = $randList;
    $start = microtime(true);
    bubbleSort($temp);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));

echo '    2. Худший массив: ';
$times = [];
for ($i = 0; $i < $loops; $i++) {
    $temp = $worseList;
    $start = microtime(true);
    bubbleSort($temp);
    $times[] = __time($start);
}
printf('%10f сек.', min($times));
