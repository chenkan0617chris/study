# def triple(sentence):
#     ans = ''
#     for i in range(len(sentence)):
#         ans += sentence[i] * 3
    
#     return ans




# text = input('Enter a sentence: ')

# print(f'Triple effect: {triple(text)}')

def next_number(number):
    if(number % 2 == 0):
        return number * 3 + 1
    else:
        return number * 2 + 2

number = int(input('Enter the initial number: '))
count = 0
print('Sequence:')

while(True):
    if(number > 100):
        print(f'Step {count}: {number}')
        break
    else:
        print(f'Step {count}: {number}')
        number = next_number(number)
        count += 1
