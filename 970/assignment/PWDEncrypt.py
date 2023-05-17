from cryptography.fernet import Fernet 
import hashlib
import base64

#An encryption function that on input secret key and plaintext, it returns a ciphertext
def encrypt(key, ptext):
	ctext = Fernet(key).encrypt(ptext)
	return ctext

#A decryption function that on input secret key and ciphertext, it returns a plaintext
def decrypt(key, ctext):
	ptext = Fernet(key).decrypt(ctext)
	return ptext

#A function that on input PIN, it returns its SHA256 in Hex format
def hash_to_key(pin):
	PIN = str(pin)
	hash_pin = hashlib.sha256(PIN.encode()).hexdigest()
	return hash_pin

#A function that on input Hex value, it returns string in Base64 format
#Note that this Base64 format is necessary as the input for encryption function
def b64_encode(hex_input):
	b64 = base64.b64encode(bytes.fromhex(hex_input)).decode()
	return b64


print("==================== Welcome to Alice\'s program ====================")
message = input("Please enter your zip password to encrypt: ")


while True:
    PIN = input("Please enter PIN (4 digit): ")
    if PIN.isdigit() and len(PIN) == 4:
        print("PIN accepted.")
        break
    else:
        print("Invalid PIN. Please enter a 4-digit number.")


hash_pin = hash_to_key(PIN)
print("The hash value of PIN:", hash_pin)
hash_pin_b64 = b64_encode(hash_pin)
print("The hash value in Base64:", hash_pin_b64)

ciphertext = encrypt(hash_pin_b64.encode(), message.encode())
print("Here is your encrypted password:", ciphertext.decode())

print("=========================== END ===========================")




