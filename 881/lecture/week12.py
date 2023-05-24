# file_name = 'woodchuck.txt'

# with open(file_name, 'r') as woodchuck:
#     while True:
#         line = woodchuck.readline()
#         if line == '':
#             break
#         print(line.strip())

import csv

file_name = 'subject.csv'

with open(file_name) as subject:

    reader = csv.DictReader(subject)

    for row in reader:
        code = row.get('code')
        name = row.get('name')
        cp = row.get('cp')

        print(f'{code}: {name} ({cp}cp)')





    