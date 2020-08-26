# 1. В диапазоне натуральных чисел от 2 до 99 определить, сколько из них кратны каждому из чисел в диапазоне от 2 до 9.
# Примечание: 8 разных ответов.


def get_divisors(n, divisors=(2, 3, 4, 5, 6, 7, 8, 9)):
    result = list()
    for d in divisors:
        if n % d == 0:
            result.append(d)
    return result


start = 2
end = 99
numbers = {k: 0 for k in range(2, 10)}
print(f'В диапазоне натуральных чисел [{start}, {end}] кратны:')
for n in range(start, end + 1):
    for d in get_divisors(n):
        numbers[d] += 1
for key in numbers:
    print(f'  {key}: {numbers[key]}')
