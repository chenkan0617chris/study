# count = 0
# while(True):
#     text = input('Enter a string of six letters: ')
#     if(len(text) == 6):
#         count += 1
#         if(count == 1):
#             temp = 'attempt'
#         else:
#             temp = 'attempts'
#         print(f'Well done! You have entered a six-letter word after {count} {temp}!')
#         break
#     else:
#         count += 1
#         print('That is not a six-letter word. You should re-enter a word.')

# count = 0
# while(count < 4):
#     text = input('Enter a word (or q to quit): ')
#     if(text == 'q'):
#         print('You have terminated the loop.')
#         break
#     else:
#         count += 1
#         if(len(text) % 2 == 0):
#             print(f'The lowercase of {text} is {text.lower()}')
#         else:
#             print(f'The UPPERCASE of {text} is {text.upper()}')
        
# sum = 0
# while(True):
#     if(sum >= 100):
#         print(f'Well done! The current sum {sum} is equal to or over 100.')
#         break
#     else:
#         print(f'The current sum of all entered numbers is {sum}.')
#         num = input(f'Enter an integer to increase/decrease the sum: ')
#         sum += int(num)


# while(True):
#     first_integer = int(input('Enter the first integer: '))
#     second_integer = int(input('Enter the second integer: '))

#     if(first_integer > second_integer):
#         print('The first integer should not be larger than the second. Please re-enter them.')
#     else:
#         while(True):
#             step = int(input('Enter the step: '))
#             if(step > 0):
#                 print('{0:>10}{1:>10}{2:>10}'.format('Num', 'Square', 'Cube'))
#                 temp = first_integer
#                 while(temp <= second_integer):
#                     print('{0:>10}{1:>10}{2:>10}'.format(temp, temp ** 2, temp ** 3))
#                     temp += step
#                 break
#             else:
#                 print('The step should be positive. Please re-enter it.')
#         break    

# import math

# def operate_2_numbers(num1, num2, operator):
#     if(operator == '+'):
#         return(num1 + num2)
#     elif(operator == '-'):
#         return(num1 - num2)
#     elif(operator == 'x'):
#         return(num1 * num2)
#     elif(operator == '/'):
#         temp = num1 / num2
#         return  math.floor(temp)
#     else:
#         return(num1 % num2)
    
# print(operate_2_numbers(2, 5, '%'))

# def query_lab_time(first_name, last_name, subject_code):
#     print(f'Hello, {first_name} {last_name}!')
#     if(subject_code == 'CSIT110' or subject_code == 'CSIT810'):
#         print(f'	The subject you query is {subject_code}.')
#         print(f'	Its online lab is on Mon 15:30 - 17:30.')
#     elif(subject_code == 'CSIT881'):
#         print(f'	The subject you query is {subject_code}.')
#         print(f'	Its online lab is on Mon 10:30 - 12:30.')
#     else:
#         print(f'	The subject you query is not in our database.')
#         print(f'	Its online lab is on mystery day.')

# query_lab_time("John", "Smith", "CSIT007")


# def number_pattern(start_number = 1, end_number = 8):
#     for i in range(start_number, end_number + 1):
#         for j in range(9):
#             if(j < 9 - i):
#                 if(i % 2 == 0):
#                     print('<', end='')
#                 else:
#                     print('>', end='')
#             else:
#                 print(i, end='')
#         print()

# number_pattern(3)

# def power_calculation(first_number, second_number = 2):
#     power = first_number ** second_number
#     if(power > 0):
#         sign = 'positive'
#     elif(power < 0):
#         sign = 'negative'
#     else:
#         sign = 'zero'
    
#     if(power % 2 == 0):
#         parity = 'even'
#     else:
#         parity = 'odd'
    
#     return power, sign, parity

# power, sign, parity = power_calculation(0,6)
# print("{} is a {} {} number.".format(power, sign, parity))

arr = []
while(True):
    num = input('Enter an integer (or enter quit): ')
    if(num == 'quit'):
        print(f'Selection Sort Algorithm for {arr}')
        for i in range(len(arr) - 1):
            max = i
            for k in range(i + 1, len(arr)):
                if(arr[k] > arr[max]):
                    max = k
            arr[i], arr[max] = arr[max], arr[i]
            print(f'After round {i}: {arr}')
        break
    else:
        arr.append(int(num))