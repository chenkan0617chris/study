
class Student:

    student_dir = '/user/student/'

    email_address = '@uowmail.edu.au'

    def __init__(self, id, first_name, last_name, age):
        self.id = id
        self.first_name = first_name
        self.last_name = last_name
        self.age = age
        self.username = first_name[0] + last_name[0] + id[0:3]
    
    def getFullName(self):
        return self.first_name + ' ' + self.last_name
    
    def greeting(self, message):
        print(f'{message} {self.greeting(self.getFullName())}')

    def get_student_dir(self):
        return Student.student_dir + self.username
    
    @staticmethod
    def get_static_student_dir():
        return Student.student_dir
    
    def get_email(self):
        return self.username + Student.email_address
    
    def get_email_alias(self):
        return self.first_name + '.' + self.last_name + '.' + self.id[0:3] + Student.email_address
    

    def __str__(self):
        return 'Kan Chen'

studentA = Student('7833908', 'kan', 'chen', 27)

# print(studentA.getFullName())

# studentA.greeting('hello')

# print(studentA.get_email_alias())

# print(f'this student is {str(studentA)}')


class PostGraduate(Student):
    student_dir = '/user/postgraduate'

    def __init__(self, id, first_name, last_name, age, thesis):
        super().__init__(id, first_name, last_name, age)

        self.thesis = thesis

    def get_student_dir(self):
        return Student.student_dir + self.username


postGraduateA = PostGraduate('123', 'tom', 'chen', 27, 'Master of information')

print(postGraduateA.get_student_dir())