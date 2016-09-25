def perfect(n:Int) = n==(1 until n filter (n%_==0) sum)

val n = 33550336

// 串行计算

n to n+10 foreach (i=>println(perfect(i)))
