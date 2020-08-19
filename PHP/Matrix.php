<?php


class Matrix
{

    private int $cols;
    private int $rows;
    private array $matrix = [];


    public function __construct(int $cols, int $rows)
    {
        $this->setSize($cols, $rows);
    }

    public function setSize(int $cols, int $rows)
    {
        $this->cols = $cols;
        $this->rows = $rows;
        $this->init();
    }

    public function getTable(): array
    {
        return $this->matrix;
    }

    /**
     * Инициализация матрицы
     */
    private function init(): void
    {
        $this->matrix = [];
        if ($this->cols < 1 or $this->rows < 1) {
            return;
        }
        for ($i = 1; $i <= $this->rows; $i++) {
            for ($j = 1; $j <= $this->cols; $j++) {
                $this->matrix[$i][$j] = null;
            }
        }
    }

    /**
     * Возвращает матрицу, заполненную по спирали
     */
    public function fillSpiral(): void
    {
        $this->init();
        if (empty($this->matrix)) {
            return;
        }
        $first = 1;
        $size = $this->cols * $this->rows;
        $dec = 0;
        $i = 1;
        while ($i <= $size) {
            // Первый столбец
            $i = $this->fillColumn($i, $first + $dec, $first + $dec, $this->rows - $dec);
            // Последняя строка
            $i = $this->fillRow($i, $this->rows - $dec, $first + $dec, $this->cols - $dec);
            // Последний столбец
            $i = $this->fillColumn($i, $this->cols - $dec, $this->rows - $dec, $first + $dec, true);
            // Первая строка
            $i = $this->fillRow($i, $first + $dec, $this->cols - $dec, $first + $dec, true);
            if ($first + $dec >= $this->cols - $dec and $first + $dec >= $this->rows - $dec) {
                $this->setItem($i++, $first + $dec, $first + $dec);
            }
            $dec++;
        }
    }

    /**
     * Заполняет ячейку матрицы
     *
     * @param int $n
     * @param int $x
     * @param int $y
     */
    private function setItem(int $n, int $x, int $y): void
    {
        if (key_exists($y, $this->matrix) or key_exists($x, $this->matrix[$y])) {
            $this->matrix[$y][$x] = $n;
        }
    }

    /**
     * Заполняет строку и возвращает следующий номер
     *
     * @param int $n
     * @param int $row
     * @param int $start
     * @param int $stop
     * @param bool $revers
     * @return int
     */
    private function fillRow(int $n, int $row, int $start, int $stop, bool $revers = false): int
    {
        if ($revers) {
            for ($i = $start; $i > $stop; $i--) {
                if (isset($this->matrix[$row][$i])) break;
                $this->matrix[$row][$i] = $n++;
            }
            return $n;
        }
        for ($i = $start; $i < $stop; $i++) {
            if (isset($this->matrix[$row][$i])) break;
            $this->matrix[$row][$i] = $n++;
        }
        return $n;
    }

    /**
     * Заполняет столбец и возвращает следующий номер
     *
     * @param int $n
     * @param int $column
     * @param int $start
     * @param int $stop
     * @param bool $revers
     * @return int
     */
    private function fillColumn(int $n, int $column, int $start, int $stop, bool $revers = false): int
    {
        if ($revers) {
            for ($i = $start; $i > $stop; $i--) {
                if (isset($this->matrix[$i][$column])) break;
                $this->matrix[$i][$column] = $n++;
            }
            return $n;
        }
        for ($i = $start; $i < $stop; $i++) {
            if (isset($this->matrix[$i][$column])) break;
            $this->matrix[$i][$column] = $n++;
        }
        return $n;
    }

}
