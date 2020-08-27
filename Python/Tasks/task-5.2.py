# 2. Написать программу сложения и умножения двух шестнадцатеричных чисел. При этом каждое число представляется как
# массив, элементы которого - цифры числа.
# Например, пользователь ввел A2 и C4F. Нужно сохранить их как ["A", "2"] и ["C", "4", "F"] соответственно. Сумма чисел
# из примера: ["C", "F", "1"], произведение - ["7", "C", "9", "F", "E"].
# Примечание: Если воспользоваться функциями hex() и/или int() для преобразования систем счисления, задача решается в
# несколько строк. Для прокачки алгоритмического мышления такой вариант не подходит. Поэтому использование встроенных
# функций для перевода из одной системы счисления в другую в данной задаче под запретом.
# Вспомните начальную школу и попробуйте написать сложение и умножение в столбик.

from collections import deque


def input_hex_numb(msg):

    def check_hex(numb):
        if numb[0] == '-':
            numb = numb[1:]
        numb = numb.upper()
        for n in numb:
            if not (('0' <= n <= '9') or ('A' <= n <= 'F')):
                return False
        return True

    while True:
        s = input(msg)
        if check_hex(s):
            return deque(s.upper())
        else:
            print('Необходимо ввести число в шестнацатиричной системе счисления, повторите ввод')


def base2dec(base_deque, base=16):
    s = 0
    k = 1
    if base_deque[0] == '-':
        k = -1
        base_deque.popleft()
    while len(base_deque) > 0:
        n = base_deque.popleft()
        if '0' <= n <= '9':
            n = int(n)
        else:
            n = ord(n) - 55
        s = (s * base + n)
    return k * s


def dec2base(n, base=16):
    alphabet = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'
    k = 1
    if n < 0:
        k = -1
        n = abs(n)
    result = deque()
    while n > 0:
        x, y = divmod(n, base)
        result.appendleft(alphabet[y])
        n = x
    if k < 0:
        result.appendleft('-')
    return result


print('Введите два числа в шестнацатиричной системе счисления')
a = input_hex_numb('  первое число: ')
b = input_hex_numb('  второе число: ')
print()
print('Числа в шестнадцатиричной системе счисления поразрядно')
print(f'  первое число: {a}')
print(f'  второе число: {b}')
a = base2dec(a)
b = base2dec(b)
print('Числа в десятеричной системе счисления')
print(f'  первое число: {a}')
print(f'  второе число: {b}')
sum_dec = a + b
multiply_dec = a * b
print(f'Сумма: { sum_dec } | { dec2base(sum_dec) }')
print(f'Произведение: { multiply_dec } | { dec2base(multiply_dec) }')
