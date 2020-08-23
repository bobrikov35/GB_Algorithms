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
 * Пузырьковая сортировка
 *
 * @param array $list
 */
function bubbleSort(array &$list): void
{
    $count = count($list);
    $swapped = true;
    while ($swapped) {
        $swapped = false;
        for ($i = 0; $i < $count - 1; $i++) {
            if ($list[$i] > $list[$i + 1]) {
                __swap($i, $i + 1, $list);
                $swapped = true;
            }
        }
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
    bubbleSort($list);
    echo 'Список после сортировки: ' . implode(', ', $list) . PHP_EOL;

}
