# count = 2
# while(count <= 10):
#     print(f'{count:>2} + {count:>2} = {count * 2:>2}')
#     count += 2


# count = 1
# while(count < 10):
#     if(count == 9):
#         trailing = '.'
#     else:
#         trailing =';'
#     print(count, end='')
#     print(trailing, end=' ')
#     count += 2

# integers = 0
# sum = 0
# even = 0
# odd = 0
# positive = 0
# negative = 0

# while(True):
#     text = input('Enter an integer or q to quit: ')
#     if(text == 'q'):
#         break
#     else:
#         text = int(text)
#         if(text > 0):
#             positive += 1
#         elif(text < 0):
#             negative += 1
#         if(text % 2 == 0):
#             even += 1
#         else:
#             odd += 1
#         integers += 1
#         sum += text
# print()
# print('Summary information: ')
# print(f'You have entered {integers} integers.')
# print(f'The sum of these numbers is {sum}.')
# print(f'There are {even} even numbers.')
# print(f'There are {odd} odd numbers.')
# print(f'There are {positive} positive numbers.')
# print(f'There are {negative} negative numbers.')


# arr = []
# while(True):
#     text = input('Enter an integer or q to quit: ')
#     if(text == 'q'):
#         break
#     else:
#         text = int(text)
#         arr.append(text)

# print(f'Before insertion sort: {arr}')
# for i in range(len(arr)):
#     k = i
#     while(k > 0 and arr[k-1] < arr[k]):
#         arr[k], arr[k-1] = arr[k-1], arr[k]
#         k -= 1
# print(f'After insertion sort: {arr}')        
