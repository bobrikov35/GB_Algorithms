# Найти сумму n элементов следующего ряда чисел: 1, -0.5, 0.25, -0.125,… Количество элементов (n) вводится с
# клавиатуры.


def input_int(msg):
    while True:
        try:
            _numb = int(input(msg))
        except ValueError:
            print('Необходимо ввести натуральное число, повторите ввод')
            continue
        if _numb < 0:
            print('Необходимо ввести натуральное число, повторите ввод')
            continue
        return _numb


print('Сумма ряда чисел: 1, -0.5, 0.25, -0.125, ...')
n = input_int('Введите количество элементов ряда: ')
s = 0
val = 1
for i in range(n):
    s += val
    val /= -2
print(f'Сумма ряда из {n} чисел: {s}')
