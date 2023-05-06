# numbers = int(input('How many square numbers to generate? '))

# arr = []
# for i in range(numbers):
#     arr.append(i ** 2)

# print(f'Here is a list of generated squares: {arr}')

# arr = []
# while True:
#     number = input('Enter an integer (enter QUIT to quit): ')

#     if(number == 'QUIT'):
#         break
#     else:
#         arr.append(number)

# arrStr = ', '.join(arr)

# print(f'You have entered: {arrStr}.')


# number = int(input('How many Fibonacci numbers to generate? '))

# ans = []

# for i in range(number):
#     if len(ans) == 0:
#         ans.append(0)
#     elif len(ans) == 1:
#         ans.append(1)
#     else:
#         temp = ans[i - 1] + ans [i - 2]
#         ans.append(temp)

# print(f'Here is a list of generated Fibonacci numbers: {ans}')


from queue import LifoQueue

def math_expression_checking(expression):

    stack = LifoQueue()

    dictionary = {
        ')': '(',
        ']': '[',
        '}': '{', 
    }


    for c in expression:
        if c == '(' or c == '[' or c == '{':
            stack.put(c)
        elif c == ')' or c == ']' or c == '}':
            if stack.qsize() == 0:
                stack.put(c)
                break
            else:
                top_item = stack.get()
                if dictionary[c] != top_item:
                    stack.put(c)
                    break

    if stack.qsize() == 0:
        return True
    else: 
        return False

print(math_expression_checking(expression="[[(x+y) + z]* {a+b}] + 3"))


