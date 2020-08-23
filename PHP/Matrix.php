<?php


/**
 * Инициализация матрицы
 *
 * @param int $cols
 * @param int $rows
 * @return array
 */
function __initMatrix(int $cols, int $rows): array
{
    $matrix = [];
    if ($cols < 1 or $rows < 1) {
        return $matrix;
    }
    for ($i = 1; $i <= $rows; $i++) {
        for ($j = 1; $j <= $cols; $j++) {
            $matrix[$i][$j] = null;
        }
    }
    return $matrix;
}


/**
 * Возвращает матрицу, заполненную по спирали
 *
 * @param int $cols
 * @param int $rows
 * @return array
 */
function spiralMatrix(int $cols, int $rows): array
{
    if (empty($matrix = __initMatrix($cols, $rows))) {
        return $matrix;
    }
    $size = $cols * $rows;
    $dec = 0;
    $n = 1;
    while ($n <= $size) {
        for ($i = 1 + $dec; $i < $rows - $dec; $i++) {
            if (isset($matrix[$i][1 + $dec])) break;
            $matrix[$i][1 + $dec] = $n++;
        }
        for ($i = 1 + $dec; $i < $cols - $dec; $i++) {
            if (isset($matrix[$rows - $dec][$i])) break;
            $matrix[$rows - $dec][$i] = $n++;
        }
        for ($i = $rows - $dec; $i > 1 + $dec; $i--) {
            if (isset($matrix[$i][$cols - $dec])) break;
            $matrix[$i][$cols - $dec] = $n++;
        }
        for ($i = $cols - $dec; $i > 1 + $dec; $i--) {
            if (isset($matrix[1 + $dec][$i])) break;
            $matrix[1 + $dec][$i] = $n++;
        }
        if (1 + $dec >= $cols - $dec and 1 + $dec >= $rows - $dec) {
            $matrix[1 + $dec][1 + $dec] = $n++;
        }
        $dec++;
    }
    return $matrix;
}


$test = false;

if ($test) {

    $cols = 6;
    $rows = 5;

    $matrix = spiralMatrix($cols, $rows);
    if (empty($matrix)) {
        echo 'Выбран недопустимый размер матрицы'. PHP_EOL;
    } else {
        echo "Матрица [{$rows}, {$cols}], заполненная по спирали:" . PHP_EOL;
        foreach ($matrix as $row) {
            foreach ($row as $value) {
                printf("%6d", $value);
            }
            echo PHP_EOL;
        }
    }

}
