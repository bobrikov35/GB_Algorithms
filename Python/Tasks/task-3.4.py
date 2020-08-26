# 4. Определить, какое число в массиве встречается чаще всего.

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
array = [random.randint(1, n // 2) for _ in range(n)]
counter = {}
print(f'Массив: ', end='')
for n in array:
    print(f'{n:>4}', end='')
    if n in counter:
        counter[n] += 1
    else:
        counter[n] = 1
print()
max_val = array[0]
for key in counter:
    if counter[max_val] < counter[key]:
        max_val = key
print(f'{max_val} встречается {counter[max_val]} раз(а)')
