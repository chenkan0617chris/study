# i = 0
# while(i <= 20):
#     if(i % 8 == 6):
#         trail = '->'
#     elif(i == 20):
#         trail = '.'
#     else:
#         trail = ';'
#     print(i, end='')
#     print(trail, end='')
#     i += 2

# num = int(input('Please enter a number(2-10): '))
# symbol = input('Please enter a symbol(?, -, *, +, $): ')

# print('Go forward: ')
# i = 1
# j = 0
# while(i <= num):
#     while(j <= i):
#         if(j >= 1):
#             print(symbol, end='')
#         else:
#             print(i, end='')
#         j = j + 1
#     print('')
#     j = 0
#     i = i + 1

    # print(f'{i:<} + {i:<} = {i * 2:<}')

# for i in range(1, 11):
#     print('{:>2} + {:>2} = {:>2}'.format(i, i, i * 2))

# for i in range(1, 11):
#     if(i == 10):
#         print(i, end='')
#         print('.', end='')
#     else:
#         print(i, end=' ')
#         print('-', end=' ')

# for i in range(1, 11):
#     if(i == 10):
#         trailing = ''
#     else:
#         trailing = ':'
#     print(i, end=' ')
#     print(trailing, end=' ')

# for i in range(1, 6):
#     if(i == 5):
#         trailing = '.'
#     else:
#         trailing = ','
#     print(i * 2, end='')
#     print(trailing, end=' ')

# for i in range(1, 10):
#     if(i % 2 != 0):
#         if(i == 9):
#             traling = '.'
#         else:
#             traling = ';'
#         print(i, end='')
#         print(traling, end=' ')

# for i in range(1, 10):
#     for j in range(1, i + 1):
#         print(j, end='')
#     print('')

# i = 0
# while(i < 10):
#     print(i)
#     i += 1

# i = 9
# while(i >= 0):
#     print(i)
#     i -= 1

# i = 0
# while(i < 10):
#     print(f'5 x {i} = {5 * i}')
#     i += 1

# i = 0
# while(i <= 10):
#     print(f'{i} + {10 -i} = 10')
#     i += 1

# i = 0
# while(i <= 10):
#     if(i % 2 == 0):
#         if(i == 10):
#             trailing = '.'
#         else:
#             trailing = ','
#         print(i, end='')
#         print(trailing, end=' ')
#     i += 1

# start = int(input('Enter start number: '))
# end = int(input('Enter end number: '))
# print('')
# print('Equations:')
# while(start <= end):
#     print(f'{start} + {start} = {start * 2}')
#     start += 1

# text = ''
# while(text != 'q'):
#     text = input('Enter something (or q to quit): ')
#     if(text != 'q'):
#         print('You have entered: ' + text)
#         print()
# print('Goodbye!')

# num = -1
# while(num <= 0):
#     num = int(input('Enter a positive integer: '))
#     if(num <= 0):
#         print()
# print('You have entered: ' + str(num))

# even = 0
# odd = 0

# while True:
#     input_text = input('Enter an integer (or q to quit): ')
#     if(input_text == 'q'):
#         break
#     else:
#         if(int(input_text) % 2 == 0):
#             even += 1
#         else:
#             odd += 1
# print(f'You have entered {even} even numbers')
# print(f'You have entered {odd} odd numbers')

# count = 1
# while(count <= 10):
#     ans = input('Would you like green eggs and ham? (Y/N): ')
#     if(ans == 'Y'):
#         break
#     count += 1
# if(count <= 10):
#     print("That's a smart choice!")
# else:
#     print("Oh well, you don't know what you're missing!")

print('this is a test of while loop')