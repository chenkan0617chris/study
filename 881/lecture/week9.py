# animal_list = ["dog", "cat", "frog"]

# for c in animal_list:
#     print(c)

# fibo_numbers = [0, 1, 1, 2, 3, 5, 8, 13] 

# del fibo_numbers[2]


# print(fibo_numbers)

# random_numbers = [3, 12, 10, 5, 10, 3, 10, 6, 12]

# random_numbers.remove(10)

# print(random_numbers)

# random_numbers = [1, 4, 4, 10, -1]

# for i in range(len(random_numbers)):
#     random_numbers[i] += 20

# print(random_numbers)

# square_list = []

# for i in range(1, 11):
#     square_list.append(i**2)

# print(square_list)


# def doubling(list):
#     newList = []
#     for c in list:
#         newList.append(c)
#         newList.append(c)
#     return newList

# print(doubling([4,5,6]))


def list_multiply(list1, list2):
    newList = []

    for i in range(len(list1)):
        newList.append(list1[i] * list2[i])
    
    return newList

print(list_multiply([4,5,6], [2,3,4]))



