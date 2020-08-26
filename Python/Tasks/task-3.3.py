# 3. В массиве случайных целых чисел поменять местами минимальный и максимальный элементы.

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
    elif array[max_index] < n:
        max_index = i
print()
print(f'  индекс минимального числа: {min_index}')
print(f'  индекс максимального числа: {max_index}')
if array[min_index] != array[max_index]:
    array[min_index], array[max_index] = array[max_index], array[min_index]
    min_index, max_index = max_index, min_index
print(f'Измененный массив: ', end='')
for n in array:
    print(f'{n:>4}', end='')
print()
