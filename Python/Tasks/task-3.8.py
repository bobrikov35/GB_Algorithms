# 8. Матрица 5x4 заполняется вводом с клавиатуры, кроме последних элементов строк. Программа должна вычислять сумму
# введенных элементов каждой строки и записывать ее в последнюю ячейку строки. В конце следует вывести полученную
# матрицу.


def input_int(msg):
    while True:
        try:
            _num = int(input(msg))
        except ValueError:
            print('Необходимо ввести натуральное число, повторите ввод.')
            continue
        if _num < 1 or _num > 99:
            print('Необходимо ввести натуральное число до 99, повторите ввод.')
            continue
        return _num


print('Введите 16 элементов матрицы')
matrix = [[], [], [], []]
for i in range(4):
    s = 0
    for j in range(4):
        n = input_int('Введите натуральное число: ')
        matrix[i].append(n)
        s += n
    matrix[i].append(s)
print('Матрица:')
for i in range(4):
    for j in range(5):
        print(f'{matrix[i][j]:>4}', end='')
    print()
