print('hello world!')

my_name = 'Kan'

print('hello world ' + my_name)

flag = False

if flag != False:
    print('123')
elif flag == True & 2 % 2 == 0:
        print('fuck')
else:
        print('holy shit')


words = ['cat', 'dog', 'pig']

for word in words:
    print(word, len(word))

my_object = {
    'name': 'Kan',
    'age': 27,
    'gender': 'male',
    'handsome': True
}

for field, value in my_object.copy().items():
    if value == True:
        del my_object[field]

print(my_object)


name = input("what's your name? ")
print('welcome to python ' + name + '!')


price1 = input('price1: ')
price2 = input('price2: ')
sum = int(price1) + int(price2)
print('sum: ' + str(sum))
