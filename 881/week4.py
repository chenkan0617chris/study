# name = input('Enter name: ')
# age = int(input('Enter age: '))
# height = int(input('Enter height: '))
# shirt_color = input('Enter your shirt color: ')

# print('{0} is {1} years old, {2}cm tall with {3} shirt'.format(name, age, height, shirt_color))

# if((age >= 18 and age <= 30) and height <= 180 and (shirt_color == 'red' or shirt_color == 'blue')):
#     flag = 'CAN'
# else:
#     flag = 'CANNOT'

# print('{0} {1} join the party'.format(name, flag))

# for i in range(0, 21):
#     if(i % 2 == 0):
#         if(i == 20):
#             trailing = '.'
#         else:
#             trailing = ';'

#         print(i, end=trailing)


# import functools

# arr = [1,2,3]

# sum = functools.reduce(lambda a, b: a + b, arr)
# print(sum)


# sum = 0
# for i in range(1, 11):
#     print(i)
#     sum += i
# print(sum)

# for i in range(1, 6):
#     start_number = i * 2
#     for j in range(0, start_number):
#         print(start_number - j, end='')
#     print()

# number = int(input('Please enter a number (2-10): '))
# symbol = input('Please enter a symbol (?, -, *, +, $): ')

# for i in range(1, number + 1):
#     for j in range(0, i + 1):
#         if(j == 0):
#             print(i, end='')
#         else:
#             print(symbol, end='')
#     print()

# name = input('enter the stirng: ')

# head = name[0].upper()

# tail = name[len(name) - 1].upper()

# print(head)
# print(tail)

# name = 'welcome'

# print(name[0:1])

# number = int(input('Enter the number of items: '))

# if(number > 50):
#     postage = 0
#     single_price = 2
# else:
#     postage = 10
#     single_price = 3

# sub_total = number * single_price
# print()
# print('Receipt:\n{0} items x ${1} = ${2}\nPostage: ${3}\nTotal: ${4}'
#       .format(str(number), str(single_price), str(sub_total), str(postage), str(sub_total + postage)))



# number = int(input('Enter the number of items: '))
# shipping = input('Enter shipping method (s/r/e): ')

# if(number > 50):
#     single_price = 2
#     if(shipping == 's'):
#         shipping_type = 'Standard post'
#         postage = 0
#     elif(shipping == 'r'):
#         shipping_type = 'Registered post'
#         postage = 10
#     else:
#         shipping_type = 'Express post'
#         postage = 17
# else:
#     single_price = 3
#     if(shipping == 's'):
#         shipping_type = 'Standard post'
#         postage = 10
#     elif(shipping == 'r'):
#         shipping_type = 'Registered post'
#         postage = 15
#     else:
#         shipping_type = 'Express post'
#         postage = 20
# print()

# sub_total = number * single_price

# print('Receipt:\n{0} items x ${1} = ${2}\n{3}: ${4}\nTotal: ${5}'
#       .format(str(number), str(single_price), str(sub_total), shipping_type, str(postage), str(sub_total + postage)))

# first_number = int(input('Enter the first integer: '))
# second_number = int(input('Enter the second integer: '))
# third_number = int(input('Enter the third integer: '))
# fourth_number = int(input('Enter the fourth integer: '))


# if(first_number > second_number):
#     max = first_number
#     min = second_number
#     if(third_number > first_number):
#         max = third_number
#         if(fourth_number > third_number):
#             max = fourth_number
# else:
#     max = second_number
#     if(third_number > max):
#         max = third_number
#         if(fourth_number > third_number):
#             max = fourth_number
# print('\nThe minimum number is {0} and the maximum number is {1}.'.format(min, max))

# arr = [first_number, second_number, third_number, fourth_number]
# arr.sort()
# print('\nThe minimum number is {0} and the maximum number is {1}.'.format(arr[0], arr[3]))


# for i in range(2, 9):
#     print(i)


# for i in range(1, 10):
#     print('6 x {0} = {1}'.format(i, i * 6))

# num = int(input('Enter a number: '))

# for i in range(1, 10):
#     print('{2} x {0} = {1}'.format(i, i * num, num))


# for i in range(0, 11):
#     print('{0} + {1} = 10'.format(i, 10 - i))

# for i in range(0, 11):
#     if(i == 10):
#         tail = '.'
#     else:
#         tail = ','
#     print(i, end='')
#     print(tail, end='')

# sum = 0
# for i in range(2, 21):
#     sum += i

# print('The sum of 2 to 20 is {0}'.format(sum))

# sentence = input('Enter a sentence: ')

# for i in range(0, len(sentence)):
#     print(sentence[i])

# username = input('Enter username: ')
# password = ''
# for i in range(0, len(username)):
#     if(username[i].lower() == 'i'):
#         password += '1'
#     elif(username[i].lower() == 'r'):
#         password += '7'
#     elif(username[i].lower() == 's'):
#         password += '5'
#     elif(username[i].lower() == 'z'):
#         password += '2'
#     else:
#         password += username[i]

# print('Password is ' + password)


# for i in range(0, 10):
#     ans = input('Would you like green eggs and ham? (Y/N): ')
#     if(ans == 'Y'):
#         break

# dog = int(input('Enter the number of dogs: '))
# cat = int(input('Enter the number of cats: '))

# if(dog > 1):
#     dog_label = 'dogs'
# else:
#     dog_label = 'dog'

# if(cat > 1):
#     cat_label = 'cats'
# else:
#     cat_label = 'cat'

# print('You have adopted {0} {1} and {2} {3}.'.format(dog, dog_label, cat, cat_label))

# from datetime import datetime

# f_name = input('Enter your first name: ')
# l_name = input('Enter your last name: ')
# dob = input('Enter your dob (DD-MM-YYYY): ')
# mode = input('Choose a format:  (A)bbreviated  (N)ormal: ')

# date_object = datetime.strptime(dob, '%d-%m-%Y')

# print('{0:<15}{1:<15}{2:<15}'.format('First Name', 'Last Name', 'Date of Birth'))
# if(mode == 'A'):
#     print('{0:<15}{1:<15}{2:<15}'.format(f_name, l_name, date_object.strftime('%d/%b/%Y')))
# elif(mode == 'N'):
#     print('{0:^15}{1:^15}{2:^15}'.format(f_name, l_name, dob))
# else:
#     print('{0:<15}{1:<15}{2:^15}'.format(f_name, l_name, date_object.strftime('%Y-%m-%d')))


# pear = input('Which kind of pears would you like: (N)ashi 4.99/kilo (C)orella 5.99/kilo: ')
# if(pear == 'N' or pear == 'C'):
#     pear_weight = float(input('How many kilograms of pears would you like: '))
# orange = input('Which kind of oranges would you like: (H)amlin 2.99/kilo (M)oro 3.99/kilo: ')
# if(orange == 'H' or orange == 'M'):
#     orange_weight = float(input('How many kilograms of oranges would you like: '))

# print('{0:>15}{1:>15}{2:>15}{3:>15}'.format('Item', 'Weight', 'Unit Price', 'Price'))
# if(pear == 'N'):
#     pear_price = 4.99
#     pear_name = 'Nashi'
# elif(pear == 'C'):
#     pear_price = 5.99
#     pear_name = 'Corella'
# else:
#     pear_price = 0
#     pear_name = '-'
#     pear_weight = 0
# print('{0:>15}{1:>15}{2:>15}{3:>15.2f}'.format(pear_name, pear_weight, pear_price, pear_price * pear_weight))

# if(orange == 'H'):
#     orange_price = 2.99
#     orange_name = 'Hamlin'
# elif(orange == 'M'):
#     orange_price = 3.99
#     orange_name = 'Moro'
# else:
#     orange_price = 0
#     orange_name = '-'
#     orange_weight = 0
# print('{0:>15}{1:>15}{2:>15}{3:>15.2f}'.format(orange_name, orange_weight, orange_price, orange_price * orange_weight))
# print('{0:>15}{1:>15}{2:>15}{3:>15.2f}'.format('Total', '', '', pear_price * pear_weight + orange_price * orange_weight))


adult = int(input('How many adult passengers ($100 each): '))
children = int(input('How many child passengers ($60 each): '))
has_baggage = input('Add baggage (Y)es (N)o: ')

if(has_baggage == 'Y'):
    baggage_type = input('How many bags do you have (1) 15kg for $53.13 (2) 30 kg for $99.24: ')
    if(baggage_type == '1'):
        baggage_fee = 53.13
    elif(baggage_type == '2'):
        baggage_fee = 99.24
    else:
        print('The heaviest baggage you can add is 30 kg for $99.24')
        baggage_fee = 99.24
else:
    baggage_fee = 0

total = adult * 100 + children * 60 + baggage_fee + 50

print('Your ticket costs ${0} (including Fuel Surcharge $50)'.format(total))
# num = int(input('Enter an integer: '))
# for i in range(1, num + 1):
#     if(i == num):
#         tail = '.'
#     elif(i * 3 % 12 == 0):
#         tail = ':'
#     else:
#         tail = ','
#     print(i * 3, end='')
#     print(tail, end='')


# start_num = int(input('Enter the starting integer: '))
# end_num = int(input('Enter the ending integer: '))
# if(start_num > end_num):
#     print('Your starting integer is larger than the ending integer.')
# else:
#     print('{0:<10}{1:<10}{2:>10}'.format('Num', 'Triple', 'Quadruple'))

#     for i in range(start_num, end_num + 1):
#         print('{0:<10}{1:<10}{2:>10}'.format(i, i * 3, i * 4))


# guess_time = int(input('How many times should I guess at most: '))

# for i in range(0, guess_time):
#     guess_num = int(input('Please enter your guess: '))
#     if(guess_num % 2 != 0):
#         print('You have entered an odd number rather than an even number.')
#     else:
#         print('Congratulations! You have entered an even number.')
#         break

# str = input('Enter a string: ')
# start = input('Enter the starting letter: ')
# end = input('Enter the ending letter: ')

# start_index = -1
# end_index = -1
# for i in range(0, len(str)):
#     if(str[i] == start and start_index == -1):
#         start_index = i
#     if(str[i] == end and end_index == -1):
#         end_index = i
# ans = ''
# if(start_index == -1 and end_index == -1):
#     print('Both letters are not found.')
# else:
#     if(start_index == -1):
#         from_index = 0
#         to_index = end_index + 1
#     elif(end_index == -1):
#         from_index = start_index
#         to_index = len(str) 
#     else:
#         from_index = start_index
#         to_index = end_index + 1

#     for j in range(from_index, to_index):
#         if(j == to_index - 1):
#             ans += str[j]
#         else:
#             ans += str[j] + '-'
#     print('The requested string is: ' + ans + '.')


# cur_credit = int(input('Enter your current credit: '))
# frog_number = int(input('How many frogs do you want to buy? '))

# sum = frog_number * 20
# print('Cost: {0} frog x 20 credit = {1} credit'.format(frog_number, sum))
# if(sum > cur_credit):
#     print('You have insufficient credit.')
# else:
#     print('Your remaining credit: {0} - {1} = {2} credit'.format(cur_credit, sum, cur_credit - sum))

