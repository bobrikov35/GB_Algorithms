# 6. В одномерном массиве найти сумму элементов, находящихся между минимальным и максимальным элементами. Сами
# минимальный и максимальный элементы в сумму не включать.

import random


def input_int(msg):
    while True:
        try:
            _numb = int(input(msg))
        except ValueError:
            print('Необходимо ввести натуральное число, повторите ввод')
            continue
        if _numb < 1:
            print('Необходимо ввести натуральное число больше 0, повторите ввод')
            continue
        return _numb


n = input_int('Введите количество элементов в массиве: ')
array = [random.randint(1, 99) for _ in range(n)]
min_index = 0
max_index = 0
print(f'Массив: ', end='')
for i, n in enumerate(array):
    print(f'{n:>4}', end='')
    if array[min_index] > n:
        min_index = i
    if array[max_index] < n:
        max_index = i
print()
print(f'Минимальное число: {array[min_index]}')
print(f'Максимальное число: {array[max_index]}')
s = 0
if min_index == max_index:
    print('Минимальный и максимальный элемент - одно и то же число')
    start, end = min_index, max_index
elif abs(min_index - max_index) == 1:
    print('Между минимальным и максимальным числами нет других чисел')
    start, end = min_index, max_index
elif min_index < max_index:
    start, end = min_index, max_index
else:
    start, end = max_index, min_index
if abs(end - start) > 1:
    print('Числа между минимальным и максимальным: ', end='')
    for i in range(start + 1, end):
        print(f'{array[i]:>4}', end='')
        s += array[i]
    print()
    print(f'Сумма этих чисел: {s}')
