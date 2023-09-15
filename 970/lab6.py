import os
from cryptography.hazmat.primitives.kdf.scrypt import Scrypt
from cryptography.hazmat.backends import default_backend

def hash_password(password):
    kdf = Scrypt(salt=salt, length =32, n=2**14, r=8, p=1, backend=default_backend())
    return kdf.derive(password)

salt = os.urandom(16)


password = hash_password(b'csit970*')


def verify_password():
    my_input = input('Enter your password: ')

    input_password = hash_password(str.encode(my_input))

    if(password == input_password):
        print('Password is correct')
    else:
        print('Password is incorrect')

verify_password()
