# try:
#     text = int(input('Enter an integer: '))
#     print(f'You have entered {text}')
# except ValueError as e:
#     print('You have entered an invalid input')
    
# try:
#     integer1 = int(input('Enter the 1st integer: '))
#     integer2 = int(input('Enter the 2nd integer: '))
#     print(f'{integer1} / {integer2} = {integer1/integer2}')
# except ValueError as e:
#     print('You have entered an invalid input')
# except ZeroDivisionError as e:
#     print('The second number must be non-zero')


# try:
#     numberStr = input('Enter a positive integer: ')

#     try:
#         int_number = int(numberStr)
#     except:
#         raise ValueError('You have entered an invalid input')

#     if int_number <= 0:
#         raise ValueError('You must enter a positive integer')
    
#     print(f'You have entered {int_number}')

# except ValueError as e:
#     print(e)
