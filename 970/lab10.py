import re

log_file = input('input your log file: ')

file = open(log_file, "r")

pattern = r'\d+\.\d+\.\d+\.\d+'

while True:
    line = file.readline()
    if not line:
        break
    s = re.search(pattern, line)
    if s:
        print(s.group())

file.close()
