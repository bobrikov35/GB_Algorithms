# 2. Во втором массиве сохранить индексы четных элементов первого массива. Например, если дан массив со значениями 8, 3,
# 15, 6, 4, 2, второй массив надо заполнить значениями 0, 3, 4, 5 (помните, что индексация начинается с нуля), т. к.
# именно в этих позициях первого массива стоят четные числа.

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


n = input_int('Введите количество элементов: ')
array = (random.randint(1, 99) for _ in range(n))
keys_even = list()
print(f'Массив:   ', end='')
for key, n in enumerate(array):
    print(f'{key}: {n:<5}', end='')
    if n % 2 == 0:
        keys_even.append(key)
print()
print(f'Индексы четных чисел: ', end='')
for n in keys_even:
    print(f'{n:>4}', end='')
print()
