# firstName = input('Enter your first name: ')
# lastName = input('Enter your last name: ')
# age = input('Enter your age: ')

# print(
#     firstName + 
#     ' ' +
#     lastName +
#     ' is ' +
#     age +
#     ' years old '
# )

# print("Thursday July 30 at 7.15pm: \"Inside Out\"")

# print('your details:\n')
# print('\\nKan Chen')

# print(
#     'Novel detail:\n' +
#     '\tTitle: ' +
#     '\"The Lord of the Ring\"\n' +
#     '\tAuther: ' +
#     '\"J. R. R. To\"'
# )

# fname = 'kan'
# lname = 'chen'
# age = 20
# score = 3.2

# print('Hi, {0} {1}'.format(fname, lname))

# print('{0} {1} is {2} years old'.format(fname, lname, age))

# print('His GPA is {0:.3f}'.format(score))

# print('Alkali metals:\n')
# print("{0:<15}{1:<10}{2:^25}{3:>15}".format('Element', 'symbol', 'number', 'weight'))


# obj = {}

# obj['fname'] = input('Enter your first name: ')
# obj['fname'] = input('Enter your last name: ')
# age = input('Enter your age: ')
# score = input('Enter your GPA score: ')
# name = fname + ' ' + lname



# print('{0:<15}{1:>25}'.format('Name:', name))
# print('{0:<15}{1:>25}'.format('age:', age))
# print('{0:<15}{1:>25}'.format('GPA score:', score))

# obj = {
#     'name': 'Kan Chen',
#     'age': 20,
#     'score': 3.2
# }

# for key, value in obj.items():
#     print('{0:<15}{1:>25}'.format(key + ':', value))

# seconds = int(input('Enter the total of seconds: '))

# print(
#     str(seconds) +
#     ' seconds correspond to ' + 
#     str(seconds // 60) + 
#     ' minutes and ' +
#     str(seconds % 60) +
#     ' seconds'
#  )

# count = int(input('Enter the number of steps from egg to frog: '))
# print(
#     'Here is the expected life cycle: \n' + 
#     'egg' + count * '-->' + 'frog'
# )

# bookName = input('Enter your favourite book name: ')
# author = input('Enter the author\'s name: ')
# print(
#     'your favourite book is \"' + 
#      bookName + 
#     '\" written by \"' +
#     author + "\"."
# )

# puppies = input('Enter the number of puppies: ')
# kitties = input('Enter the number of kitties: ')
# print('You have adopted {0} puppies and {1} kitties.'.format(puppies, kitties))
# print('The insurance fee is $' + str(40 * int(puppies) + 30 * int(kitties)))


# firstInt = int(input('Enter the 1st positive integer: '))
# secondInt = int(input('Enter the 2nd positive integer: '))
# thirdInt = int(input('Enter the 3rd positive integer: '))

# sum = firstInt * secondInt + firstInt * thirdInt + secondInt * thirdInt

# print(
#     'Here is the equation:\n' + 
#     '{0} X {1} + {0} X {2} + {1} X {2} = '.format(str(firstInt), str(secondInt), str(thirdInt)) + 
#     str(sum)
# )

firstCode = input('Enter the first subject code: ')
firstName = input('Enter the first subject name: ')
firstPoint = input('Enter the first credit point: ')

secondCode = input('Enter the second subject code: ')
secondName = input('Enter the second subject name: ')
secondPoint = input('Enter the second credit point: ')
print('Your enrolment details are as follows:')
print('{0:<10}{1:<40}{2:^15}'.format('Code', 'Name', 'Credit'))
print('{0:<10}{1:<40}{2:^15}'.format(firstCode, firstName, firstPoint))
print('{0:<10}{1:<40}{2:^15}'.format(secondCode, secondName, secondPoint))
print('{0:<10}{1:<40}{2:^15}'.format('Total', '', str(int(firstPoint) + int(secondPoint))))
