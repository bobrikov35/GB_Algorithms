# 4. Пользователь вводит две буквы. Определить, на каких местах алфавита они стоят, и сколько между ними находится букв.


print('Введите два символа от a до z')
a = ord(input('  первый символ: ').lower())
b = ord(input('  второй символ: ').lower())
if a > b:
    a, b = b, a

print(f'Символ {chr(a)} находится на позиции {a - 96}.')
print(f'Символ {chr(b)} находится на позиции {b - 96}.')
if b - a - 1 == -1:
    print(f'Это одна и та же буква')
else:
    print(f'Между ними {b - a - 1} символов.')
