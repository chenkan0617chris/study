weight = float(input('weight: '))

type = input('(K)g or (L)bs: ')


if type == 'K':
    number = weight / 2
else:
    number = weight

print('your weight is ' + str(number))

