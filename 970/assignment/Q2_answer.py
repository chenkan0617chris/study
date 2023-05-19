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


print("==================== Welcome to XXXXXXX's program ====================")
# ===================== Start your answer here ==================================

file_text = open('PWDCiphertext.txt', 'r').readline()

def PermGen(char_set, max_len):
    if max_len <= 0:
        return
    for c in char_set:
        yield c
    for c in char_set:
        for next in PermGen(char_set, max_len-1):
            yield c + next
            
result = PermGen('0123456789', 4)

for c in result:
	first_key = b64_encode(hash_to_key(c))
        
	try:
		plainText = decrypt(first_key.encode(), file_text.encode())
		print(plainText)
		print(f'PIN is {c}')
		break
	except:
		continue	
        
# ===================== Stop your answer here ==================================
print("=========================== END ===========================")
