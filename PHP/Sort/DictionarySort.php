<?php


function __addToDictionary(int $n, array &$dictionary): void
{
    if (empty($dictionary[$n])) {
        $dictionary[$n] = 1;
        return;
    }
    $dictionary[$n]++;
}


/**
 * Сортировка со словарем
 *
 * @param array $list
 * @return array
 */
function dictionarySort(array $list): array
{
    $min = $list[0];
    $max = $list[0];
    $dictionary = [];
    foreach ($list as $n) {
        if ($min > $n) {
            $min = $n;
        } elseif ($max < $n) {
            $max = $n;
        }
        __addToDictionary($n, $dictionary);
    }
    $list = [];
    for ($i = $min; $i <= $max; $i++) {
        if (!isset($dictionary[$i])) {
            continue;
        }
        for ($j = 0; $j < $dictionary[$i]; $j++) {
            $list[] = $i;
        }
    }
    return $list;
}


$test = false;

if ($test) {

    $n = 32;
    $list = [];
    for ($i = 1; $i <= $n; $i++) {
        $list[] = random_int(1, 32);
    }
    echo 'Список до сортировки: ' . implode(', ', $list) . PHP_EOL;
    $list = dictionarySort($list);
    echo 'Список после сортировки: ' . implode(', ', $list) . PHP_EOL;

}
