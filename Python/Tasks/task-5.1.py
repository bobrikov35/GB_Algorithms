# 1. Пользователь вводит данные о количестве предприятий, их наименования и прибыль за четыре квартала для каждого
# предприятия. Программа должна определить среднюю прибыль (за год для всех предприятий) и отдельно вывести наименования
# предприятий, чья прибыль выше среднего и ниже среднего.

from collections import defaultdict, OrderedDict


def input_int(msg):
    while True:
        try:
            _num = int(input(msg))
        except ValueError:
            print('Необходимо ввести натуральное число, повторите ввод')
            continue
        if _num < 2:
            print('Необходимо ввести натуральное число больше единицы, повторите ввод')
            continue
        return _num


def input_profit(msg):
    while True:
        try:
            _profit = float(input(msg))
        except ValueError:
            print('Необходимо ввести действительное число, повторите ввод')
            continue
        if _profit < 0:
            print('Необходимо ввести действительное число больше нуля, повторите ввод')
            continue
        return _profit


def input_string(msg):
    while True:
        _name = input(msg)
        if len(_name) < 2:
            print('В названии предприятия должно быть как минимум 2 символа, повторите ввод')
            continue
        if _name in factories.keys():
            print('Это предприятие уже добавлено в список, повторите ввод')
            continue
        return _name


factories = defaultdict(list)
n = input_int('Введите количество предприятий (минимум 2): ')
for i in range(n):
    print()
    name = input_string('Введите название предприятия (минимум 2 символа): ')
    print(f'Введите прибыль предприятия "{name}" (в млн. руб.)')
    for q in range(1, 5):
        profit = input_profit(f'  за {q} квартал: ')
        factories[name].append(profit)

s = 0
for name, profit in factories.items():
    s += sum(profit)
avg = s / n
print()
print(f'Средняя прибыль за год среди всех предприятий: {avg} млн. руб.')
print()
factories_order = OrderedDict(sorted(factories.items(), key=lambda factory: sum(factory[1]), reverse=True))

more = less = False
for name, profit in factories_order.items():
    s = sum(profit)
    if not more and s > avg:
        print('Предприятия с прибылью выше среднего:')
        more = True
    elif not less and s < avg:
        print('Предприятия с прибылью ниже среднего:')
        less = True
    print(f' {name}: {s} млн. руб.')
