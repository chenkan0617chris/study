

# 欧拉函数
def Euler_function(n):
    count = 0
    for i in range(1, n):   
        if(co_prime(i, n)):
            count += 1
    return count


# 检测是否互质
def co_prime(a, b):
    for i in range(2, a + 1):
        if(a % i == 0 and b % i == 0):
            return False      
    return True

# 欧拉定理
# 输入两个互质数
def Euler_theorem(a, b):
    if(a ** Euler_function(b) % b == 1):
        return True
    else:
        return False
     



print(Euler_function(3233))
