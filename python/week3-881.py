# print('Choose a language: a) English b) Spanish c) Chinese')
# language_code = input('Enter your language: ')

# if (language_code == 'a'):
#     print('hello!')
# elif (language_code == 'b'):
#     print('halo!')
# elif (language_code == 'c'):
#     print('你好')
# else:
#     print('error option')

# itemsNumber = int(input('Enter your number of items: '))
# total = 0

# if(itemsNumber > 50):
#     total = itemsNumber * 2
# else:
#     total = itemsNumber * 3 + 10

# print('your total fee is ' + str(total))

# temp = int(input('Enter the temparature of water: '))

# if (temp <= 0):
#     print('Water is Freeze')
# else:
#     print('Water is NOT Freeze')

# numberItems = int(input('Enter the quantity: '))
# shipping = input("Choose your shipping: s/r/e?")

# if(shipping == 's'):
#     if(numberItems > 50):
#         total = numberItems * 2
#     else:
#         total = numberItems * 3 + 10
# elif(shipping == 'r'):
#     if(numberItems > 50): 
#         total = numberItems * 2 + 15
#     else:
#         total = numberItems * 3 + 15
# else:
#     if(numberItems > 50):
#         total = numberItems * 2 + 20
#     else:
#         total = numberItems * 3 + 20

# print('your total cost is {0}'.format(total))

# product_code = "377B"
# product_name = "Beef Liquid Stock"
# product_size = "250mL"
# product_price = 2.15

# print(product_code + ': ' + product_name + ', ' + product_size)
# print(product_name + ', ' + product_size + ', $' + str(product_price))
# print('{0}: {1}, {2}'.format(product_code, product_name, product_size))
# print('{0}, {1}, ${2}'.format(product_name, product_size, str(product_price)))

# cowNumber = int(input('Enter number of cows to purchase: '))
# duckNumber = int(input('Enter number of ducks to purchase: '))
# chickenNumber = int(input('Enter number of chicken to purchase: '))

# cowCost = cowNumber * 30
# duckCost = duckNumber *  5
# chickenCost = chickenNumber * 3
# total = cowCost + duckCost + chickenCost

# print(
#     'Cost:\n{0} cow = {1} grassies\n{2} duck = {3} grassies\n{4} chick = {5} grassies\nTotal = {6} grassies'.format(cowNumber, cowCost, duckNumber, duckCost, chickenNumber, chickenCost, total)
# )

# print('|{0:<10}|{1:^30}|{2:>10}|'.format('Faces', 'Name', 'Vertices'))
# print('|{0:<10}|{1:^30}|{2:>10}|'.format('4', 'Tetrahedron', '4'))
# print('|{0:<10}|{1:^30}|{2:>10}|'.format('6', 'Cube', '8'))
# print('|{0:<10}|{1:^30}|{2:>10}|'.format('8', 'Octahedron', '6'))
# print('|{0:<10}|{1:^30}|{2:>10}|'.format('12', 'Dodecahedron', '20'))
# print('|{0:<10}|{1:^30}|{2:>10}|'.format('20', 'Icosahedron', '12'))

# number = int(input('Enter number: '))
# if(number > 5):
#     total = 5
# else:
#     total = number
# print('total = ' + str(total))

f_num = int(input('Enter the 1st integer: '))
s_num = int(input('Enter the 2nd integer: '))
t_num = int(input('Enter the 3rd integer: '))
arr = [f_num, s_num, t_num]
arr.sort(reverse=True)
print('Max of {0}, {1}, {2} is {3}'.format(str(f_num), str(s_num), str(t_num), str(arr[0])))