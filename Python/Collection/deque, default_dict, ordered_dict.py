from collections import OrderedDict, defaultdict, deque


N = 3000
with open('log.txt', 'r', encoding='utf-8') as file:
    log = deque(file, N)
spam = defaultdict(int)
for item in log:
    ip = item[:-1]
    if not ip.startswith('192.168'):
        spam[ip] += 1
data = OrderedDict(sorted(spam.items()))
with open('data.txt', 'w', encoding='utf-8') as file:
    for key, value in data.items():
        file.write(f'{key:<16} => {value}\n')
