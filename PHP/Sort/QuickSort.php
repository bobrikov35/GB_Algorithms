<?php


/**
 * Возвращает "разделитель"
 *
 * @param int $start
 * @param int $end
 * @param array $list
 * @return int
 */
function __partition(int $start, int $end, array &$list): int
{
    $pivot = $list[floor(($start + $end) / 2)];
    while (true) {
        while ($list[$start] < $pivot) {
            $start++;
        }
        while ($list[$end] > $pivot) {
            $end--;
        }
        if ($start >= $end) {
            return $end;
        }
        list($list[$start], $list[$end]) = array($list[$end], $list[$start]);
        $start++;
        $end--;
    }
}

function __quickSort(&$list, $start, $end)
{
    if ($start < $end) {
        $separator = __partition($start, $end, $list);
        __quickSort($list, $start, $separator);
        __quickSort($list, $separator + 1, $end);
    }
}


function quickSort(&$list)
{
    __quickSort($list, 0, count($list) - 1);
}


$test = false;

if ($test) {

    $n = 32;
    $list = [];
    for ($i = 1; $i <= $n; $i++) {
        $list[] = random_int(1, $n);
    }
    echo 'Список до сортировки: ' . implode(', ', $list) . PHP_EOL;
    quickSort($list);
    echo 'Список после сортировки: ' . implode(', ', $list);

}
