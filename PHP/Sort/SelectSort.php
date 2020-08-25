<?php


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
            list($list[$i], $list[$lowIndex]) = array($list[$lowIndex], $list[$i]);
        }
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
    selectSort($list);
    echo 'Список после сортировки: ' . implode(', ', $list);

}
