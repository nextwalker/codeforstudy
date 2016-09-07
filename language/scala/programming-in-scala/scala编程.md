# scala编程
1. 可伸缩的语言
2. scala入门初探
3. scala入门再探
4. 类和对象
5. 基本类型和操作
6. 函数式对象
7. 内建控制结构
8. 函数和闭包
9. 控制抽象
10. 组合与继承
11. scala的层级
12. 特质
13. 包和引用
14. 断言和单元测试
15. 样本类和模式匹配
16. 使用列表
17. 集合类型
18. 有状态的对象
19. 类型参数化
20. 抽象成员
21. 隐式转换和参数
22. 实现列表
23. 重访For表达式
24. 抽取器
25. 注解
26. 使用XML
27. 使用对象的模块化编程
28. 对象相等性
29. 结合scala和java
30. actor和并发
31. 连结符解析
32. GUI编程
33. scell试算表


## 可扩展的语言
- scala被设计成可以随着使用者的需求而扩展。
- 脚本到构建大型系统
- scala是一种把面向对象和函数式编程理念加入静态类型语言的混合体
- 函数式编程简化了用简单部件搭建实际应用的过程
- 面向对象特征便于构建大型系统并使它们适应新的需求

#### 问题
1. 为什么使用scala？
2. scala的设计思想及背后的原因。



#### 与你一同成长的语言

```
var capital = Map("US"->"Washington", "Fraance"->"Paris")
capital: scala.collection.immutable.Map[String,String] = Map(US -> Washington, Fraance -> Paris)

scala> println(capital)
Map(US -> Washington, Fraance -> Paris)

scala> capital += ("Japan"->"Tokyo")

scala> println(capital)
Map(US -> Washington, Fraance -> Paris, Japan -> Tokyo)
```

*声明MAP和字典的方法* 支持关系映射