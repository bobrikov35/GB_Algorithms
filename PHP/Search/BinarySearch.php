<?php


/**
 * Бинарный поиск
 *
 * @param array $list - отсортирован по возрастанию
 * @param int $item
 * @return int
 */
function binarySearch(int $item, array $list): int
{
    $low = 0;
    $high = count($list) - 1;
    if ($item > $list[$high] or $item < $list[$low]) {
        return -1;
    }
    while ($low <= $high) {
        $middle = floor(($high + $low) / 2);
        if ($list[$middle] == $item) {
            return $middle;
        }
        if ($list[$middle] > $item) {
            $high = $middle - 1;
        } else {
            $low = $middle + 1;
        }
    }
    return -1;
}


$test = false;

if ($test) {

    $n = 9999;
    $list = [];
    for ($i = 1; $i <= $n; $i++) {
        $list[] = $i;
    }
    $item = random_int( (int)(1 - $n / 10) ,  (int)($n + $n / 10) );
    $find = binarySearch($item, $list);
    if ($find >= 0) {
        echo "Число {$item} в массиве [1, {$n}] находится на позиции {$find}" . PHP_EOL;
    } else {
        echo "Число {$item} отсутствует в массиве [1, {$n}]" . PHP_EOL;
    }

}
