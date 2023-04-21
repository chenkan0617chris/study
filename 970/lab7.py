import hashlib
import time

start = time.time()

# permutation all passwords possibly
def PermGen(char_set, max_len):
    if max_len <= 0:
        return
    for c in char_set:
        yield c
    for c in char_set:
        for next in PermGen(char_set, max_len-1):
            yield c + next

# cracking password
def crack_password(password, len):
    result = PermGen('abcdefghijklmnopqrstuowxyz', len)

    for k in list(result):
        hashValue = hashlib.sha1(k.encode()).hexdigest()
        if hashValue == password:
            print(f"crack password successful: {k} - {hashValue}")
            break

# generating password
def generate_password(plaintext):
    return hashlib.sha1(plaintext.encode()).hexdigest()

# start
def start_crack(plaintext):
    password = generate_password(plaintext)

    crack_password(password, len(plaintext))

start_crack('toms')

end = time.time()

print(f"time cost: {end - start} seconds")