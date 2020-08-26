# 2. Написать два алгоритма нахождения i-го по счету простого числа. Функция нахождения простого числа должна принимать
# на вход натуральное и возвращать соответствующее простое число. Проанализировать скорость и сложность алгоритмов.
# Первый - с помощью алгоритма "Решето Эратосфена".
# Примечание. Алгоритм "Решето Эратосфена" разбирался на одном из прошлых уроков. Используйте этот код и попробуйте его
# улучшить/оптимизировать под задачу.
# Второй - без использования "Решета Эратосфена".
# Примечание. Вспомните классический способ проверки числа на простоту.

import random
import timeit
import sys


PRIME_DICTIONARY = (2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101)


def __check_dictionary(n):
    if n < 2:
        return 0
    for prime in PRIME_DICTIONARY:
        if n == prime:
            return 1
        if n % prime == 0:
            return 0
    return -1


def is_prime_fast():
    prime = __check_dictionary(n)
    if prime == 0:
        return False
    if prime == 1:
        return True
    max_dict = PRIME_DICTIONARY[len(PRIME_DICTIONARY) - 1]
    if max_dict % 2 == 0:
        next_num = max_dict + 3
    else:
        next_num = max_dict + 2
    while next_num * next_num <= n:
        if n % next_num == 0:
            return False
        next_num += 2
    return True


def is_prime_sieve():
    if n in (2, 3, 5):
        return True
    if n < 2 or n % 2 == 0 or n % 3 == 0 or n % 5 == 0:
        return False
    nums = [True for _ in range(n + 1)]
    nums[0] = nums[1] = False
    for i in range(2, n + 1, 2):
        nums[i] = False
    for i in range(3, n + 1, 2):
        if nums[i]:
            for j in range(i * 2, n + 1, i):
                if nums[j]:
                    nums[j] = False
            if not nums[n]:
                return False
    return nums[n]


def progress_bar(cur, total, bar_len=60):
    percent = float(cur) / total
    hashes = '#' * int(round(percent * bar_len))
    spaces = ' ' * (bar_len - len(hashes))
    sys.stdout.write("\rВыполнение: [{0}] {1}%".format(hashes + spaces, int(round(percent * 100))))
    sys.stdout.flush()


loops = 100
times = [[], []]
numbers = []
for i in range(1, loops):
    rand = random.randint(55555, 99999)
    if rand % 2 == 0:
        rand += 1
    numbers.append(rand)

bar_total = sum(numbers)
bar_cur = 0
progress_bar(bar_cur, bar_total)

for n in numbers:
    times[0].append(timeit.timeit(stmt=is_prime_fast, number=100) * 10)
    times[1].append(timeit.timeit(stmt=is_prime_sieve, number=100) * 10)
    bar_cur += n
    progress_bar(bar_cur, bar_total)

print()
print()
print('Результаты:')
print(f'{"is_prime_fast":>32}', end='')
print(f'{"is_prime_sieve":>22}')
print(f'{"Число":>10}', end='')
print(f'{"время":>18}', end='')
print(f'{"время":>22}')
for i in range(len(numbers)):
    print(f'{numbers[i]:>10}', end='')
    print(f'{("%.5f" % times[0][i]):>18} мс', end='')
    print(f'{("%.5f" % times[1][i]):>19} мс', end='')
    if times[0][i] < times[1][i]:
        print('         is_prime_fast')
    else:
        print('         is_prime_sieve')
