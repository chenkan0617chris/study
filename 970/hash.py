import hashlib

text = input('Enter your text: ')

my_map = {
    'md5': 'md5'
}

MD5_object = hashlib.md5(text.encode())

SHA1_object = hashlib.sha1(text.encode())

SHA256_object = hashlib.sha256(text.encode())

SHA384_object = hashlib.sha384(text.encode())

SHA512_object = hashlib.sha512(text.encode())

arr = [MD5_object, SHA1_object, SHA256_object, SHA384_object, SHA512_object]

for i in arr:
    print('{0}: has size of {1} bytes : {2}'.format(i.name, i.digest_size, i.hexdigest()))




