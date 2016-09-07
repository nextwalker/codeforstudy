### 为什么选择 Scala?
- 表达能力
	- 函数是一等公民
	- 闭包
- 简洁
	- 类型推断
	- 函数创建的文法支持
- Java互操作性
	- 可重用Java库
	- 可重用Java工具
	- 没有性能惩罚

### Scala 如何工作?
- 编译成Java字节码
- 可在任何标准JVM上运行
	- 甚至是一些不规范的JVM上，如Dalvik
	- Scala编译器是Java编译器的作者写的

### 用 Scala 思考
Scala不仅仅是更好的Java。你应该用全新的头脑来学习它，你会从这些课程中认识到这一点的。

### 启动解释器
使用自带的sbt console启动。

### 表达式
res0是解释器自动创建的变量名称，用来指代表达式的计算结果。它是Int类型，值为2。
Scala中（几乎）一切都是表达式。

### 值
你可以给一个表达式的结果起个名字赋成一个不变量（val）。你不能改变这个不变量的值.

val two = 1 + 1

### 变量
如果你需要修改这个名称和结果的绑定，可以选择使用var。

```
var name = "steve"
name = "marius"
```

### 函数
- 你可以使用def创建函数.
- 在Scala中，你需要为函数参数指定类型签名。
- 如果函数不带参数，你可以不写括号。

```
def addOne(m: Int): Int = m + 1
val three = addOne(2)

def three() = 1 + 2
three()
three
```

### 匿名函数
你可以传递匿名函数，或将其保存成不变量。

```
scala> (x: Int) => x + 1
res2: (Int) => Int = <function1>

scala> res2(1)
res3: Int = 2

scala> val addOne = (x: Int) => x + 1
addOne: (Int) => Int = <function1>

scala> addOne(1)
res4: Int = 2

```

如果你的函数有很多表达式，可以使用{}来格式化代码，使之易读。

```
def timesTwo(i: Int): Int = {
  println("hello world")
  i * 2
}


scala> { i: Int =>
  println("hello world")
  i * 2
}
res0: (Int) => Int = <function1>
```

在将一个匿名函数作为参数进行传递时，这个语法会经常被用到。

### 部分应用（Partial application）

你可以使用下划线“_”部分应用一个函数，结果将得到另一个函数。Scala使用下划线表示不同上下文中的不同事物，你通常可以把它看作是一个没有命名的神奇通配符。在{ _ + 2 }的上下文中，它代表一个匿名参数。你可以这样使用它：

```
scala> def adder(m: Int, n: Int) = m + n
adder: (m: Int,n: Int)Int
scala> val add2 = adder(2, _:Int)
add2: (Int) => Int = <function1>

scala> add2(3)
res50: Int = 5
```

你可以部分应用参数列表中的任意参数，而不仅仅是最后一个。

*什么时候用部分应用，和柯里化的差别在哪里*

### 柯里化函数

有时会有这样的需求：允许别人一会在你的函数上应用一些参数，然后又应用另外的一些参数。

例如一个乘法函数，在一个场景需要选择乘数，而另一个场景需要选择被乘数。


```
scala> def multiply(m: Int)(n: Int): Int = m * n
multiply: (m: Int)(n: Int)Int
```

你可以直接传入两个参数。

```
scala> multiply(2)(3)
res0: Int = 6
```

你可以填上第一个参数并且部分应用第二个参数。

```
scala> val timesTwo = multiply(2) _
timesTwo: (Int) => Int = <function1>

scala> timesTwo(3)
res1: Int = 6
```

你可以对任何多参数函数执行柯里化。例如之前的adder函数

```
scala> def adder(m: Int, n: Int) = m + n
adder: (m: Int,n: Int)Int

scala> (adder _).curried
res1: (Int) => (Int) => Int = <function1>
```
*这里应该怎么用的问题*

### 可变长度参数
这是一个特殊的语法，可以向方法传入任意多个同类型的参数。例如要在多个字符串上执行String的capitalize函数，可以这样写：

```
def capitalizeAll(args: String*) = {
  args.map { arg =>
    arg.capitalize
  }
}

scala> capitalizeAll("rarity", "applejack")
res2: Seq[String] = ArrayBuffer(Rarity, Applejack)
```