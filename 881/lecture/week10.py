# subject = {
#     "code": "MATH101",
#     "title": "Algebra",
#     "cp": 6,
#     "department": "Mathematics"
# }

# capital_city = {
#   "Australia": "Canberra",
#   "Denmark": "Copenhagen",
#   "Ireland": "Dublin",
#   "New Zealand": "Wellington",
#   "Nepal": "Kathmandu"
# }

# country = input('Enter country: ')

# if capital_city.get(country):
#     print(f'Capital city of {country} is {capital_city.get(country)}')
# else:
#     print(f'Sorry I do not know the capital city of {country}')

# DIGIT_MAP = {
#   "0": "zero",
#   "1": "one",
#   "2": "two",
#   "3": "three",
#   "4": "four",
#   "5": "five",
#   "6": "six",
#   "7": "seven",
#   "8": "eight",
#   "9": "nine"
# }

# num = input('Please enter a numerical code: ')

# ans = ''

# for c in num:
#     ans += DIGIT_MAP.get(c) + '-'

# print(f'You have entered: {ans[:len(ans) - 1]}')

state_map = {
  "NSW": "New South Wales",
  "ACT": "Australian Capital Territory",
  "NT": "Northern Territory",
  "QLD": "Queensland",
  "SA": "South Australia",
  "TAS": "Tasmania",
  "VIC": "Victoria",
  "WA": "Western Australia"
}

text = input('Enter state NSW/ACT/NT/QLD/SA/TAS/VIC/WA: ')

print(f'The state you entered is {state_map[text]}')