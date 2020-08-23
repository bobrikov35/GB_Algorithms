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
    if (count($list) <= 1) {
        return $list;
    }
    $middle = (int)(count($list) / 2);
    $leftList = mergeSort(array_slice($list, 0, $middle));
    $rightList = mergeSort(array_slice($list, $middle));
    return __merge($leftList, $rightList);
}


$test = false;

if ($test) {

    $n = 32;
    $list = [];
    for ($i = 1; $i <= $n; $i++) {
        $list[] = random_int(1, 32);
    }
    echo 'Список до сортировки: ' . implode(', ', $list) . PHP_EOL;
    $sortedList = mergeSort($list);
    echo 'Список после сортировки: ' . implode(', ', $sortedList) . PHP_EOL;

}
