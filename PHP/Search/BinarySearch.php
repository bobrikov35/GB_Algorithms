<?php


/**
 * Бинарный поиск
 *
 * @param array $sortedlist - отсортирован по возрастанию
 * @param int $item
 * @return int
 */
function binarySearch(int $item, array $sortedlist): int
{
    $low = 0;
    $high = count($sortedlist) - 1;
    if ($item > $sortedlist[$high] or $item < $sortedlist[$low]) {
        return -1;
    }
    while ($low <= $high) {
        $middle = floor(($high + $low) / 2);
        if ($sortedlist[$middle] == $item) {
            return $middle;
        }
        if ($sortedlist[$middle] > $item) {
            $high = $middle - 1;
        } else {
            $low = $middle + 1;
        }
    }
    return -1;
}


$test = false;

if ($test) {

    $n = 1000000;
    $percent = 77;
    $list = [];
    for ($i = 1; $i <= $n; $i++) {
        if (random_int(0, 100) <= $percent) {
            $list[] = $i;
        }
    }
    $item = random_int(1,  $n);
    $find = binarySearch($item, $list);
    if ($find >= 0) {
        echo "Число {$item} в массиве [" . min($list) . ", " . max($list) . "] находится на позиции {$find}" . PHP_EOL;
    } else {
        echo "Число {$item} отсутствует в массиве [" . min($list) . ", " . max($list) . "]" . PHP_EOL;
    }

}
