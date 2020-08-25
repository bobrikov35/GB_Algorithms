<?php


/**
 * Сортировка двоичным деревом
 *
 * @param array $list
 * @return array
 */
function treeSort(array $list): array
{
    $tree = new SplMinHeap();
    foreach ($list as $n) {
        $tree->insert($n);
    }
    $list = [];
    while ($tree->valid()) {
        $list[] = $tree->top();
        $tree->next();
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
    $list = treeSort($list);
    echo 'Список после сортировки: ' . implode(', ', $list);

}
