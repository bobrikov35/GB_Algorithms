<?php


/**
 * Добавляет в словарь
 *
 * @param int $n
 * @param array $dictionary
 */
function __addDictionary(int $n, array &$dictionary): void
{
    if (isset($dictionary[$n])) {
        $dictionary[$n]++;
        return;
    }
    $dictionary[$n] = 1;
}


/**
 * Сортировка подсчетом
 *
 * @param array $list
 * @return array
 */
function pigeonholeSort(array $list): array
{
    if (empty($list)) {
        return [];
    }
    $min = $list[0];
    $max = $list[0];
    $dictionary = [];
    foreach ($list as $n) {
        if ($min > $n) {
            $min = $n;
        } elseif ($max < $n) {
            $max = $n;
        }
        __addDictionary($n, $dictionary);
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
        $list[] = random_int(1, $n);
    }
    echo 'Список до сортировки: ' . implode(', ', $list) . PHP_EOL;
    $list = pigeonholeSort($list);
    echo 'Список после сортировки: ' . implode(', ', $list);

}
