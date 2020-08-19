<?php


class Search
{

    /**
     * Возвращает ключ элемента в массиве (поиск по порядку)
     *
     * @param array $list
     * @param int $item
     * @return int
     */
    public static function simpleSearch(array $list, int $item): int
    {
        foreach ($list as $key => $el) {
            if ($el == $item) {
                return $key;
            }
        }
        return -1;
    }

    /**
     * Возвращает номер элемента в массиве (бинарный поиск)
     *
     * @param array $list - отсортированный по возрастанию
     * @param int $item
     * @return int
     */
    public static function binarySearch(array $list, int $item): int
    {
        $low = 0;
        $high = count($list) - 1;
        if ($item > $list[$high] or $item < $list[$low]) {
            return -1;
        }
        while ($low <= $high) {
            $middle = (int)(($high - $low) / 2 + $low);
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

}
