# def duck_cow_leg_count(duck, cow):
#     return duck * 2 + cow * 4

# result = duck_cow_leg_count(duck=0, cow=2)
# print(result)

# def print_equation(startNumber, endNumber):
#     while True:
#         if startNumber > endNumber:
#             break
#         else:
#             print(f'{startNumber} + {startNumber + 1} + {startNumber} x {startNumber +1} = {startNumber + startNumber + 1 + (startNumber * (startNumber + 1))}')
#             startNumber += 1

# print_equation(startNumber=7, endNumber=7)

# def display_pattern(word):
#     for i in range(len(word)):
#         print(f'index {i}:', end=' ')
#         temp = i
#         for j in range(1, 7):
#             if(j % 2 != 0):
#                 print(word[i], end=' ')
#             else:
#                 temp += 1
#                 print(temp , end=' ')
#         print()
# display_pattern(word="sydney")

# def display_backward(number, count):
#     my_count = 0
#     while my_count < count:
#         my_count += 1
#         print(f'number {my_count} is: {number}')
#         number -= 1

# display_backward(number=12, count=4)

# class Address:
#     def __init__(self, number, street, city, state, code):
#         self.number = number
#         self.street = street
#         self.city = city
#         self.state = state
#         self.code = code

#     def printAddress(self):
#         print(f'{self.number} {self.street}, {self.city}, {self.state} {self.code}')

#     def __str__(self):
#         return f'Address[number="{self.number}", street="{self.street}", suburb="{self.city}", state="{self.state}", code="{self.code}"]'


# addressObj1 = Address("2/15", "John Ave", "Sydney", "NSW", "2512")
# addressObj2 = Address("3", "Circle St", "Mathville", "ACT", "0214")
# print(addressObj1)
# print(addressObj2)