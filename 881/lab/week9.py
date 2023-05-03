class Staff:
    def __init__(self, staff_number, first_name, last_name, email):
        self.staff_number = staff_number
        self.first_name = first_name
        self.last_name = last_name
        self.email = email

    def print_details(self, width):
        output = "| {0:" + str(width - 3) + "}|"

        number = 'Staff number:' + ' ' + str(self.staff_number)
        name = self.first_name + ' ' + self.last_name
        email = self.email
        print('-' * width)
        print(output.format(number))
        print(output.format(name))
        print(output.format(email))
        print('-' * width)

        
staffObj1 = Staff(100001, 'John', 'Lee', 'jl123@gmail.com')

staffObj1.print_details(40)

