<?php


/**
 * Линейный поиск
 *
 * @param int $item
 * @param array $list
 * @return int
 */
function linearSearch(int $item, array $list): int
{
    $count = count($list);
    for ($i = 0; $i < $count; $i++) {
        if ($list[$i] == $item) {
            return $i;
        }
    }
    return -1;
}


/**
 * Линейный поиск (оптимизированный)
 *
 * @param int $item
 * @param array $sortedList
 * @return int
 */
function linearSearchOptimized(int $item, array $sortedList): int
{
    $i = 0;
    $j = count($sortedList) - 1;
    while ($i <= $j) {
        if ($sortedList[$i] < $item and $sortedList[$j] > $item) {
            $i++;
            $j--;
            continue;
        } elseif ($sortedList[$i] == $item) {
            return $i;
        } elseif ($sortedList[$j] == $item) {
            return $j;
        } else {
            break;
        }
    }
    return -1;
}


$test = false;

if ($test) {

    $n = 10000;
    $percent = 77;
    $list = [];
    for ($i = 1; $i <= $n; $i++) {
        if (random_int(0, 100) <= $percent) {
            $list[] = $i;
        }
    }
    $item = random_int(1,  $n);
    $find = linearSearchOptimized($item, $list);
    if ($find >= 0) {
        echo "Число {$item} в массиве [" . min($list) . ", " . max($list) . "] находится на позиции {$find}" . PHP_EOL;
    } else {
        echo "Число {$item} отсутствует в массиве [" . min($list) . ", " . max($list) . "]" . PHP_EOL;
    }

}
