# try:
#     input = int(input('Enter an integer: '))

#     print(f'You have entered {input}')

# except ValueError:
#     print('You have entered an invalid input')

# try:
#     num1 = int(input('Enter the 1st integer: '))
#     num2 = int(input('Enter the 2nd integer: '))

#     print(f'{num1} / {num2} = {num1/num2}')

# except ValueError:
#     print('You have entered an invalid input')

# except ZeroDivisionError:
#     print('The second number must be non-zero')

# try:
#     input = input('Enter a positive integer: ')

#     try:
#         num = int(input)
#     except:
#         raise ValueError('You have entered an invalid input')
    
#     if(num <= 0):
#         raise ValueError('You must enter a positive integer')
    
#     print(f'You have entered {num}')

# except ValueError as e:
#     print(e)

while True:
    try:
        text = input('Enter a positive integer: ')
        try:
            num = int(text)
        except:
            raise ValueError('Input is not an integer')
        if(num <= 0):
            raise ValueError('Input is not a positive integer')
        print(f'You have entered {num}')
        break
    except ValueError as e:
        print(e)


        
