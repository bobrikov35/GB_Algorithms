<?php


/**
 * Слияние двух массивов
 *
 * @param array $leftList
 * @param array $rightList
 * @return array
 */
function __merge(array $leftList, array $rightList): array
{
    $sortedList = [];
    $leftIndex = 0;
    $rightIndex = 0;
    $leftCount = count($leftList);
    $rightCount = count($rightList);
    $count = $leftCount + $rightCount;
    for ($i = 0; $i < $count; $i++) {
        if ($leftIndex < $leftCount and $rightIndex < $rightCount) {
            if ($leftList[$leftIndex] <= $rightList[$rightIndex]) {
                $sortedList[] = $leftList[$leftIndex];
                $leftIndex++;
            } else {
                $sortedList[] = $rightList[$rightIndex];
                $rightIndex++;
            }
        } elseif ($leftIndex == $leftCount) {
            $sortedList[] = $rightList[$rightIndex];
            $rightIndex++;
        } elseif ($rightIndex == $rightCount) {
            $sortedList[] = $leftList[$leftIndex];
            $leftIndex++;
        }
    }
    return $sortedList;
}


/**
 * Сортировка слиянием
 *
 * @param array $list
 * @return array
 */
function mergeSort(array $list): array
{
    $count = count($list);
    if ($count < 3) {
        if ($count == 2 and $list[0] > $list[1]) {
            return [$list[1], $list[0]];
        }
        return $list;
    }
    $middle = (int)($count / 2);
    return __merge(mergeSort(array_slice($list, 0, $middle)), mergeSort(array_slice($list, $middle)));
}


$test = false;

if ($test) {

    $n = 32;
    $list = [];
    for ($i = 1; $i <= $n; $i++) {
        $list[] = random_int(1, $n);
    }
    echo 'Список до сортировки: ' . implode(', ', $list) . PHP_EOL;
    $sortedList = mergeSort($list);
    echo 'Список после сортировки: ' . implode(', ', $sortedList);

}
