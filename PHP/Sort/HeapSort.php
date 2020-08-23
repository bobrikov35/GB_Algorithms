<?php


/**
 * Меняет указанные элементы массива местами
 *
 * @param int $i
 * @param int $j
 * @param array $list
 */
function __swap(int $i, int $j, array &$list): void
{
    $temp = $list[$i];
    $list[$i] = $list[$j];
    $list[$j] = $temp;
}


/**
 * Сортирующее дерево
 *
 * @param array $list
 * @param int $size
 * @param int $root
 */
function __heapify(array &$list, int $size, int $root): void
{
    $large = $root;
    $leftChild = 2 * $root + 1;
    $rightChild = 2 * $root + 2;
    if ($leftChild <= $size and $list[$leftChild] > $list[$large]) {
        $large = $leftChild;
    }
    if ($rightChild <= $size and $list[$rightChild] > $list[$large]) {
        $large = $rightChild;
    }
    if ($large != $root) {
        __swap($root, $large, $list);
        __heapify($list, $size, $large);
    }
}


/**
 * Пирамидальная сортировка (сортировка кучей)
 *
 * @param array $list
 */
function heapSort(array &$list): void
{
    $count = count($list);
    for ($i = floor($count / 2); $i >= 0 ; $i--) {
        __heapify($list, $count, $i);
    }
    for ($i = $count - 1; $i > 0; $i--) {
        __swap(0, $i, $list);
        __heapify($list, $i - 1, 0);
    }
}


$test = false;

if ($test) {

    $n = 32;
    $list = [];
    for ($i = 1; $i <= $n; $i++) {
        $list[] = random_int(1, 32);
    }
    echo 'Список до сортировки: ' . implode(', ', $list) . PHP_EOL;
    heapSort($list);
    echo 'Список после сортировки: ' . implode(', ', $list) . PHP_EOL;

}
