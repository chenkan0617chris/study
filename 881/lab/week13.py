# file_name = input('Enter student file name: ')
# first_column_width = input('Enter 1st column length: ')
# second_column_width = input('Enter 2nd column length: ')
# third_column_width = input('Enter 3rd column length: ')

# with open(file_name, 'r') as student_list:
#     template = '{0:>' + first_column_width + '}{1:>' + second_column_width + '}{2:>' + third_column_width + '}'


#     print(template.format('Student Number', 'First Name', 'Last Name'))

#     while True:
#         number = student_list.readline().rstrip()
#         first_name = student_list.readline().rstrip()
#         last_name = student_list.readline().rstrip()
#         if number == '':
#             break
#         else:
#             print(template.format(number, first_name, last_name))

import csv

file_name = input('Enter subject file name: ')

first_column_width = input('Enter 1st column length: ')
second_column_width = input('Enter 2nd column length: ')
third_column_width = input('Enter 3rd column length: ')

with open(file_name, 'r') as subject_file:

    reader = csv.DictReader(subject_file)
    template = '{0:<' + first_column_width + '}{1:^' + second_column_width + '}{2:>' + third_column_width + '}'
    print(template.format('Code', 'Name', 'CP'))

    for row in reader:
        code = row.get('code')
        name = row.get('name')
        cp = row.get('cp')
        print(template.format(code, name, cp))

