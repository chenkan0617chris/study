from cryptography.fernet import Fernet

def create_key():
    key = Fernet.generate_key()
    return key

def encrypt(key, ptext):
    ctext = Fernet(key).encrypt(ptext)
    return ctext

def decrypt(key, ctext):
    ptext = Fernet(key).decrypt(ctext)
    return ptext

secretKey = create_key()

print('Encryptography key:', secretKey)

plaintext = input('Enter your message to encrypt: ')

ciphertext = encrypt(secretKey, plaintext.encode())

print('ciphertext: ', ciphertext)

decrypttext = decrypt(secretKey, ciphertext)

print('plaintext: ', decrypttext.decode())
