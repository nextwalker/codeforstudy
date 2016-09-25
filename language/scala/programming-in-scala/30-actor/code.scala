import scala.actors._

object SillyActor extends Actor {
    def act() {
        for (i <- 1 to 5) {
            println("I'm acting!")
            Thread.sleep(1000)
        }
    }
}

#warning: there was one deprecation warning; re-run with -deprecation for details
#defined object SillyActor?

SillyActor.start()


object SeriousActor extends Actor {
    def act() {
        for (i <- 1 to 5) {
            println("To be or not to be")
            Thread.sleep(1000)
        }
    }
}
# warning: there was one deprecation warning; re-run with -deprecation for details
# defined object SeriousActor

SillyActor.start()
SeriousActor.start()

import scala.actors._
import scala.actors.Actor._ # 注意和上面的区别，一个是用于继承Actor，一个是用于实例化

val seriousActor2 = actor {
    for (i <- 1 to 5) 
        println("That is the question.")
    Thread.sleep(1000)
}

val echoActor = actor {
    while (true) {
        receive {
            case msg =>
                println("received message:" + msg)
        }
    }
}

val intActor = actor {
    receive {
        case x:Int => // 我只要Int
            println("Got an Int: " +x)
    }
}


intActor ! '11'
error: unclosed character literal
intActor ! "111" # 传入的是字符串，不是整数，强类型语言


偏函数不太理解 15.7

self ! "hello"

self.receive { case x => x}
self.receiveWithin(1000) { case x => x}



db = web.database(dbn='mysql', db='wedding', user='root',host='127.0.0.1',pw='123456')

db.select('entries', order='id DESC')