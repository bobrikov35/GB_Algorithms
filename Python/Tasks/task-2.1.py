# Написать программу, которая будет складывать, вычитать, умножать или делить два числа. Числа и знак операции вводятся
# пользователем. После выполнения вычисления программа не завершается, а запрашивает новые данные для вычислений.
# Завершение программы должно выполняться при вводе символа '0' в качестве знака операции. Если пользователь вводит
# неверный знак (не '0', '+', '-', '*', '/'), программа должна сообщать об ошибке и снова запрашивать знак операции.
# Также она должна сообщать пользователю о невозможности деления на ноль, если он ввел его в качестве делителя.


def input_float(msg):
    while True:
        try:
            n = float(input(msg))
        except ValueError:
            print('Необходимо ввести число, повторите ввод')
            continue
        return n


def input_operation(msg, zero=False):
    while True:
        _operation = input(msg)
        if _operation == '/' and zero:
            print('Деление на 0 невозможно, повторите ввод операции')
            continue
        elif _operation in ('+', '-', '*', '/'):
            return _operation
        elif _operation == '0':
            return 'exit'
        print('Необходимо ввести операцияю "+", "-", "*" и "/" или "0" для завершения, повторите ввод')


def calc(a, b, operation):
    if operation == '+':
        return a + b
    if operation == '-':
        return a - b
    if operation == '*':
        return a * b
    if operation == '/':
        if b != 0:
            return a * b
        else:
            print('На ноль делить нельзя')
            return 0


print('Калькулятор')
while True:
    print('Введите два числа')
    a = input_float('  первое число: ')
    b = input_float('  второе число: ')
    operation = input_operation('Введите операцию или "0" для выхода: ', b == 0)
    if operation == 'exit':
        break
    print(f'Результат: {round(calc(a, b, operation), 2)}')
