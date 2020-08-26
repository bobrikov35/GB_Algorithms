# Сформировать из введенного числа обратное по порядку входящих в него цифр и вывести на экран. Например, если введено
# число 3486, надо вывести 6843.


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


print('Реверс числа')
n = input_int('Введите натуральное число: ')
revers_n = 0
while n > 0:
    revers_n = revers_n * 10 + n % 10
    n //= 10
print(f'Перевернутое число {revers_n}')
