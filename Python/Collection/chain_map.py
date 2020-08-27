import argparse
from collections import ChainMap


defaults = {'ip': 'localhost', 'port': 7777}
print(f'По умолчанию: {defaults}')
parser = argparse.ArgumentParser()
parser.add_argument('-i', '--ip')
parser.add_argument('-p', '--port')
args = {key: item for key, item in vars(parser.parse_args()).items() if item}
print(f'Текущие настройки: {args}')
settings = ChainMap(args, defaults)
print(f'Настройки: {settings}')
print(f'  ip: {settings["ip"]}')
print(f'  port: {settings["port"]}')
