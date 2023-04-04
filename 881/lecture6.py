# def get_fullname(first_name, last_name):
#     full_name = first_name + " " + last_name
#     return full_name, first_name + '1', last_name + '1'

# full_name, first_name, last_name = get_fullname('John', 'Doe')

# print(full_name, first_name, last_name)


# def addsub_2_numbers(num1, num2, operator):
#     if(operator == '+'):
#         return num1 + num2
#     else:
#         return num1 - num2
    

# print(addsub_2_numbers(10, 20, '-'))

# arr = [1, 2, 3, 4, 5, 6]

# for i in range(0, len(arr)):
#     print(i)


# def welcome(name, greeting = 'hi'):
#     print(f'{greeting} {name}')

# welcome('John', '')

# def recursive_function(num):
#     if(num == 1):
#         return 1
#     else:
#         return num * recursive_function(num - 1)

# print(recursive_function(7))

# cache = {}

# def fi(n):
#     if n in cache:
#         return cache[n]

#     if(n == 1 or n == 2):
#         value = 1
#     else:
#         value = fi(n - 1) + fi(n - 2)
    
#     cache[n] = value
#     return value
    
# print(fi(12))

# def add_two_numbers(number1, number2):
# #{
#     number_sum = number1 + number2
#     return number_sum
# #}

# # calling function
# number1 = add_two_numbers(5, 10)
# number2 = add_two_numbers(number1, number1)
# number3 = add_two_numbers(number2, 1)
# number4 = add_two_numbers(10, number3)

# print(number4)

# def multiply_3_numbers(number1, number2, number3):
#     return number1 * number2 * number3

# def calculate_grade(score):
#     if(score >= 80):
#         grade = 'A'
#     elif(score >= 60):
#         grade = 'B'
#     elif(score >= 40):
#         grade = 'C'
#     else:
#         grade = 'D'
#     return grade

# def say_hi(first_name, last_name):
#     print('Hi' + first_name + ' ' + last_name)

# def expand(word, multiplicity):
#     newWord = ''
#     for i in range(len(word)):
#         newWord += word[i] * multiplicity
#     return newWord


# def transform_character(letter):
#     if(letter.upper() == 'I'):
#         return '1'
#     elif(letter.upper() == 'R'):
#         return '7'
#     elif(letter.upper() == 'S'):
#         return '5'
#     elif(letter.upper() == 'Z'):
#         return '2'
#     else:
#         return letter

# given this function
# def transform_character(letter):
# #{
#   if (letter == "i") or (letter == "I"):
#     password_letter = "1"
#   elif (letter == "r") or (letter == "R"):
#     password_letter = "7"
#   elif (letter == "s") or (letter == "S"):
#     password_letter = "5"
#   elif (letter == "z") or (letter == "Z"):
#     password_letter = "2"
#   else:
#     password_letter = letter

#   return password_letter
# #}


# # construct the password for username
# def generate_password(username):
#     password = ''
#     for i in range(len(username)):
#       password += transform_character(username[i])
#     return password

# def factorial(num):
#     if(num == 1):
#         return 1
#     else:
#         return num * factorial(num - 1)