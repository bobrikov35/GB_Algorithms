<?php

include_once 'Matrix.php';
include_once 'BracketsParser.php';
include_once 'Divisors.php';
include_once 'Search.php';


$testMatrix = true;
$testBracketsParser = false;
$testDivisors = false;
$testSearch = false;


/**
 * П Р А К Т И Ч Е С К О Е   З А Д А Н И Е   № 2
 */

/**
 * 1. Определить сложность следующих алгоритмов:
 *    - Поиск элемента массива с известным индексом         => O(1)
 *    - Дублирование одномерного массива через foreach      => O(n)
 *    - Рекурсивная функция нахождения факториала числа     => O(n)
 *    - Удаление элемента массива с известным индексом      => O(1)
 */

/**
 * 2.Определить сложность следующих алгоритмов. Сколько произойдет итераций?
 */

// 1)
// $n = 10000;
// $array[] = [];
// for ($i = 0; $i < $n; $i++) {                            // n-итераций
//     for ($j = 1; $j < $n; $j *= 2) {                     // log(n)-итераций
//         $array[$i][$j]= true;
//     }
// }
//                                                          Сложность: O(n log(n))

// 2)
// $n = 10000;
// $array[] = [];
// for ($i = 0; $i < $n; $i += 2) {                         // n/2-итераций
//     for ($j = $i; $j < $n; $j++) {                       // n/2-итераций
//         $array[$i][$j]= true;
//     }
// }
//                                                          Сложность: O(n)

if ($testMatrix) {

    $cols = 5;
    $rows = 4;

    $matrix = new Matrix($cols, $rows);
    $matrix->fillSpiral();
    if (empty($matrix->getTable())) {
        echo 'Выбран недопустимый размер матрицы'. PHP_EOL;
    } else {
        echo "Матрица [{$rows}, {$cols}], заполненная по спирали:" . PHP_EOL;
        foreach ($matrix->getTable() as $row) {
            foreach ($row as $value) {
                printf("%6d", $value);
            }
            echo PHP_EOL;
        }
    }

}


if ($testBracketsParser) {

    $list = [
        '"Это тестовый вариант проверки (задачи со скобками). И вот еще скобки: {[][()]}"',     // => true
        '((a + b)/ c) - 2',                                                                     // => true
        '"([строка)"',                                                                          // => true
        '"(")',                                                                                 // => false
        '"} {" ({[нет] ({})}ошибки)',                                                           // => true
        '} { ({[это] ({})}ошибка',                                                              // => false
    ];

    echo 'Соответствие скобок в строках:' . PHP_EOL;
    foreach ($list as $s) {
        if (BracketsParser::verify($s)) {
            echo "{$s} => соответствует" . PHP_EOL;
        } else {
            echo "{$s} => не соответствует" . PHP_EOL;
        }
    }

}


if ($testDivisors) {

    $n = 600851475143;
    $divisors = new Divisors($n);

    echo 'Поиск простых делителей: ' . PHP_EOL;
    echo implode(', ', $divisors->findPrimes()) . PHP_EOL;

    $start = microtime(true);
    $primes = [];
    $naturals = $divisors->findNaturals();
    $count = count($naturals);
    for ($i = 0; $i < $count; $i++) {
        if ($divisors->isPrime($naturals[$i])) {
            $primes[] = $naturals[$i];
        }
    }
    echo 'Поиск всех натуральных делителей с выборкой простых: ' . (microtime(true) - $start) . ' сек.' . PHP_EOL;

    $start = microtime(true);
    $divisors->findPrimes();
    echo 'Поиск только простых делителей: ' . (microtime(true) - $start) . ' сек.' . PHP_EOL;

}


if ($testSearch) {

    $n = 9999999;
    $list = [];
    for ($i = 1; $i <= $n; $i++) {
        $list[] = $i;
    }
    $item = random_int( (int)(1 - $n / 10) ,  (int)($n + $n / 10) );

    $time = microtime(true);
    $find = Search::binarySearch($list, $item);
    $time = microtime(true) - $time;
    echo "Бинарный поиск выполнен за {$time} сек." . PHP_EOL;

    $time = microtime(true);
    $find = Search::simpleSearch($list, $item);
    $time = microtime(true) - $time;
    echo "Поиск по порядку выполнен за {$time} сек." . PHP_EOL;

    if ($find >= 0) {
        echo "Число {$item} в массиве [1, {$n}] находится на позиции {$find}" . PHP_EOL;
    } else {
        echo "Число {$item} отсутствует в массиве [1, {$n}]" . PHP_EOL;
    }

}
