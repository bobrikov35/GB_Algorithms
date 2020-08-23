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
 * Сортировка выбором
 *
 * @param array $list
 */
function selectSort(array &$list): void
{
    $count = count($list);
    for ($i = 0; $i < $count - 1; $i++) {
        $lowIndex = $i;
        for ($j = $i + 1; $j < $count; $j++) {
            if ($list[$j] < $list[$lowIndex]) {
                $lowIndex = $j;
            }
        }
        if ($lowIndex != $i) {
            __swap($i, $lowIndex, $list);
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
    selectSort($list);
    echo 'Список после сортировки: ' . implode(', ', $list) . PHP_EOL;

}
