<?php

include_once 'BubbleSort.php';
include_once 'DualSelectSort.php';
include_once 'HeapSort.php';
include_once 'InsertSort.php';
include_once 'MergeSort.php';
include_once 'PigeonholeSort.php';
include_once 'QuickSort.php';
include_once 'SelectSort.php';
include_once 'TreeSort.php';


function randArray(int $n, int $min, int $max): array
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


function worseArray(int $n): array
{
    $result = [];
    for ($i = 0; $i < $n; $i++) {
        $result[] = $n - $i;
    }
    return $result;
}


function timeIt($start, $end = null): float
{
    if ($end == 0) {
        $end = microtime(true);
    }
    return $end - $start;
}


function checkSortedArray(array $sortedList): bool
{
    $count = count($sortedList);
    for ($i = 1; $i < $count; $i++) {
        if ($sortedList[$i - 1] > $sortedList[$i]) {
            return false;
        }
    }
    return true;
}


$n = 1024;
$loops = 10;
$times = [];

for ($i = 0; $i < $loops; $i++) {
    $randList = randArray($n, 1, $n);
    $temp = $randList;
    $start = microtime(true);
    sort($temp);
    $times['php::rand'][] = timeIt($start);
    $start = microtime(true);
    treeSort($randList);
    $times['tree::rand'][] = timeIt($start);
    if (!checkSortedArray($temp)) {
        echo 'TREE: ошибка!';
    }
    $temp = $randList;
    $start = microtime(true);
    quickSort($temp);
    $times['quick::rand'][] = timeIt($start);
    if (!checkSortedArray($temp)) {
        echo 'QUICK: ошибка!';
    }
    $start = microtime(true);
    $temp = mergeSort($randList);
    $times['merge::rand'][] = timeIt($start);
    if (!checkSortedArray($temp)) {
        echo 'MERGE: ошибка!';
    }
    $temp = $randList;
    $start = microtime(true);
    heapSort($temp);
    $times['heap::rand'][] = timeIt($start);
    if (!checkSortedArray($temp)) {
        echo 'HEAP: ошибка!';
    }
    $start = microtime(true);
    splInsertSort($randList);
    $times['splInsert::rand'][] = timeIt($start);
    $temp = $randList;
    $start = microtime(true);
    dualSelectSort($temp);
    $times['dualSelect::rand'][] = timeIt($start);
    if (!checkSortedArray($temp)) {
        echo 'HEAP: ошибка!';
    }
    $temp = $randList;
    $start = microtime(true);
    selectSort($temp);
    $times['select::rand'][] = timeIt($start);
    if (!checkSortedArray($temp)) {
        echo 'HEAP: ошибка!';
    }
    $temp = $randList;
    $start = microtime(true);
    insertSort($temp);
    $times['insert::rand'][] = timeIt($start);
    if (!checkSortedArray($temp)) {
        echo 'HEAP: ошибка!';
    }
    $temp = $randList;
    $start = microtime(true);
    bubbleSort($temp);
    $times['bubble::rand'][] = timeIt($start);
    if (!checkSortedArray($temp)) {
        echo 'HEAP: ошибка!';
    }
    $start = microtime(true);
    $temp = pigeonholeSort($randList);
    $times['pigeonhole::rand'][] = timeIt($start);
    if (!checkSortedArray($temp)) {
        echo 'HEAP: ошибка!';
    }
}

$loops = 3;
$worseList = worseArray($n);

for ($i = 0; $i < $loops; $i++) {
    // отсортированный в обратном порядке массив
    $temp = $worseList;
    $start = microtime(true);
    sort($temp);
    $times['php::worse'][] = timeIt($start);
    $start = microtime(true);
    treeSort($worseList);
    $times['tree::worse'][] = timeIt($start);
    $temp = $worseList;
    $start = microtime(true);
    quickSort($temp);
    $times['quick::worse'][] = timeIt($start);
    $start = microtime(true);
    mergeSort($worseList);
    $times['merge::worse'][] = timeIt($start);
    $temp = $worseList;
    $start = microtime(true);
    heapSort($temp);
    $times['heap::worse'][] = timeIt($start);
    $start = microtime(true);
    splInsertSort($worseList);
    $times['splInsert::worse'][] = timeIt($start);
    $temp = $worseList;
    $start = microtime(true);
    dualSelectSort($temp);
    $times['dualSelect::worse'][] = timeIt($start);
    $temp = $worseList;
    $start = microtime(true);
    selectSort($temp);
    $times['select::worse'][] = timeIt($start);
    $temp = $worseList;
    $start = microtime(true);
    insertSort($temp);
    $times['insert::worse'][] = timeIt($start);
    $temp = $worseList;
    $start = microtime(true);
    bubbleSort($temp);
    $times['bubble::worse'][] = timeIt($start);
    $start = microtime(true);
    pigeonholeSort($worseList);
    $times['pigeonhole::worse'][] = timeIt($start);
    // отсортированный массив
    $start = microtime(true);
    sort($temp);
    $times['php::best'][] = timeIt($start);
    $start = microtime(true);
    treeSort($temp);
    $times['tree::best'][] = timeIt($start);
    $start = microtime(true);
    quickSort($temp);
    $times['quick::best'][] = timeIt($start);
    $start = microtime(true);
    mergeSort($temp);
    $times['merge::best'][] = timeIt($start);
    $start = microtime(true);
    heapSort($temp);
    $times['heap::best'][] = timeIt($start);
    $start = microtime(true);
    splInsertSort($temp);
    $times['splInsert::best'][] = timeIt($start);
    $start = microtime(true);
    dualSelectSort($temp);
    $times['dualSelect::best'][] = timeIt($start);
    $start = microtime(true);
    selectSort($temp);
    $times['select::best'][] = timeIt($start);
    $start = microtime(true);
    insertSort($temp);
    $times['insert::best'][] = timeIt($start);
    $start = microtime(true);
    bubbleSort($temp);
    $times['bubble::best'][] = timeIt($start);
    $start = microtime(true);
    pigeonholeSort($temp);
    $times['pigeonhole::best'][] = timeIt($start);
}


echo 'Встроенная сортировка:                    ';
printf('    1. Лучший: %10f сек.', min($times['php::best']));
printf('    2. Случайный: %10f сек.', array_sum($times['php::rand']) / count($times['php::rand']));
printf('    3. Худший: %10f сек.' . PHP_EOL, min($times['php::worse']));

echo 'Сортировка двоичным деревом:              ';
printf('    1. Лучший: %10f сек.', min($times['tree::best']));
printf('    2. Случайный: %10f сек.', array_sum($times['tree::rand']) / count($times['tree::rand']));
printf('    3. Худший: %10f сек.' . PHP_EOL, min($times['tree::worse']));

echo 'Быстрая сортировка:                       ';
printf('    1. Лучший: %10f сек.', min($times['quick::best']));
printf('    2. Случайный: %10f сек.', array_sum($times['quick::rand']) / count($times['quick::rand']));
printf('    3. Худший: %10f сек.' . PHP_EOL, min($times['quick::worse']));

echo 'Сортировка слиянием:                      ';
printf('    1. Лучший: %10f сек.', min($times['merge::best']));
printf('    2. Случайный: %10f сек.', array_sum($times['merge::rand']) / count($times['merge::rand']));
printf('    3. Худший: %10f сек.' . PHP_EOL, min($times['merge::worse']));

echo 'Пирамидальная сортировка:                 ';
printf('    1. Лучший: %10f сек.', min($times['heap::best']));
printf('    2. Случайный: %10f сек.', array_sum($times['heap::rand']) / count($times['heap::rand']));
printf('    3. Худший: %10f сек.' . PHP_EOL, min($times['heap::worse']));

echo 'Сортировка вставками (SPL + BinarySearch):';
printf('    1. Лучший: %10f сек.', min($times['splInsert::best']));
printf('    2. Случайный: %10f сек.', array_sum($times['splInsert::rand']) / count($times['splInsert::rand']));
printf('    3. Худший: %10f сек.' . PHP_EOL, min($times['splInsert::worse']));

echo 'Двухсторонняя сортировка выбором:         ';
printf('    1. Лучший: %10f сек.', min($times['dualSelect::best']));
printf('    2. Случайный: %10f сек.', array_sum($times['dualSelect::rand']) / count($times['dualSelect::rand']));
printf('    3. Худший: %10f сек.' . PHP_EOL, min($times['dualSelect::worse']));

echo 'Сортировка выбором:                       ';
printf('    1. Лучший: %10f сек.', min($times['select::best']));
printf('    2. Случайный: %10f сек.', array_sum($times['select::rand']) / count($times['select::rand']));
printf('    3. Худший: %10f сек.' . PHP_EOL, min($times['select::worse']));

echo 'Сортировка вставками:                     ';
printf('    1. Лучший: %10f сек.', min($times['insert::best']));
printf('    2. Случайный: %10f сек.', array_sum($times['insert::rand']) / count($times['insert::rand']));
printf('    3. Худший: %10f сек.' . PHP_EOL, min($times['insert::worse']));

echo 'Пузырьковая сортировка:                   ';
printf('    1. Лучший: %10f сек.', min($times['bubble::best']));
printf('    2. Случайный: %10f сек.', array_sum($times['bubble::rand']) / count($times['bubble::rand']));
printf('    3. Худший: %10f сек.' . PHP_EOL, min($times['bubble::worse']));

echo 'Голубиная сортировка:                     ';
printf('    1. Лучший: %10f сек.', min($times['pigeonhole::best']));
printf('    2. Случайный: %10f сек.', array_sum($times['pigeonhole::rand']) / count($times['pigeonhole::rand']));
printf('    3. Худший: %10f сек.', min($times['pigeonhole::worse']));
echo ' => в данной реализации эффективна только при (max - min) ≈ n';
