# def triple(sentence):
#     ans = ''
#     for i in range(len(sentence)):
#         ans += sentence[i] * 3
    
#     return ans




# text = input('Enter a sentence: ')

# print(f'Triple effect: {triple(text)}')

# def next_number(number):
#     if(number % 2 == 0):
#         return number * 3 + 1
#     else:
#         return number * 2 + 2

# number = int(input('Enter the initial number: '))
# count = 0
# print('Sequence:')

# while(True):
#     if(number > 100):
#         print(f'Step {count}: {number}')
#         break
#     else:
#         print(f'Step {count}: {number}')
#         number = next_number(number)
#         count += 1


class Employee:
    def __init__(self, employId, first_name, last_name, role, phone):
        self.employId = employId
        self.first_name= first_name
        self.last_name= last_name
        self.role= role
        self.phone= phone

    def __repr__(self):
        return f"Employee('{self.employId}', '{self.first_name}', '{self.last_name}', '{self.role}', '{self.phone}')"

	
employeeObj1 = Employee("100001", "John", "Lee", "Accountant", "0001")
result = repr(employeeObj1)
print(result)
