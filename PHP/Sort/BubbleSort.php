<?php


/**
 * Пузырьковая сортировка
 *
 * @param array $list
 */
function bubbleSort(array &$list): void
{
    $count = count($list) - 1;
    $swapped = true;
    while ($swapped) {
        $swapped = false;
        for ($i = 0; $i < $count; $i++) {
            if ($list[$i] > $list[$i + 1]) {
                list($list[$i], $list[$i + 1]) = array($list[$i + 1], $list[$i]);
                $swapped = true;
            }
        }
        $count--;
    }
}


$test = false;

if ($test) {

    $n = 32;
    $list = [];
    for ($i = 1; $i <= $n; $i++) {
        $list[] = random_int(1, $n);
    }
    echo 'Список до сортировки: ' . implode(', ', $list) . PHP_EOL;
    bubbleSort($list);
    echo 'Список после сортировки: ' . implode(', ', $list);

}
