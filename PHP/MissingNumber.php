<?php


/**
 * Проверка наличия пропущенных чисел до текущей позиции
 *
 * @param int $pos
 * @param array $list
 * @return bool
 */
function __checkPosition(int $pos, array $list): bool
{
    return $pos + 1 == $list[$pos];
}


/**
 * Проверка не пропущено ли число между текущим и предыдущим
 *
 * @param int $pos
 * @param array $list
 * @return bool
 */
function __missingNumber(int $pos, array $list): bool
{
    return $list[$pos] - 1 != $list[$pos - 1];
}


/**
 * Возвращает пропущенное число
 *
 * @param array $list
 * @return int
 */
function findMissingNumber(array $list): int
{
    $start = 0;
    $end = count($list) - 1;
    if ($end < 0) {
        return 1;
    }
    while ($start <= $end) {
        $middle = floor(($end - $start) / 2 + $start);
        if (!__checkPosition($middle, $list) and __missingNumber($middle, $list)) {
            return $middle + 1;
        }
        if (__checkPosition($middle, $list)) {
            $start = $middle + 1;
        } else {
            $end = $middle - 1;
        }
    }
    return max($list) + 1;

}


$test = false;

if ($test) {

    $count = random_int(0, 32);
    $numb = $count > 1 ? random_int(1, $count-1): 1;
    $list = [];
    for ($i = 1; $i <= $count; $i++) {
        if ($i != $numb) {
            $list[] = $i;
        }
    }
    echo 'Список чисел: ' . implode(', ', $list) . PHP_EOL;
    echo "Пропущено число: {$numb}" . PHP_EOL;
    echo 'Результат: ' . findMissingNumber($list);

}
