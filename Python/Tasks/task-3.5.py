# 5. В массиве найти максимальный отрицательный элемент. Вывести на экран его значение и позицию в массиве.
# Примечание к задаче: пожалуйста не путайте "минимальный" и "максимальный отрицательный". Это два абсолютно разных
# значения.

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
array = [random.randint(-99, 99) for _ in range(n)]
print('Массив: ', end='')
max_index = 0
for i, n in enumerate(array):
    print(f'{n:>4}', end='')
    if array[max_index] < n < 0:
        max_index = i
print()
if array[max_index] < 0:
    print(f'Максимальный отрицательный элемент в массиве {array[max_index]} находится на позиции {max_index}')
else:
    print('В массиве нет отрицательных чисел')
