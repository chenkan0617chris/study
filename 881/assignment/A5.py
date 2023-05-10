# print('An even integer between 0 and 10 is called a green number')
# print('An odd integer between 10 and 100 is called a red number')
# print('The rest are called blue numbers')

# while True:
#     num = input('Enter an integer (X to quit): ')

#     if(num == 'X'):
#         break
#     else:
#         num = int(num)
#         if(num % 2 == 0 and num >= 0 and num <= 10):
#             print(f'{num} is green')
#         elif(num % 2 == 1 and num >= 10 and num <= 100):
#             print(f'{num} is red')
#         else:
#             print(f'{num} is blue')


# def displayEquation(numberList):
#     for i in range(len(numberList)):
#         print(f'Index {i}: equation {numberList[i]} x 10 = {numberList[i] * 10}')

# displayEquation(numberList=[15, 28, 4, 0, 1])

# def add2Number(numberList):
#     print('Equation here:')
#     if(len(numberList) >= 2):
#         for i in range(len(numberList) - 1):
#             print(f'{numberList[i]} + {numberList[i + 1]} = {numberList[i] + numberList[i + 1]}')

# add2Number(numberList=[7])

# text = input('Enter a sentence: ')

# ans = []

# for i in range(len(text)):
#     ans.append(f'{i}{text[i]}{i}')

# print(f'String list: {ans}')

# name = input('Enter doctor name: ')
# number = input('Enter provider number: ')
# email = input('Enter email: ')
# phone = input('Enter phone: ')

# doctor = {}

# doctor['doctor_name'] = name
# doctor['provider_number'] = number
# doctor['email'] = email
# doctor['phone'] = phone

# print(f'Display doctor info dictionary: ')
# print(f'{doctor}')

# subject = {}

# while True:
#     code = input('Enter subject code (Q to quit): ')

#     if code == 'Q':
#         break
#     else:
#         point = input('Enter credit point: ')

#         subject[code] = point

# print('Subject you have entered: ')

# for c in subject:
#     print(f'{c}: {subject[c]} cp')


abbreviations = {
    "ICYMI": "In case you missed it",
    "TMI": "Too much information",
    "AFAIK": "As far as I know",
    "LMK": "Let me know",
    "NVM": "Nevermind"
}

text = input('Enter text abbreviation ICYMI/TMI/AFAIK/LMK/NVM: ')

if abbreviations.get(text):
    print(f'Text meaning: {abbreviations[text]}')
else:
    print('This text abbreviation is not supported')
