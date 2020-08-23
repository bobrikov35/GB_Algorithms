<?php


/**
 * Сортировка вставками
 *
 * @param array $list
 */
function insertSort(array &$list): void
{
    $count = count($list);
    for ($i = 1; $i < $count; $i++) {
        $insertItem = $list[$i];
        $j = $i - 1;
        while (isset($list[$j]) and $list[$j] > $insertItem) {
            $list[$j + 1] = $list[$j];
            $j--;
        }
        $list[$j + 1] = $insertItem;
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
    insertSort($list);
    echo 'Список после сортировки: ' . implode(', ', $list) . PHP_EOL;

}
