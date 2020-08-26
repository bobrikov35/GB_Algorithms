# Посчитать четные и нечетные цифры введенного натурального числа. Например, если введено число 34560, в нем 3 четные
# цифры (4, 6 и 0) и 2 нечетные (3 и 5).


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


print('Калькулятор четных и нечетных цифр натурального числа')
n = input_int('Введите натуральное число: ')
even = sum_even = 0
odd = sum_odd = 0
while n > 0:
    d = n % 10
    n //= 10
    if d % 2 == 0:
        even += 1
        sum_even += d
    else:
        odd += 1
        sum_odd += d
print(f'Количество четных чисел {even}, их сумма: {sum_even}')
print(f'Количество нечетных чисел {odd}, их сумма: {sum_odd}')
