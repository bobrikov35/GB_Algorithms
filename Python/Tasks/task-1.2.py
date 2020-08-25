# 2. По введенным пользователем координатам двух точек вывести уравнение прямой вида y = kx + b, проходящей через эти
# точки.


print('Введите координату точки A')
Ax = int(input('x: '))
Ay = int(input('y: '))

print('Введите координату точки B')
Bx = int(input('x: '))
By = int(input('y: '))

if Ay == By and Ax == Bx:
    print(f'Точки совпали')
elif Ax == Bx and Ay != By:
    print(f'Прямая паралельна оси y')
elif Ay == By:
    print(f'Уравнение: y = {Ay}')
else:
    k = (By - Ay) / (Bx - Ax)
    b = round(Ay - k * Ax, 3)
    k = round(k, 3)
    print(f'k: {k}')
    print(f'b: {b}')
    print(f'Уравнение: y = {k}*x + {b}')
