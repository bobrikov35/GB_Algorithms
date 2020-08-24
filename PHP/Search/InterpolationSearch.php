<?php


/**
 * Интерполяционный поиск
 *
 * @param array $sortedlist - отсортирован по возрастанию
 * @param int $item
 * @return int
 */
function interpolationSearch(int $item, array $sortedlist): int
{
    $low = 0;
    $high = count($sortedlist) - 1;
    if ($item > $sortedlist[$high] or $item < $sortedlist[$low]) {
        return -1;
    }
    while ($sortedlist[$low] < $item and $sortedlist[$high] > $item) {
        if ($sortedlist[$low] == $sortedlist[$high]) {
            break;
        }
        $middle = $low + (($high - $low) * ($item - $sortedlist[$low])) / ($sortedlist[$high] - $sortedlist[$low]);
        if ($sortedlist[$middle] == $item) {
            return $middle;
        }
        if ($sortedlist[$middle] > $item) {
            $high = $middle - 1;
        } else {
            $low = $middle + 1;
        }
    }
    if ($sortedlist[$low] == $item) {
        return $low;
    }
    if ($sortedlist[$high] == $item) {
        return $high;
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
    $find = interpolationSearch($item, $list);
    if ($find >= 0) {
        echo "Число {$item} в массиве [" . min($list) . ", " . max($list) . "] находится на позиции {$find}" . PHP_EOL;
    } else {
        echo "Число {$item} отсутствует в массиве [" . min($list) . ", " . max($list) . "]" . PHP_EOL;
    }

}
