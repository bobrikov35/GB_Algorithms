<?php


const PRIME_DICTIONARY = [
    2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103, 107,
    109, 113, 127, 131, 137, 139, 149, 151, 157, 163, 167, 173, 179, 181, 191, 193, 197, 199, 211, 223, 227, 229,
    233, 239, 241, 251, 257, 263, 269, 271, 277, 281, 283, 293, 307, 311, 313, 317, 331, 337, 347, 349, 353, 359,
    367, 373, 379, 383, 389, 397, 401, 409, 419, 421, 431, 433, 439, 443, 449, 457, 461, 463, 467, 479, 487, 491,
    499, 503, 509, 521, 523, 541, 547, 557, 563, 569, 571, 577, 587, 593, 599, 601, 607, 613, 617, 619, 631, 641,
    643, 647, 653, 659, 661, 673, 677, 683, 691, 701, 709, 719, 727, 733, 739, 743, 751, 757, 761, 769, 773, 787,
    797, 809, 811, 821, 823, 827, 829, 839, 853, 857, 859, 863, 877, 881, 883, 887, 907, 911, 919, 929, 937, 941,
    947, 953, 967, 971, 977, 983, 991, 997, 1009, 1013, 1019, 1021, 1031, 1033, 1039, 1049, 1051, 1061, 1063, 1069,
];


/**
 * Сверяет число со словарем простых чисел
 *
 * @param int $n
 * @return bool|null
 */
function __checkDictionary(int $n)
{
    if ($n < 2) {
        return false;
    }
    foreach (PRIME_DICTIONARY as $prime) {
        if ($n == $prime) {
            return true;
        }
        if ($n % $prime == 0) {
            return false;
        }
    }
    return null;
}


/**
 * Проверяет число на простоту
 *
 * @param int $n
 * @return bool
 */
function isPrime(int $n): bool
{
    $prime = __checkDictionary($n);
    if (isset($prime)) {
        return $prime;
    }
    $max = max(PRIME_DICTIONARY);
    $nextNumber = $max % 2 == 0 ? $max + 3 : $max + 2;
    for ($i = $nextNumber; $i * $i <= $n; $i += 2) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}


/**
 * @param int $n
 * @param array $dict
 */
function __addToDictionary(int $n, array &$dict): void
{
    if (isset($dict[$n])) {
        $dict[$n]++;
    } else {
        $dict[$n] = 1;
    }
}


/**
 * @param int $n
 * @return array
 */
function __findFactors(int $n): array
{
    $factorsDict = [];
    $i = 2;
    while ($i * $i <= $n) {
        if ($n % $i == 0) {
            __addToDictionary($i, $factorsDict);
            $n /= $i;
            $factors[] = $i;
            $i = 1;
        }
        $i++;
    }
    if ($n > 1) {
        __addToDictionary($n, $factorsDict);
    }
    $factors = [];
    foreach ($factorsDict as $factor => $degree) {
        $degrees = [];
        for ($i = 0; $i <= $degree; $i++) {
            $degrees[] = pow($factor, $i);
        }
        $factors[] = $degrees;
    }
    return $factors;
}


/**
 * @param array $divisors
 * @param array $factors
 * @param int $t
 * @param int $carry
 */
function __calcDivisors(array &$divisors, array $factors, int $t, int $carry = 1): void
{
    foreach ($factors[$t-1] as $n) {
        $multiply = $carry * $n;
        if ($t < count($factors)) {
            __calcDivisors($divisors, $factors, $t + 1, $multiply);
            continue;
        }
        if (!in_array($multiply, $divisors)) {
            $divisors[] = $multiply;
        }
    }
}


/**
 * Возвращает все натуральные делители числа
 *
 * @param int $n
 * @return array
 */
function naturalsDivisors(int $n): array
{
    $divisors = [];
    $factors = __findFactors($n);
    __calcDivisors($divisors, $factors, 1);
    sort($divisors);
    if ($divisors[count($divisors) - 1] == $n) {
        unset($divisors[count($divisors) - 1]);
    }
    return $divisors;
}


/**
 * Возвращает все простые делители числа
 *
 * @param int $n
 * @return array
 */
function primesDivisors(int $n): array
{
    $numb = $n;
    $divisors = [];
    if ($numb % 2 == 0) {
        $numb /= 2;
        $divisors[] = 2;
    }
    for ($i = 3; $i * $i <= $numb; $i += 2) {
        if ($numb % $i == 0) {
            $numb /= $i;
            $divisors[] = $i;
        }
    }
    for ($i = 2; $i * $i <= $numb; $i++) {
        if ($numb % $i == 0) {
            $numb /= $i;
            $i = 1;
        }
    }
    if ($numb > 1 and isPrime($numb)) {
        $divisors[] = $numb;
    }
    sort($divisors);
    if ($divisors[count($divisors) - 1] == $n) {
        unset($divisors[count($divisors) - 1]);
    }
    return $divisors;
}


$test = true;

if ($test) {

    $n = 600851475143;

    echo 'Поиск простых делителей:' . PHP_EOL;
    echo implode(', ', primesDivisors($n)) . PHP_EOL;

}
