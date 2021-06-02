class one:
	def __init__(self):
		varr=str()
		var2=str()
		var3=str()
	def func(self):
		def inner():
			var3 = "hi3"
			return var3
		self.varr= "hi"
		self.var2= "hi2"
		self.var3= inner()

class two(one):
	def func2(self):
		one.func(one)
		# one.func(one).inner(one)
		print(one.varr)
		print(one.var2)
		print(one.var3)
		# print(one.func(self))
		# print(self.fuc().var)

# obj=one()
# obj2=two()
two().func2()