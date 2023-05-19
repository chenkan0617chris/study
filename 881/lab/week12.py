# def get_assessment_mark(assessment_name, mark_min, mark_max):
#     try:
#         mark = input(f'Enter {assessment_name} mark ({mark_min}-{mark_max}): ')
#         try:
#             num = int(mark)
#         except:
#             raise ValueError(f'{assessment_name} mark is invalid')
        
#         if(num > mark_max or num < mark_min):
#             raise ValueError(f'{assessment_name} mark must be between {mark_min} and {mark_max}')
#         else:
#             print(num)
        
#     except ValueError as e:
#         a = 1

# get_assessment_mark('Assignment 1', 0, 50)


# def get_assessment_mark(assessment_name, mark_min, mark_max):
# #{
#   """
#   Ask user to enter assessment mark and return the mark.
#   Raise ValueError if one of the following occurs:
#   - mark is not an integer
#   - mark is out of range
#   """

#   # ask user to enter mark
#   user_input = input("Enter {0} mark ({1}-{2}): "
#     .format(assessment_name, mark_min, mark_max))

#   # check if mark is integer
#   try:
#     mark = int(user_input)
#   except ValueError as e:
#     raise ValueError("{0} mark is invalid".format(assessment_name))    

#   # check mark between max and min
#   if (mark > mark_max):
#     raise ValueError("{0} mark must be between {1} and {2}"
#       .format(assessment_name, mark_min, mark_max))

#   if (mark < mark_min):
#     raise ValueError("{0} mark must be between {1} and {2}"
#       .format(assessment_name, mark_min, mark_max))

#   return mark
# #}

# # write your code here
# try:
#     mark1 = get_assessment_mark('assignment', 0, 20)
#     mark2 = get_assessment_mark('project', 0, 30)
#     mark3 = get_assessment_mark('final exam', 0, 50)
#     print(f'Total mark: {mark1 + mark2 + mark3}')

# except ValueError as e:
#     print(f'Error: {e}')
  


class TreeNode:
#{
    """
    Representing a tree node consisting of
    - datum: the datum stored at the node
    - left: reference to the left child node
    - right: reference to the right child node
    """   

    def __init__(self, datum, left, right):
    #{
        self.datum = datum
        self.left = left
        self.right = right
    #}

    def in_order_print(self):
        if self.left != None:
            self.left.in_order_print()

        print(self.datum)

        if self.right != None:
            self.right.in_order_print()

    def pre_order_print(self):
        print(self.datum)

        if self.left != None:
            self.left.pre_order_print()

        if self.right != None:
            self.right.pre_order_print()
    
    def post_order_print(self):
        if self.left != None:
            self.left.post_order_print()

        if self.right != None:
            self.right.post_order_print()

        print(self.datum)


#}

class MyBinaryTree:
#{
    """
    Implementation of a binary tree
    """ 

    def __init__(self):
    #{
        """
        Constructs an empty tree
        """
        self.root = None

    #}

    def print_in_order(self):
    #{
        """
        Use in-order traversal and print each tree node's datum
        """   
        if self.root != None:
            self.root.in_order_print()
    #}

    def print_pre_order(self):
    #{
        """
        Use pre-order traversal and print each tree node's datum
        """    
        if self.root != None:
            self.root.pre_order_print()
    #}

    def print_post_order(self):
    #{
        """
        Use post-order traversal and print each tree node's datum
        """    
        if self.root != None:
            self.root.post_order_print()

    #}

#}

nodeD = TreeNode(datum="D", left=None, right=None)
nodeI = TreeNode(datum="I", left=None, right=None)
nodeJ = TreeNode(datum="J", left=None, right=None)
nodeK = TreeNode(datum="K", left=None, right=None)
nodeL = TreeNode(datum="L", left=None, right=None)
nodeM = TreeNode(datum="M", left=None, right=None)
nodeE = TreeNode(datum="E", left=nodeI, right=nodeJ)
nodeF = TreeNode(datum="F", left=nodeK, right=nodeL)
nodeH = TreeNode(datum="H", left=nodeM, right=None)
nodeB = TreeNode(datum="B", left=nodeD, right=nodeE)
nodeC = TreeNode(datum="C", left=nodeF, right=nodeH)
nodeA = TreeNode(datum="A", left=nodeB, right=nodeC)

# construct tree object
treeObj = MyBinaryTree()
treeObj.root = nodeA

# in-order print
print("In-order:")
treeObj.print_in_order()

# pre-order print
print("Pre-order:")
treeObj.print_pre_order()

# post-order print
print("Post-order:")
treeObj.print_post_order()