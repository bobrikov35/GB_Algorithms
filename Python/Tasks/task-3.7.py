# 7. В одномерном массиве целых чисел определить два наименьших элемента. Они могут быть как равны между собой (оба
# минимальны), так и различаться.

import random


def input_int(msg):
    while True:
        try:
            _numb = int(input(msg))
        except ValueError:
            print('Необходимо ввести натуральное число, повторите ввод')
            continue
        if _numb < 2:
            print('Необходимо ввести натуральное число больше 1, повторите ввод')
            continue
        return _numb


n = input_int('Введите количество элементов в массиве: ')
array = [random.randint(1, 99) for _ in range(n)]
if array[0] > array[1]:
    min_array = [1, 0]
else:
    min_array = [0, 1]
print(f'Массив: ', f'{array[0]:>4}', f'{array[1]:>4}', end='')
for i in range(2, len(array)):
    print(f'{array[i]:>4}', end='')
    if array[min_array[1]] <= array[i]:
        continue
    if array[min_array[0]] <= array[i]:
        min_array[1] = i
    else:
        min_array[0], min_array[1] = i, min_array[0]
print()
print(f'Минимальные числа: {min_array[0]} - {array[min_array[0]]:<4}, {min_array[1]} - {array[min_array[1]]:<4}')
