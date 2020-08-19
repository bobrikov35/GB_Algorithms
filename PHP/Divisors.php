<?php


class Divisors
{

    private const PRIME_DICTIONARY = [
        2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103, 107,
        109, 113, 127, 131, 137, 139, 149, 151, 157, 163, 167, 173, 179, 181, 191, 193, 197, 199, 211, 223, 227, 229,
        233, 239, 241, 251, 257, 263, 269, 271, 277, 281, 283, 293, 307, 311, 313, 317, 331, 337, 347, 349, 353, 359,
        367, 373, 379, 383, 389, 397, 401, 409, 419, 421, 431, 433, 439, 443, 449, 457, 461, 463, 467, 479, 487, 491,
        499, 503, 509, 521, 523, 541, 547, 557, 563, 569, 571, 577, 587, 593, 599, 601, 607, 613, 617, 619, 631, 641,
        643, 647, 653, 659, 661, 673, 677, 683, 691, 701, 709, 719, 727, 733, 739, 743, 751, 757, 761, 769, 773, 787,
        797, 809, 811, 821, 823, 827, 829, 839, 853, 857, 859, 863, 877, 881, 883, 887, 907, 911, 919, 929, 937, 941,
        947, 953, 967, 971, 977, 983, 991, 997, 1009, 1013, 1019, 1021, 1031, 1033, 1039, 1049, 1051, 1061, 1063, 1069,
    ];

    private int $maxDictionary;
    private int $number;

    /**
     * Divisors constructor
     * @param int $n
     */
    public function __construct($n = 600851475143)
    {
        $max = max(static::PRIME_DICTIONARY);
        $this->maxDictionary = $max % 2 == 0 ? $max + 1 : $max;
        $this->number = abs($n);
    }

    /**
     * @param int $n
     */
    public function setNumber(int $n): void
    {
        $this->number = abs($n);
    }

    /**
     * Проверка числа на простоту
     *
     * @param int $n
     * @return bool
     */
    public function isPrime(int $n)
    {
        $prime = $this->checkDictionary($n);
        if (isset($prime)) {
            return $prime;
        }
        for ($d = $this->maxDictionary + 2; $d * $d <= $n; $d += 2) {
            if ($n % $d == 0) {
                return false;
            }
        }
        return true;
    }

    /**
     * Сверка числа со словарем простых чисел
     *
     * @param $n
     * @return bool|null
     */
    private function checkDictionary($n)
    {
        if ($n < 2) {
            return false;
        }
        $quantity = count(static::PRIME_DICTIONARY);
        for ($i = 0; $i < $quantity; $i++) {
            if ($n == static::PRIME_DICTIONARY[$i]) {
                return true;
            }
            if ($n % static::PRIME_DICTIONARY[$i] == 0) {
                return false;
            }
        }
        return null;
    }

    /**
     * Поиск всех натуральных делителей числа
     *
     * @return array
     */
    public function findNaturals(): array
    {
        $divisors = [];
        $factors = $this->calcFactors();
        $this->multiply($divisors, $factors, 1);
        $divisors = array_unique($divisors);
        sort($divisors);
        if ($divisors[count($divisors)-1] == $this->number) {
            unset($divisors[count($divisors)-1]);
        }
        return $divisors;
    }

    /**
     * @return array
     */
    private function calcFactors(): array
    {
        $decomposeFactors = [];
        foreach ($this->decomposeFactors() as $n) {
            if (empty($decomposeFactors[$n])) {
                $decomposeFactors[$n] = 1;
                continue;
            }
            $decomposeFactors[$n]++;
        }
        $divisors = [];
        foreach ($decomposeFactors as $n => $degree) {
            $powList = [];
            for ($i = 0; $i <= $degree; $i++) {
                $powList[] = pow($n, $i);
            }
            $divisors[] = $powList;
        }
        return $divisors;
    }

    /**
     * @return array
     */
    private function decomposeFactors(): array
    {
        $n = $this->number;
        $factors = [];
        for ($i = 2; $i * $i <= $n; $i++) {
            if ($n % $i == 0) {
                $n /= $i;
                $factors[] = $i;
                $i = 1;
            }
        }
        if ($n > 1) {
            $factors[] = $n;
        }
        return $factors;
    }

    /**
     * @param array $naturals
     * @param array $divisors
     * @param int $t
     * @param int $carry
     */
    private function multiply(array &$naturals, array &$divisors, int $t, int $carry = 1)
    {
        foreach ($divisors[$t-1] as $number) {
            if ($t == count($divisors)) {
                $naturals[] = $carry * $number;
                continue;
            }
            $this->multiply($naturals, $divisors, $t + 1, $carry * $number);
        }
    }

    /**
     * @return array
     */
    public function findPrimes(): array
    {
        $n = $this->number;
        $primeDivisors = $n % 2 == 0 ? [2] : [];
        for ($i = 3; $i * $i <= $n; $i += 2) {
            if ($n % $i == 0) {
                $n /= $i;
                $primeDivisors[] = $i;
            }
        }
        for ($i = 2; $i * $i <= $n; $i++) {
            if ($n % $i == 0) {
                $n /= $i;
                if ($this->isPrime($n)) {
                    break;
                }
                $i = 1;
            }
        }
        if ($n > 1 and $this->isPrime($n)) {
            $primeDivisors[] = $n;
        }
        $primeDivisors = array_unique($primeDivisors);
        sort($primeDivisors);
        if ($primeDivisors[count($primeDivisors)-1] == $this->number) {
            unset($primeDivisors[count($primeDivisors)-1]);
        }
        return array_unique($primeDivisors);
    }

}
