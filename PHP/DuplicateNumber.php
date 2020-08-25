<?php


/**
 * Бинарный поиск с указанием промежутка поиска
 *
 * @param int $item
 * @param array $list
 * @param int $start
 * @param int $end
 * @return int
 */
function __binarySearchWithRange(int $item, array $list, int $start, int $end): int
{
    if ($item > $list[$end] or $item < $list[$start]) {
        return -1;
    }
    while ($start <= $end) {
        $middle = floor(($end - $start) / 2 + $start);
        if ($list[$middle] == $item) {
            return $middle;
        }
        if ($list[$middle] > $item) {
            $end = $middle - 1;
        } else {
            $start = $middle + 1;
        }
    }
    return -1;
}


/**
 * Возвращает первое вхождение искомого числа в массив
 *
 * @param int $item
 * @param array $list
 * @param int $start
 * @param int $end
 * @return int
 */
function __findFirst(int $item, array $list, int $start, int $end): int
{
    $result = -1;
    while ($start <= $end) {
        $middle = floor(($end - $start) / 2 + $start);
        $findLeft = __binarySearchWithRange($item, $list, $start, $middle);
        if ($findLeft >= 0) {
            $result = $findLeft;
            $end = $findLeft - 1;
            continue;
        }
        $findRight = __binarySearchWithRange($item, $list, $middle, $end);
        if ($findRight >= 0) {
            $result = $findRight;
            $start = $middle;
            $end = $findRight - 1;
            continue;
        }
        break;
    }
    return $result;
}


/**
 * Возвращает последнее вхождение искомого числа в массив
 *
 * @param int $item
 * @param array $list
 * @param int $start
 * @param int $end
 * @return int
 */
function __findLast(int $item, array $list, int $start, int $end): int
{
    $result = -1;
    while ($start <= $end) {
        $middle = floor(($end - $start) / 2 + $start);
        $findRight = __binarySearchWithRange($item, $list, $middle, $end);
        if ($findRight >= 0) {
            $result = $findRight;
            $start = $findRight + 1;
            continue;
        }
        $findLeft = __binarySearchWithRange($item, $list, $start, $middle);
        if ($findLeft >= 0) {
            $result = $findLeft;
            $end = $middle;
            $start = $findLeft + 1;
            continue;
        }
        break;
    }
    return $result;
}


/**
 * Возвращает количество дубликатов искомого числа и диапазон их расположения
 *
 * @param int $item
 * @param array $list - отсортирован по возрастанию
 * @return array
 */
function duplicateSearch(int $item, array $list): array
{
    $k = __binarySearchWithRange($item, $list, 0, count($list) - 1);
    if ($k < 0) {
        return ['left' => -1, 'right' => -1, 'count' => 0];
    }
    $left = __findFirst($item, $list, 0, $k - 1);
    $l = $left < 0 ? $k : $left;
    $right = __findLast($item, $list, $k + 1, count($list) - 1);
    $r = $right < 0 ? $k : $right;
    return ['left' => $l, 'right' => $r, 'count' => $r - $l + 1];
}


$test = false;

if ($test) {

    $count = random_int(0, 16);
    $numb = random_int(1, 16);
    $list = [];
    for ($i = 1; $i <= 32 - $count; $i++) {
        if ($i != $numb) {
            $list[] = $i;
        } else {
            $first = $i - 1;
            for ($j = 0; $j < $count; $j++) {
                $list[] = $i;
            }
            $last = count($list) - 1;
        }
    }
    $result = duplicateSearch($numb, $list);
    echo 'Список чисел: ' . implode(', ', $list) . PHP_EOL;
    echo "Искомое число: {$numb}, встречается {$j} раз(а) на отрезке [{$first}, {$last}]" . PHP_EOL;
    echo "Результат: {$numb}, встречается {$result['count']} раз(а) на отрезке [{$result['left']}, {$result['right']}]";

}
