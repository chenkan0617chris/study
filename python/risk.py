import math

def risk_calculator(a, m, b):
    t = round((a + 4 * m + b) / 6, 2)
    s = round((b - a) / 6, 2)
    return t, s

a = risk_calculator(5, 6, 8)

arr = [
    [5, 6, 8],
    [3, 4, 5],
    [2, 3, 3],
    [3.5, 4, 5],
    [1, 3, 4],
    [8, 10, 15],
    [2, 3, 4],
    [2, 2, 2.5]
]

expect_time = 0
standard_deviation = 0

for c in arr:
    t, s = risk_calculator(c[0], c[1], c[2])
    print(f't = {t} s = {s}')
    expect_time += t
    
    standard_deviation += s ** 2


print(f'expect_time = {round(expect_time, 2)}')
print(f'standard_deviation = {round(math.sqrt(standard_deviation), 2)}')

expect_time = 13.5
z = round(math.sqrt(1.17 **2 + 0.33 ** 2), 2)
print(f'z = {z}')

print((12 - expect_time)/ z)

